<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;


class Faq extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category', 'status', 'pdf', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $dates = ['deleted_at'];

    
    public function getPdfUrl()
{
    return url('assets/images/faq_pdfs/' . $this->pdf);
}

  
}
