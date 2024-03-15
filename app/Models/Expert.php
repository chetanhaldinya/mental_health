<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\FileService;

class Expert extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'gender',
        'about',
        'designation',
        'qualification',
        'image',
        'fees',
        'is_active',
    ];

    public static function getImageAttribute($value)
    {
        return  FileService::getFileUrl('files/experts/', $value);
    }

}
