<?php

namespace App\Models;

class Group extends Model
{
    protected $fillable = [
        'name',
        'secret'
    ];

    public function elements()
    {
        return $this->belongsToMany(Element::class, 'groups_elements', 'group_id', 'element_id');
    }
}
