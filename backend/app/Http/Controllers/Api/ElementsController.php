<?php

namespace App\Http\Controllers\Api;

use App\Models\Element;
use Illuminate\Http\Request;

class ElementsController extends Controller
{
    public function storeNames(Request $request) {
        collect($request->get('updates', []))->each(function ($fio, $id) {
            Element::find($id)->update(['fio' => $fio]);
        });
    }
}
