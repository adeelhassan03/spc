<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catalog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'part_no', 'description', 'image', 'pdf', 'status', 'created_by', 'updated_by', 'deleted_by',
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getImageUrl()
    {
        return asset('storage/' . $this->image);
    }

    public function getPdfUrl()
    {
        return asset('storage/' . $this->pdf);
    }
}
