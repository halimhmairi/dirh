<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leave;
use App\Models\Candidate;
use App\Models\Training;
use App\Models\Department;
use App\Models\Job;
use App\Models\LeaveType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stats = null;
        $leavesByStatus = null;
        $usersByDepartment = null;
        $candidatesByMonth = null;
        $leavesByType = null;

        // Vérifier si l'utilisateur est admin pour afficher les statistiques
        if (auth()->user()->role->name === 'admin') {
            // Statistiques générales
            $stats = [
                'total_users' => User::count(),
                'pending_leaves' => Leave::where('status', 'planned')->count(),
                'total_candidates' => Candidate::count(),
                'total_trainings' => Training::count(),
                'total_departments' => Department::count(),
                'active_jobs' => Job::where('status', 'active')->count(),
            ];

            // Congés par statut
            $leavesByStatus = Leave::select('status', DB::raw('count(*) as total'))
                ->groupBy('status')
                ->get();

            // Employés par département
            $usersByDepartment = Department::withCount('user')
                ->get()
                ->map(function($dept) {
                    return [
                        'name' => $dept->name,
                        'count' => $dept->user_count
                    ];
                });

            // Candidatures par mois (6 derniers mois)
            $candidatesByMonth = Candidate::select(
                    DB::raw('MONTH(created_at) as month'),
                    DB::raw('YEAR(created_at) as year'),
                    DB::raw('count(*) as total')
                )
                ->where('created_at', '>=', Carbon::now()->subMonths(6))
                ->groupBy('year', 'month')
                ->orderBy('year', 'asc')
                ->orderBy('month', 'asc')
                ->get();

            // Congés par type
            $leavesByType = LeaveType::withCount('leave')
                ->get()
                ->map(function($type) {
                    return [
                        'name' => $type->name,
                        'count' => $type->leave_count
                    ];
                });
        }

        return view('home', compact('stats', 'leavesByStatus', 'usersByDepartment', 'candidatesByMonth', 'leavesByType'));
    }
}
