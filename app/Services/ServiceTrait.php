<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

trait ServiceTrait
{
    public static $models;
    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @return model
     */
    public static function create(array $data)
    {
        $model_obj = self::$models;
        $data = $model_obj::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Illuminate\Database\Eloquent\Model $model
     * @return Illuminate\Database\Eloquent\Model
     */
    public static function update(array $data, Model $model)
    {
        $data = $model->update($data);
        return $data;
    }

    /**
     * update data in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Int $id - model Id
     * @return bool
     */
    public static function updateById(array $data, $id)
    {
        $model_obj = self::$models;
        $data = $model_obj::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Get Data By Id from storage.
     *
     * @param  Int $id
     * @return model
     */
    public static function getById($id)
    {
        $model_obj = self::$models;
        $data = $model_obj::find($id);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\model
     * @return bool
     */
    public static function delete(Model $model)
    {
        $data = $model->delete();
        return $data;
    }

    /**
     * Remove the specified id from storage.
     *
     * @param  $id
     * @return bool
     */
    public static function deleteById($id)
    {
        $result = false;
        $model_obj = self::$models;
        if($model_obj){
            $result = $model_obj::where('id', $id)->delete();
        }
        return $result;
    }

    /**
     * Get data for datatable from storage.
     *
     * @return model
     */
    public static function datatable()
    {
        $model_obj = self::$models;
        $data = $model_obj::query();
        return $data;
    }

    /**
     * Get Lists from storage.
     *
     * @return model
     */
    public static function getList()
    {
        $model_obj = self::$models;
        $data = $model_obj::query();
        return $data;
    }

    /**
     * Get Active data from storage.
     *
     * @return model
     */
    public static function getActiveData()
    {
        $model_obj = self::$models;
        $data = $model_obj::where('is_active', 1);
        return $data;
    }

    /**
     * Get Active Descending Sorted data from storage.
     *
     * @return model
     */
    public static function getActiveDescSortedList()
    {
        $model_obj = self::$models;
        $data = $model_obj::where('is_active', 1)->orderByDesc('created_at');
        return $data;
    }

    public static function getApprovedActiveSortedList()
    {
        $model_obj = self::$models;
        $data = $model_obj::query()->whereIsActive(1)->whereIsApproved(1)
        ->orderByDesc('created_at');
        return $data;
    }
}
