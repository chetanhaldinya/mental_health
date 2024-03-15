<?php

namespace App\Experts;

use App\Models\Expert;

class ExpertService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Expert
     */
    public static function create(array $data)
    {
        $data = Expert::create($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Expert
     */
    public static function getById($id)
    {
        $data = Expert::find($id);
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
        $data = Expert::where('id', $id)->update($data);
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
        $data = Expert::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by contact_us.
     *
     * @param Expert
     * @return bool
     */
    public static function delete($expert)
    {
        $data = $expert->delete();
        return $data;
    }
    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Expert
     */
    public static function datatable()
    {
        $data = Expert::query();
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $slug
     * @return  App\Models\Expert
     */
    public static function getBySlug($slug)
    {
        $data = Expert::where('slug', $slug)->first();
        return $data;
    }
}
