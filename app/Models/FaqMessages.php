<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqMessages extends Model
{
    use HasFactory;

    protected $fillable = [
        'f-name',
        'l-name',
        'email',
        'company_name',
        'question',
        'status',
        'admin_id',
        'created_by',
        'deleted_by',
        'deleted_at'
    ];
   

}
