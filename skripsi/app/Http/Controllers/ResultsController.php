<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Candidates;

use App\Models\Results;

use App\Models\Criteria;
use Exception;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ResultsController extends Controller
{
    public function index(): View
    {
        $this->calculateAll();

        $results = Results::orderBy('ranking')->get();

        return view('result.index', compact('results'));
    }
    private function calculateAll()
    {
        $candidates = Candidates::all();

        $matrix = $this->generateMatrix(); 

        $weights = Criteria::pluck('weight')->toArray();

        $normalizedMatrix = $this->normalizeMatrix($matrix);

        $totals = [];
    foreach ($normalizedMatrix as $index => $normalizedRow) {
        $totalScore = 0;
        foreach ($normalizedRow as $j => $value) {
            $totalScore += $value * $weights[$j];
        }
        $totals[] = [
            'jurusan'  => $candidates[$index]->namaKandidat,
            'c1normal' => $normalizedRow[0],
            'c2normal' => $normalizedRow[1],
            'c3normal' => $normalizedRow[2],
            'c4normal' => $normalizedRow[3],
            'c5normal' => $normalizedRow[4],
            'c6normal' => $normalizedRow[5],
            'total' => $totalScore,
        ];
    }

    // Urutkan kandidat berdasarkan total skor dan tentukan ranking
    usort($totals, fn($a, $b) => $b['total'] <=> $a['total']); // Mengurutkan descending
    foreach ($totals as $rank => &$total) {
        $total['ranking'] = $rank + 1; // Tambahkan ranking
    }

    // Simpan atau update data ke tabel 'results'
    foreach ($totals as $data) {
        Results::updateOrCreate(
            ['jurusan' => $data['jurusan']],
            $data
        );
    }
    }
    private function generateMatrix()
    {
        $candidates = Candidates::all();
        $rawMatrix = [];
        
        foreach ($candidates as $can)
        {
            $rawMatrix[] = 
            [
                (float) $can->c1raw,
                (float) $can->c2raw,
                (float) $can->c3raw,
                (float) $can->c4raw,
                (float) $can->c5raw,
                (float) $can->c6raw,
            ];
        }
        return $rawMatrix;
    }
    private function normalizeMatrix($matrix)
    {
        
        $criteria = Criteria::pluck('type')->toArray();

        $maxValues = [];
        $minValues = [];

        for ($j = 0; $j < count($criteria); $j++)
        {
            if(empty($matrix)){
                
            }else{
                $columnValues = array_column($matrix, $j);
                $maxValues[$j] = max($columnValues);
                $minValues[$j] = min($columnValues);
            }
        }
        
        $normalizedMatrix = [];

        foreach ($matrix as $row)
        {
            $normalizedRow =[];
            for ($j = 0; $j < count($criteria); $j++)
            {
                if ($criteria[$j] === 'Benefit')
                {
                    $normalizedRow[] = $row[$j] / $maxValues[$j];
                }
                elseif ($criteria[$j]=== 'Cost')
                {
                    $normalizedRow[] = $minValues[$j] / $row[$j] ;
                }
            }
            $normalizedMatrix[] = $normalizedRow;
            // dd($normalizedMatrix);
        }
        return $normalizedMatrix;
    }
    // public function create()
    // {
    //     $criteriadetail = CriteriaDetail::all();
    //     $candidates = Candidates::all();
    //     // dd($criteriadetail);

    //     return view('candidates.create', compact('candidates'));
    // }
    // public function store()
    // {
    //     // $criteria = Criteria::all() ; 
    //     // dd($criteria);
    //     $attributes = request()->validate([
    //         'namaKandidat'  =>'required',
    //         'c1raw'         =>'required',
    //         'c2raw'         =>'required',
    //         'c3raw'         =>'required',
    //         'c4raw'         =>'required',
    //         'c5raw'         =>'required',
    //         'c6raw'         =>'required',
    //     ]);
    //     Candidates::create($attributes);

    //     return redirect()->route('candidates.index');
    // }
    // public function edit(string $id)
    // {
    //     $candidates = Candidates::findOrFail($id);

    //     return view('candidates.edit', compact('candidates'));
    // }
    // public function update(Request $request, $id): RedirectResponse
    // {
    //     //validate form
    //     $this->validate($request, [
    //         'namaKandidat'  =>'required',
    //         'c1raw'         =>'required',
    //         'c2raw'         =>'required',
    //         'c3raw'         =>'required',
    //         'c4raw'         =>'required',
    //         'c5raw'         =>'required',
    //         'c6raw'         =>'required',
    //     ]);

    //     //get post by ID
    //     $candidates = Candidates::findOrFail($id);

    //         //update post without image
    //         $candidates->update([
    //             'namaKandidat'      =>$request->namaKandidat,
    //             'c1raw'             =>$request->c1raw,
    //             'c2raw'             =>$request->c2raw,
    //             'c3raw'             =>$request->c3raw,
    //             'c4raw'             =>$request->c4raw,
    //             'c5raw'             =>$request->c5raw,
    //             'c6raw'             =>$request->c6raw,
    //     ]);
    //     //redirect to index
    //     return redirect()->route('candidates.index');
    // }
    // public function destroy($id): RedirectResponse
    // {
    //     //get post by ID
    //     $candidates = Candidates::findOrFail($id);

    //     //delete post
    //     $candidates->delete();

    //     //redirect to index
    //     return redirect()->route('candidates.index');
    // }
    
}
