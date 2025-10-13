<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\LeaveSetting;

class LeaveSettingController extends Controller
{
    /**
     * Display leave settings page
     */
    public function index()
    {
        // Récupérer ou initialiser les paramètres
        $settings = [
            'monthly_leave_days' => LeaveSetting::get('monthly_leave_days', 2.5),
            'yearly_leave_days' => LeaveSetting::get('yearly_leave_days', 30),
            'max_carry_forward' => LeaveSetting::get('max_carry_forward', 10),
            'leave_request_deadline' => LeaveSetting::get('leave_request_deadline', 7),
            'auto_approve' => LeaveSetting::get('auto_approve', false),
            'require_manager_approval' => LeaveSetting::get('require_manager_approval', true),
            'allow_negative_balance' => LeaveSetting::get('allow_negative_balance', false),
            'sick_leave_days_per_year' => LeaveSetting::get('sick_leave_days_per_year', 15),
        ];
        
        // Statistiques globales
        $totalLeaveRequests = Leave::count();
        $pendingRequests = Leave::where('status', 'Planned')->count();
        $acceptedRequests = Leave::where('status', 'Accepted')->count();
        $rejectedRequests = Leave::where('status', 'Rejected')->count();
        
        return view('leave.settings.index', compact(
            'settings',
            'totalLeaveRequests',
            'pendingRequests',
            'acceptedRequests',
            'rejectedRequests'
        ));
    }
    
    /**
     * Update leave settings
     */
    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'monthly_leave_days' => 'required|numeric|min:0|max:31',
            'yearly_leave_days' => 'required|numeric|min:0|max:365',
            'max_carry_forward' => 'required|numeric|min:0|max:365',
            'leave_request_deadline' => 'required|numeric|min:0|max:90',
            'auto_approve' => 'nullable|boolean',
            'require_manager_approval' => 'nullable|boolean',
            'allow_negative_balance' => 'nullable|boolean',
            'sick_leave_days_per_year' => 'required|numeric|min:0|max:365',
        ]);
        
        // Sauvegarder chaque paramètre
        LeaveSetting::set('monthly_leave_days', $validated['monthly_leave_days'], 'Jours de congé par mois', 'number');
        LeaveSetting::set('yearly_leave_days', $validated['yearly_leave_days'], 'Jours de congé par an', 'number');
        LeaveSetting::set('max_carry_forward', $validated['max_carry_forward'], 'Maximum de jours reportables', 'number');
        LeaveSetting::set('leave_request_deadline', $validated['leave_request_deadline'], 'Délai de demande (jours à l\'avance)', 'number');
        LeaveSetting::set('auto_approve', $request->has('auto_approve'), 'Approbation automatique', 'boolean');
        LeaveSetting::set('require_manager_approval', $request->has('require_manager_approval'), 'Approbation du manager requise', 'boolean');
        LeaveSetting::set('allow_negative_balance', $request->has('allow_negative_balance'), 'Autoriser le solde négatif', 'boolean');
        LeaveSetting::set('sick_leave_days_per_year', $validated['sick_leave_days_per_year'], 'Jours de congé maladie par an', 'number');
        
        return redirect()->route('settings.index')->with('success', 'Paramètres mis à jour avec succès');
    }
}
