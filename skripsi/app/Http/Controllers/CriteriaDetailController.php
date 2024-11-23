<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use illuminate\View\View;

use App\Models\CriteriaDetail;

use App\Models\Criteria;

use Illuminate\Http\RedirectResponse;

class CriteriaDetailController extends Controller
{
    public function index(): View
    {
        $criteriad = CriteriaDetail::all();

        return view('criteriadetail.index', compact('criteriad'));
    }
    public function create()
    {
        $criteriad = Criteriadetail::all();
        $criteria = Criteria::all();
        // dd($criteriadetail);

        return view('criteriadetail.create', compact('criteriad','criteria'));
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
        CriteriaDetail::create($attributes);

        return redirect()->route('criteriadetail.index');
    }
    public function edit(string $id)
    {
        $criteriad = CriteriaDetail::findOrFail($id);

        return view('criteriadetail.edit', compact('criteriad'));
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
        $criteriad = CriteriaDetail::findOrFail($id);

            //update post without image
            $criteriad->update([
                'code'              =>$request->code,
                'criteria'          =>$request->criteria,
                'weight'            =>$request->weight,
                'type'              =>$request->type,
                'status'            =>$request->status,
        ]);
        //redirect to index
        return redirect()->route('criteriadetail.index');
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $criteriadetail = CriteriaDetail::findOrFail($id);

        //delete post
        $criteriadetail->delete();

        //redirect to index
        return redirect()->route('criteriadetail.index');
    }
}
