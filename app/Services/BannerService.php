<?php

namespace App\Services;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Banner
     */
    public static function create(array $data)
    {
        $data = Banner::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Banner
     */
    public static function insert(array $data)
    {
        $data = Banner::insert($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Banner
     */
    public static function getById($id)
    {
        $data = Banner::find($id);
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
        $data = Banner::query();
        foreach ($parameters as $parameter) {
            $data = $data->where($parameter['column_name'], $parameter['value']);
        }
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
        $data = Banner::where('id', $id)->update($data);
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
        $data = Banner::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by contact_us.
     *
     * @param Banner
     * @return bool
     */
    public static function delete($banner)
    {
        $data = $banner->delete();
        return $data;
    }
    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Banner
     */
    public static function datatable()
    {
        $data = Banner::query();
        return $data;
    }

    /**
     * Get data for download Report from storage.
     *
     * @return Banner
     */
    public static function downloadBannerReport()
    {
        $data = Banner::query()
            ->select(
                'id',
                'heading',
                DB::raw("(CASE WHEN (is_active = 1) THEN 'Active' ELSE 'Inactive' END) as status"),
            );
        return $data;
    }


    /**
     * Get the specified resource in storage.
     *
     * @param int $heading
     * @return  App\Models\Banner
     */
    public static function getByheading($heading)
    {
        $data = Banner::where('heading', $heading)->first();
        return $data;
    }

    public static function search(Request $request, $items)
    {
        if (isset($request->heading)) {
            $items = $items->where('heading',$request->heading);
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
