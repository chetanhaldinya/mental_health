<?php

namespace App\Services;

use App\Models\Service;

class ServiceService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Service
     */
    public static function create(array $data)
    {
        $data = Service::create($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Service
     */
    public static function getById($id)
    {
        $data = Service::find($id);
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
        $data = Service::where('id', $id)->update($data);
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
        $data = Service::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by contact_us.
     *
     * @param Service
     * @return bool
     */
    public static function delete($service)
    {
        $data = $service->delete();
        return $data;
    }
    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Service
     */
    public static function datatable()
    {
        $data = Service::query();
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $slug
     * @return  App\Models\Service
     */
    public static function getBySlug($slug)
    {
        $data = Service::where('slug', $slug)->first();
        return $data;
    }
}
