<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureRequest;
use App\Models\Feature;
use App\Services\FileService;
use Illuminate\Support\Arr;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Admin\FeatureExport;
use Illuminate\Support\Facades\Response;
use App\Services\FeatureService;




class FeatureController extends Controller
{
    protected $mls,$featureService;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $utilityService;

    public function __construct()
    {

        // $this->image_directory = 'files/features';
        //route
        $this->index_route_name = 'admin.features.index';
        $this->create_route_name = 'admin.features.create';
        $this->detail_route_name = 'admin.features.show';
        $this->edit_route_name = 'admin.features.edit';

        //view files
        $this->index_view = 'admin.feature.index';
        $this->create_view = 'admin.feature.create';
        $this->detail_view = 'admin.feature.details';
        $this->edit_view = 'admin.feature.edit';

        //service files
        $this->utilityService = new UtilityService();
        $this->featureService = new FeatureService();

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
            $items = Feature::query();
            $items = FeatureService::search($request, $items);
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
    public function store(FeatureRequest $request)
    {
        $input = $request->all();
        // $image = FileService::imageUploader($request, 'image', $this->image_directory);
        // if ($image != null) {
        //     $input['image'] = $image;
        // }
        $feature = $this->featureService->create($input);
        $feature = Feature::create($input);

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'feature', 1));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        return view($this->detail_view, compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        return view($this->edit_view, compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureRequest $request, Feature $feature)
    {
        $input = $request->all();
        $feature->update($input);
        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('updated', 'feature', 1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        $result = $feature->delete();
        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('feature'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('feature'),
                'status_name' => 'error'
            ]);
        }
    }

    public function status(Feature $feature, $status)
    {
        $status = ($status == 1) ? 0 : 1;
        $result =$feature->update(['is_active' => $status]);
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
        return (new FeatureExport($request))->download($request->export == 'excel' ? 'features.xlsx' : 'features.csv');
    }

}
