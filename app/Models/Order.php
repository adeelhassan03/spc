<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'areYou',
        'shop_phone_area_code',
        'shop_phone_number',
        'email',
        'company_name',
        'address',
        'street',
        'state_province_region',
        'postal_zip_code',
        'country',
        'buy_parts_from',
        'alignment_work_type',
        'status', 
        'admin_id'
  
    ];

   
    protected $casts = [
        'alignment_work_type' => 'array',
    ];
}
