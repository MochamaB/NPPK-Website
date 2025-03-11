<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MenuItem;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class)->orderBy('order_index');
    }

    // Get top-level menu items
    public function topLevelItems()
    {
        return $this->menuItems()->whereNull('parent_id')->orderBy('order_index');
    }

    /**
     * Get a menu by its location
     *
     * @param string $location
     * @return Menu|null
     */
    public static function getByLocation(string $location)
    {
        return self::where('location', $location)
                   ->where('is_active', true)
                   ->with(['menuItems' => function($query) {
                       $query->where('is_active', true)
                             ->orderBy('order_index')
                             ->with(['children' => function($q) {
                                 $q->where('is_active', true)
                                   ->orderBy('order_index');
                             }]);
                   }])
                   ->first();
    }
}
