<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\recruitment\job\StoreJobRequest;
use App\Http\Requests\recruitment\job\UpdateJobRequest;
use App\Repositories\recruitment\job\JobRepository;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public $jobRepository;  

    public function __construct(JobRepository $jobRepository)
    {
        //check permission
        
        $this->jobRepository =  $jobRepository; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at','DESC')->paginate(5);
     
        return view('dashboard.jobs.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        $this->jobRepository->create($request->all());

        $job = Job::create($request->all()); 
        toast('Your Job as been submited!','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = $this->jobRepository->getById($id); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::find($id);
        return view('dashboard.jobs.edit',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJobRequest  $request 
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request)
    {
        Job::find($request->id)->update($request->except('id')); 
        toast('Your job as been updatedt!','success');
        return redirect('/jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        Job::destroy($job->id);
        return redirect()->back()->with('success','deleted with successfully');
    }

    public function jobs()
    {
        $query = Job::query();

        // Filtre par recherche (titre ou description)
        if (request('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('jobsummary', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->orWhere('tags', 'LIKE', "%{$search}%");
            });
        }

        // Filtre par statut
        if (request('status')) {
            $query->where('status', request('status'));
        }

        // Filtre par date
        if (request('date_filter')) {
            $dateFilter = request('date_filter');
            
            switch ($dateFilter) {
                case 'today':
                    $query->whereDate('created_at', today());
                    break;
                case 'week':
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'month':
                    $query->whereMonth('created_at', now()->month)
                          ->whereYear('created_at', now()->year);
                    break;
                case 'year':
                    $query->whereYear('created_at', now()->year);
                    break;
            }
        }

        // Tri par date de création (plus récent en premier)
        $query->orderBy('created_at', 'DESC');

        $jobs = $query->paginate(6)->appends(request()->query());
        
        return view("job.index", compact("jobs"));
    }

    public function jobsShow($job)
    {
        $job =  Job::find($job)->first(); 

        return view("job.show",compact("job"));
    }


}
