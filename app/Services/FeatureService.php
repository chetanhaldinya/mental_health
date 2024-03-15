<?php

namespace App\Services;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeatureService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Feature
     */
    public static function create(array $data)
    {
        $data = Feature::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Feature
     */
    public static function insert(array $data)
    {
        $data = Feature::insert($data);
        return $data;
    }
    
    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Feature
     */
    public static function getById($id)
    {
        $data = Feature::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public static function update(array $data, $id)
    {
        $data = Feature::where('id', $id)->update($data);
        return $data;
    }

    /**
     * update status.
     *
     * @param Array $data
     * @param int $id
     * @return bool
     */
    public static function status(array $data, $id)
    {
        $data = Feature::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by contact_us.
     *
     * @param Feature
     * @return bool
     */
    public static function delete($feature)
    {
        $data = $feature->delete();
        return $data;
    }
    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Feature
     */
    public static function datatable()
    {
        $data = Feature::query();
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $heading
     * @return  App\Models\Feature
     */
    public static function getByheading($heading)
    {
        $data = Feature::where('heading', $heading)->first();
        return $data;
    }

    /**
     * Get data by $parameters.
     *
     * @param Array $parameters
     * @return Model
     */
    public static function getByParameters($parameters)
    {
        $data = Feature::query();
        foreach ($parameters as $parameter) {
            $data = $data->where($parameter['column_name'], $parameter['value']);
        }
        return $data;
    }

    /**
     * Get data for download Report from storage.
     *
     * @return Feature
     */
    public static function downloadFeatureReport()
    {
        $data = Feature::query()
            ->select(
                'id',
                'title',
                DB::raw("(CASE WHEN (is_active = 1) THEN 'Active' ELSE 'Inactive' END) as status"),
            );
        return $data;
    }

    public static function search(Request $request, $items)
    {
        if (isset($request->title)) {
            $items = $items->where('title', 'like', "%{$request->title}%");
        }
        if (isset($request->id)) {
            $items = $items->where('id', $request->id);
        }
        if (isset($request->is_active)) {
            $items = $items->where('is_active', $request->is_active);
        }
        return $items;
    }

    
}
