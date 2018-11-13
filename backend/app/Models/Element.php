<?php

namespace App\Models;

class Element extends Model
{
    protected $fillable = [
        'name',
        'secret',
        'fio'
    ];

    public function group()
    {
        return $this->belongsToMany(Group::class, 'groups_elements', 'element_id', 'group_id');
    }
}
