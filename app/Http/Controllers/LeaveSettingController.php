<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveSetting;
use App\Models\Leave;

class LeaveSettingController extends Controller
{
    /**
     * Display the leave settings page
     */
    public function index()
    {
        // Get leave request statistics
        $totalLeaveRequests = Leave::count();
        $pendingRequests = Leave::where('status', 'pending')->count();
        $acceptedRequests = Leave::where('status', 'accepted')->count();
        $rejectedRequests = Leave::where('status', 'rejected')->count();

        // Get current settings with default values
        $settings = [
            'monthly_leave_days' => LeaveSetting::get('monthly_leave_days', 2.5),
            'yearly_leave_days' => LeaveSetting::get('yearly_leave_days', 30),
            'max_carry_forward' => LeaveSetting::get('max_carry_forward', 5),
            'leave_request_deadline' => LeaveSetting::get('leave_request_deadline', 0),
            'sick_leave_days_per_year' => LeaveSetting::get('sick_leave_days_per_year', 0),
            'auto_approve' => LeaveSetting::get('auto_approve', false),
            'require_manager_approval' => LeaveSetting::get('require_manager_approval', true),
            'allow_negative_balance' => LeaveSetting::get('allow_negative_balance', false),
        ];

        return view('leave.settings.index', compact(
            'totalLeaveRequests',
            'pendingRequests', 
            'acceptedRequests',
            'rejectedRequests',
            'settings'
        ));
    }

    /**
     * Update leave settings
     */
    public function updateSettings(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'monthly_leave_days' => 'required|numeric|min:0|max:31',
                'yearly_leave_days' => 'required|numeric|min:0|max:365',
                'max_carry_forward' => 'required|numeric|min:0|max:365',
                'leave_request_deadline' => 'required|numeric|min:0|max:90',
                'sick_leave_days_per_year' => 'required|numeric|min:0|max:365',
            ]);

            // Update settings
            LeaveSetting::set('monthly_leave_days', $request->monthly_leave_days, 'Nombre de jours de congé acquis chaque mois', 'number');
            LeaveSetting::set('yearly_leave_days', $request->yearly_leave_days, 'Total de jours de congé payés par an', 'number');
            LeaveSetting::set('max_carry_forward', $request->max_carry_forward, 'Nombre maximum de jours reportables sur l\'année suivante', 'number');
            LeaveSetting::set('leave_request_deadline', $request->leave_request_deadline, 'Nombre de jours à l\'avance pour faire une demande', 'number');
            LeaveSetting::set('sick_leave_days_per_year', $request->sick_leave_days_per_year, 'Nombre de jours de congé maladie par an', 'number');
            
            // Boolean settings
            LeaveSetting::set('auto_approve', $request->has('auto_approve'), 'Les demandes sont approuvées automatiquement', 'boolean');
            LeaveSetting::set('require_manager_approval', $request->has('require_manager_approval'), 'Les demandes doivent être validées par un manager', 'boolean');
            LeaveSetting::set('allow_negative_balance', $request->has('allow_negative_balance'), 'Les employés peuvent prendre des congés même sans solde suffisant', 'boolean');

            return redirect()->route('settings.index')
                ->with('success', 'Les paramètres ont été mis à jour avec succès.');

        } catch (\Exception $e) {
            return redirect()->route('settings.index')
                ->with('error', 'Une erreur est survenue lors de la mise à jour des paramètres: ' . $e->getMessage());
        }
    }
}
