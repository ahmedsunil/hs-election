<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Post;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::paginate(8);
        return view('candidates.index', compact('candidates'));
    }

    public function create(){
        return view('candidates.create');
    }

    public function store(Request $request)
    {
       $attributes =  $request->validate([
            'name' => 'required|string',
            'class' => 'required|string',
            'level' => 'required|string',
           'candidate_number' => 'required|string',
           'house' => 'required|string',
           'post' => 'required|string',
            'post_label' => 'required|string',
            'avatar' => 'required|image'
        ]);

       $attributes['avatar'] = $request->file('avatar')->store('avatars');

       Candidate::create($attributes);

       return redirect()->route('candidate.index');
    }

    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('candidates.edit', compact('candidate'));
    }

    public function update(Request $request, $id)
    {
        $candidate = Candidate::findOrFail($id);

        $attributes =  $request->validate([
            'name' => 'required|string',
            'class' => 'required|string',
            'level' => 'required|string',
            'candidate_number' => 'required|string',
            'house' => 'required|string',
            'post' => 'required|string',
            'post_label' => 'required|string',
            'avatar' => 'image'
        ]);

        if ($attributes['avatar'] ?? false){
            $attributes['avatar'] = $request->file('avatar')->store('avatars');
        }

        $candidate->update($attributes);

        return redirect()->route('candidate.index');
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('candidate.index');
    }
}
