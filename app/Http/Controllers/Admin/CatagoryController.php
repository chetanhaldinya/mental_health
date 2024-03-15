<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CatagoryRequest;
use App\Models\Catagory;
use App\Services\FileService;
use Illuminate\Support\Arr;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Admin\CatagoryExport;
use Illuminate\Support\Facades\Response;
use App\Services\CatagoryService;




class CatagoryController extends Controller
{
    protected $mls, $image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $catagoryService, $utilityService;

    public function __construct()
    {

        $this->image_directory = 'files/catagories';
        //route
        $this->index_route_name = 'admin.catagories.index';
        $this->create_route_name = 'admin.catagories.create';
        $this->detail_route_name = 'admin.catagories.show';
        $this->edit_route_name = 'admin.catagories.edit';

        //view files
        $this->index_view = 'admin.catagory.index';
        $this->create_view = 'admin.catagory.create';
        $this->detail_view = 'admin.catagory.details';
        $this->edit_view = 'admin.catagory.edit';

        //service files
        $this->utilityService = new UtilityService();
        $this->catagoryService = new CatagoryService();

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
            // $items = $this->catagoryService->datatable();
            $items = Catagory::query();
            $items = CatagoryService::search($request, $items);
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
    public function store(CatagoryRequest $request)
    {
        $input = $request->validated();
        $catagory = $this->catagoryService->create($input);

        $image = FileService::imageUploader($request, 'image', $this->image_directory);
        if ($image != null) {
            $input['image'] = $image;
        }
        $catagory = Catagory::create($input);

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'catagory', 1));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Catagory $catagory)
    {
        return view($this->detail_view, compact('catagory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Catagory $catagory)
    {
        return view($this->edit_view, compact('catagory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CatagoryRequest $request, Catagory $catagory)
    {
        $input = $request->validated();
        $catagory->update($input);
        if (!empty($input['image'])) {
            $image = FileService::imageUploader($request, 'image', $this->image_directory);
            if ($image != null) {
                $input['image'] = $image;
            }
        } else {
            $input = Arr::except($input, array('image'));
        }

        $catagory->update($input);

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('updated', 'catagory', 1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(catagory $catagory)
    {
        $result = $catagory->delete();
        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('catagory'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('catagory'),
                'status_name' => 'error'
            ]);
        }
    }

    public function export(Request $request)
    {
        return (new CatagoryExport($request))->download($request->export == 'excel' ? 'catagories.xlsx' : 'catagories.csv');
    }

    public function status(Catagory $catagory, $status)
    {
        $status = ($status == 1) ? 0 : 1;
        $result =$catagory->update(['is_active' => $status]);
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
}
