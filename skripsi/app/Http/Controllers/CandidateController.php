<?php

namespace App\Http\Controllers;

use App\Models\CriteriaDetail;

use Illuminate\Http\Request;

use App\Models\Candidates;

Use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;


class CandidateController extends Controller
{
    public function index(): View
    {
        $candidates = Candidates::all();

        return view('candidates.index', compact('candidates'));
    }
    public function create()
    {
        $criteriadetail = CriteriaDetail::all();
        $candidates = Candidates::all();
        // dd($criteriadetail);

        return view('candidates.create', compact('candidates'));
    }
    public function store()
    {
        // $criteria = Criteria::all() ; 
        // dd($criteria);
        $attributes = request()->validate([
            'namaKandidat'  =>'required',
            'c1raw'         =>'required',
            'c2raw'         =>'required',
            'c3raw'         =>'required',
            'c4raw'         =>'required',
            'c5raw'         =>'required',
            'c6raw'         =>'required',
        ]);
        Candidates::create($attributes);

        return redirect()->route('candidates.index');
    }
    public function edit(string $id)
    {
        $candidates = Candidates::findOrFail($id);

        return view('candidates.edit', compact('candidates'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'namaKandidat'  =>'required',
            'c1raw'         =>'required',
            'c2raw'         =>'required',
            'c3raw'         =>'required',
            'c4raw'         =>'required',
            'c5raw'         =>'required',
            'c6raw'         =>'required',
        ]);

        //get post by ID
        $candidates = Candidates::findOrFail($id);

            //update post without image
            $candidates->update([
                'namaKandidat'      =>$request->namaKandidat,
                'c1raw'             =>$request->c1raw,
                'c2raw'             =>$request->c2raw,
                'c3raw'             =>$request->c3raw,
                'c4raw'             =>$request->c4raw,
                'c5raw'             =>$request->c5raw,
                'c6raw'             =>$request->c6raw,
        ]);
        //redirect to index
        return redirect()->route('candidates.index');
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $candidates = Candidates::findOrFail($id);

        //delete post
        $candidates->delete();

        //redirect to index
        return redirect()->route('candidates.index');
    }
}
