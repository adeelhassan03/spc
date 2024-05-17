<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'group', 'status', 'category',
    ];

    public function subMenus()
    {
        return $this->hasMany(MenuItem::class, 'group', 'group')
                    ->where('category', 'Sub Menu');
    }
}
