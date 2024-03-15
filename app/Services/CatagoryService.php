<?php

namespace App\Services;

use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatagoryService
{

    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Catagory
     */
    public static function create(array $data)
    {
        $data = Catagory::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Catagory
     */
    public static function insert(array $data)
    {
        $data = Catagory::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, $id)
    {
        $data = Catagory::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Catagory $catagory
     */
    public static function getById($id)
    {
        $data = Catagory::find($id);
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
        $data = Catagory::query();
        foreach ($parameters as $parameter) {
            $data = $data->where($parameter['column_name'], $parameter['value']);
        }
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
        $data = Catagory::where('id', $id)->update($data);
        return $data;
    }


    /**
     * Delete data by catagory.
     *
     * @param Catagory $catagory
     * @return bool
     */
    public static function delete(Catagory $catagory)
    {
        $data = $catagory->delete();
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Catagory
     */
    public static function datatable()
    {
        $data = Catagory::query();
        return $data;
    }

    /**
     * Get data for download Report from storage.
     *
     * @return Catagory
     */
    public static function downloadCatagoryReport()
    {
        $data = Catagory::query()
            ->select(
                'id',
                'title',
                'description',
                DB::raw("(CASE WHEN (is_active = 1) THEN 'Active' ELSE 'Inactive' END) as status"),
            );
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $heading
     * @return  App\Models\Catagory
     */
    public static function getByheading($heading)
    {
        $data = Catagory::where('heading', $heading)->first();
        return $data;
    }

    

    public static function search(Request $request, $items)
    {
        if (isset($request->title)) {
            $items = $items->where('title', 'like', "%{$request->title}%");
        }
        if (isset($request->description)) {
            $items = $items->where('description', $request->description);
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
