<?php

namespace App\Http\Controllers\Api;

use App\Models\Element;
use App\Models\Group;

class GroupsController extends Controller
{
    public function index($secret)
    {
        $elements = [];
        $groups = Group::query()
            ->where('secret', $secret)
            ->with(['elements'])
            ->get()->toArray();

        Group::all()->each(function (Group $group) use (&$elements) {
            if ($group->has('elements')->exists()) {
                $group->elements->each(function ($el) use (&$elements) {
                    $elements[$el['id']] = $el['fio'];
                });
            }
        });

        return $this->toJson(array_merge(compact('groups', 'elements')));
    }
}
