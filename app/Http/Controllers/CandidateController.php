<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use App\Http\Requests\recruitment\candidate\StoreCandidateRequest;
use App\Http\Requests\recruitment\candidate\UpdateCandidateRequest;
use App\Services\user\candidate\CandidateService;

use App\Repositories\recruitment\candidate\CandidateRepository;

class CandidateController extends Controller
{ 

   public function __construct(
        public CandidateRepository $candidateRepository,
        public CandidateService $candidateService
    )
   {
        $this->candidateRepository = $candidateRepository;

        $this->candidateService = $candidateService;
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = $this->candidateRepository->paginate(5,['*'],'page'); 

        return view('dashboard.candidate.index',compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCandidateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCandidateRequest $request)
    {

       $candidate = $this->candidateService->store($request->all()); 
      
       dd(
          $candidate
       );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
   
        $candidateData = $this->candidateRepository->getById($candidate->id);
        return response()->json([
            "data" => $candidateData
        ]);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCandidateRequest  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $this->candidateRepository->updateById($candidate->id,$request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $this->candidateRepository->deleteById($candidate->id);
        toast('Candidate as been deleted!','success');
        return redirect()->back();
    }
}
