<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = [
            'House of dragon',
            'Lord of the Ring',
            'Sandman',
            'MindHunter'
        ];
        
        return view('series.index')->with('series', $series);  
    }

    public function create()
    {
        return view('series.create');
    }
}
