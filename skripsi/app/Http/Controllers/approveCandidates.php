<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\View\View;

use App\Models\Candidates;

class approveCandidates extends Controller
{
    public function index(): View
    {
        $candidates = Candidates::all();

        return view('approvecandidates.index', compact('candidates'));

    }
    public function updateApproval(Request $request)
    {
        Candidates::query()->update(['status' => false]);

        if ($request->has('approved_candidates')) {
            Candidates::whereIn('id', $request->approved_candidates)
            ->update(['isApproved' => true]);
    }
        return redirect()->route('approvecandidates.index')->with('success', 'Approval status updated successfully!');

    }
}