<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'url', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Menu::class);
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public static function validateMenu(array $data)
    {
        return validator::make($data, [
            'name' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'parent_id' => 'nullable|integer|exists:menus,id',
        ]);
    }
}
