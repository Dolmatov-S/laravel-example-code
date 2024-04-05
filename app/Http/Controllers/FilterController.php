<?php

namespace App\Http\Controllers;

class FilterController extends Controller
{
    public function getDevelopers()
    {
        return view('welcome', [
            'filter_type' => 'developer',
            'action' => route('api.v1.developer')
        ]);
    }

    public function getSite()
    {
        return view('welcome', ['filter_type' => 'site',
            'action' => route('api.v1.site')]);
    }
}
