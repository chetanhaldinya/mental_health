<?php

namespace App\Services;

use App\Models\Faq;

class FaqService
{
    /**
     * Create the specified resource in storage.
     *
     * @param  array $data
     * @return Faq
     */
    public static function create(array $data)
    {
        $data = Faq::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Faq $faq
     * @return Faq
     */
    public static function update(array $data, Faq $faq)
    {
        $data = $faq->update($data);
        return $data;
    }

    /**
     * Get Data By Id from storage.
     *
     * @param  Int $id
     * @return Faq
     */
    public static function getById($id)
    {
        $data = Faq::find($id);
        return $data;
    }

    /**
     * Update Data By Id in storage.
     *
     * @param  Int $id
     * @return Faq
     */
    public static function updateById(array $data, $id)
    {
        $data = Faq::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Faq
     * @return bool
     */
    public static function delete(Faq $faq)
    {
        $data = $faq->delete();
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
        $data = self::getById($id);
        if($data){
            $result = $data->delete();
        }
        return $result;
    }

    public static function getList()
    {
        $data = Faq::query();
        return $data;
    }

    public static function getActiveDescSortedList()
    {
        $data = Faq::query()->where('is_active', 1)->orderBy('created_at', 'desc');
        return $data;
    }

    public static function getAnsweredActiveSortedList()
    {
        $data = Faq::query()->whereIsActive(1)->whereIsAnswered(1)
        ->orderByDesc('created_at');
        return $data;
    }

    public static function getUnAnsweredActiveSortedList()
    {
        $data = Faq::query()->whereIsActive(1)->whereIsAnswered(0)
        ->orderByDesc('created_at');
        return $data;
    }

    /**
     * Get data for datatable from storage.
     *
     * @return Faq with states, countries
     */
    public static function datatable()
    {
        $data = Faq::query();
        return $data;
    }
}
