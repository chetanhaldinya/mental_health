<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use App\Services\FileService;
use Illuminate\Support\Arr;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use App\Exports\Admin\BannerExport;
use App\Services\BannerService;



class BannerController extends Controller
{
    protected $mls, $image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $bannerService, $utilityService;

    public function __construct()
    {

        $this->image_directory = 'files/banners';
        //route
        $this->index_route_name = 'admin.banners.index';
        $this->create_route_name = 'admin.banners.create';
        $this->detail_route_name = 'admin.banners.show';
        $this->edit_route_name = 'admin.banners.edit';

        //view files
        $this->index_view = 'admin.banner.index';
        $this->create_view = 'admin.banner.create';
        $this->detail_view = 'admin.banner.details';
        $this->edit_view = 'admin.banner.edit';

        //service files
        $this->utilityService = new UtilityService();
        $this->productService = new BannerService();

        //mls is used for manage language content based on keys in messages.php
        $this->mls = new ManagerLanguageService('messages');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $items = Banner::query();
            $items = BannerService::search($request, $items);
            return datatables()->eloquent($items)->toJson();
        } else {
            return view($this->index_view);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->create_view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $input = $request->validated();
        $banner = $this->bannerService->create($input);

        $image = FileService::imageUploader($request, 'image', $this->image_directory);
        if ($image != null) {
            $input['image'] = $image;
        }
        $banner = Banner::create($input);

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'banner', 1));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view($this->detail_view, compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view($this->edit_view, compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        $input = $request->validated();
        if (!empty($input['image'])) {
            $image = FileService::imageUploader($request, 'image', $this->image_directory);
            if ($image != null) {
                $input['image'] = $image;
            }
        } else {
            $input = Arr::except($input, array('image'));
        }

        $banner->update($input);

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('updated', 'banner', 1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $result = $banner->delete();
        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('banner'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('banner'),
                'status_name' => 'error'
            ]);
        }
    }

    public function status(Banner $banner, $status)
    {
        $status = ($status == 1) ? 0 : 1;
        $result =$banner->update(['is_active' => $status]);
        if ($result) {
            return response()->json([
                'status' => 1,
                'message' => $this->mls->messageLanguage('updated', 'status', 1),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => $this->mls->messageLanguage('not_updated', 'status', 1),
                'status_name' => 'error'
            ]);
        }
    }

    public function export(Request $request)
    {
        return (new BannerExport($request))->download($request->export == 'excel' ? 'banners.xlsx' : 'banners.csv');
    }
}
