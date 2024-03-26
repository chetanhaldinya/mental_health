<?php

namespace App\Services;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Faq
     */
    public static function create(array $data)
    {
        $data = Faq::create($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Faq
     */
    public static function getById($id)
    {
        $data = Faq::find($id);
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
        $data = Faq::where('id', $id)->update($data);
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
        $data = Faq::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by contact_us.
     *
     * @param Faq
     * @return bool
     */
    public static function delete($faq)
    {
        $data = $faq->delete();
        return $data;
    }
    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Faq
     */
    public static function datatable()
    {
        $data = Faq::query();
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $slug
     * @return  App\Models\Faq
     */
    public static function getBySlug($slug)
    {
        $data = Faq::where('slug', $slug)->first();
        return $data;
    }

    public static function search(Request $request, $items)
    {
        if (isset($request->question)) {
            $items = $items->where('question', 'like', "%{$request->question}%");
        }
        if (isset($request->answer)) {
            $items = $items->where('answer', 'like', $request->answer);
        }
        if (isset($request->status)) {
            $items = $items->where('is_active', $request->status);
        }
        return $items;
    }

    /**
     * Get data for download Report from storage.
     *
     * @return Faq
     */
    public static function downloadFaqReport()
    {
        $data = Faq::query()
            ->select(
                'id',
                'question',
                'answer',
                DB::raw("(CASE WHEN (is_active = 1) THEN 'Active' ELSE 'Inactive' END) as status"),
                DB::raw("(DATE_FORMAT(created_at,'%d-%M-%Y')) as created_date"),
                DB::raw("(DATE_FORMAT(updated_at,'%d-%M-%Y')) as updated_date"),
            )->orderBy('created_at', 'desc');
        return $data;
    }
}
