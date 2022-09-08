<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class DhandaheluController extends Controller
{
    public function index()
    {
        $candidates = Candidate::where('post', 'school_president')->get();
        return view('vote.dhandahelu', compact('candidates'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

}
