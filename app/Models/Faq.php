<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'section_type',
        'question',
        'answer',
        'is_answered',
        'question_from',
        'answered_by',
        'is_active'
    ];

    public function questionFromUser()
    {
        return $this->belongsTo(User::class, 'question_from');
    }

    public function answeredByUser()
    {
        return $this->belongsTo(User::class, 'answered_by');
    }
}
