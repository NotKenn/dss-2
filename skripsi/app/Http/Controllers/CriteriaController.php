<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\View\View;

use App\Models\Criteria;

class CriteriaController extends Controller
{
    public function index(): View
    {
        $criteria = Criteria::all();

        return view('criteria.index', compact('criteria'));
    }
    public function create()
    {
        $criteria = Criteria::all();
        // dd($criteria);

        return view('criteria.create', compact('criteria'));
    }
    public function store()
    {
        // $criteria = Criteria::all() ; 
        // dd($criteria);
        $attributes = request()->validate([
            'code'              =>'required',
            'criteria'          =>'required',
            'weight'            =>'required',
            'type'              =>'required',
            'status'            =>'required'
        ]);
        Criteria::create($attributes);

        return redirect()->route('criteria.index');
    }
    public function edit(string $id)
    {
        $criteria = Criteria::findOrFail($id);

        return view('criteria.edit', compact('criteria'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'code'              =>'required',
            'criteria'          =>'required',
            'weight'            =>'required',
            'type'              =>'required',
            'status'            =>'required'
        ]);

        //get post by ID
        $criteria = Criteria::findOrFail($id);

            //update post without image
            $criteria->update([
                'code'              =>$request->code,
                'criteria'          =>$request->criteria,
                'weight'            =>$request->weight,
                'type'              =>$request->type,
                'status'            =>$request->status,
        ]);
        //redirect to index
        return redirect()->route('criteria.index');
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $criteria = Criteria::findOrFail($id);

        //delete post
        $criteria->delete();

        //redirect to index
        return redirect()->route('criteria.index');
    }
}
