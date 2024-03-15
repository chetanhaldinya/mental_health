<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\FileService;


class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading',
        'paragraph',
        'image',
        'is_active'
    ];

    public static function getImageAttribute($value)
    {
        return  FileService::getFileUrl('files/banners/', $value);
    }
   
}
