<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'name',
        'image',
        'role',
        'second_role',
        'lane',
        'second_lane'
    ];

    public function getRolesDisplayAttribute()
    {
        return $this->second_role 
            ? "{$this->role} / {$this->second_role}" 
            : $this->role;
    }

    public function getLanesDisplayAttribute()
    {
        return $this->second_lane 
            ? "{$this->lane} / {$this->second_lane}" 
            : $this->lane;
    }

    // Heroes yang counter hero ini
    public function counters()
    {
        return $this->belongsToMany(Hero::class, 'hero_counters', 'hero_id', 'counter_id');
    }

    // Heroes yang di-counter oleh hero ini
    public function countered()
    {
        return $this->belongsToMany(Hero::class, 'hero_counters', 'counter_id', 'hero_id');
    }
}
