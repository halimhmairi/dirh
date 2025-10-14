@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        
        <!-- En-tête du Dashboard -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">{{ __('messages.Dashboard') }}</h1>
            <p class="mt-2 text-sm text-gray-600">{{ __('messages.Welcome back') }}, {{ Auth::user()->name }}</p>
        </div>

        <!-- Cartes de Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            
            <!-- Total Utilisateurs -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">{{ __('messages.Total Users') }}</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_users'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Congés en Attente -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">{{ __('messages.Pending Leaves') }}</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['pending_leaves'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Candidats -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">{{ __('messages.Total Candidates') }}</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_candidates'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Formations -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">{{ __('messages.Total Trainings') }}</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_trainings'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Départements -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-indigo-500 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">{{ __('messages.Total Departments') }}</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['total_departments'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Postes Actifs -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-cyan-500 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">{{ __('messages.Active Jobs') }}</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['active_jobs'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-cyan-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

        </div>

        <!-- Graphiques -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            
            <!-- Graphique: Congés par Statut -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('messages.Leaves by Status') }}</h3>
                <div class="relative h-64">
                    <canvas id="leavesByStatusChart"></canvas>
                </div>
            </div>

            <!-- Graphique: Employés par Département -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('messages.Employees by Department') }}</h3>
                <div class="relative h-64">
                    <canvas id="usersByDepartmentChart"></canvas>
                </div>
            </div>

            <!-- Graphique: Candidatures par Mois -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('messages.Candidates by Month') }}</h3>
                <div class="relative h-64">
                    <canvas id="candidatesByMonthChart"></canvas>
                </div>
                        </div>

            <!-- Graphique: Congés par Type -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('messages.Leaves by Type') }}</h3>
                <div class="relative h-64">
                    <canvas id="leavesByTypeChart"></canvas>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

@push('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Configuration commune pour tous les graphiques
    Chart.defaults.font.family = "'Inter', sans-serif";
    Chart.defaults.color = '#6B7280';

    // 1. Graphique: Congés par Statut (Pie Chart)
    const leavesByStatusCtx = document.getElementById('leavesByStatusChart').getContext('2d');
    const leavesByStatusData = @json($leavesByStatus);
    
    new Chart(leavesByStatusCtx, {
        type: 'doughnut',
        data: {
            labels: leavesByStatusData.map(item => {
                const statusMap = {
                    'planned': '{{ __('messages.Planned') }}',
                    'approved': '{{ __('messages.Approved') }}',
                    'rejected': '{{ __('messages.Rejected') }}',
                    'cancelled': '{{ __('messages.Cancelled') }}'
                };
                return statusMap[item.status] || item.status;
            }),
            datasets: [{
                data: leavesByStatusData.map(item => item.total),
                backgroundColor: [
                    '#3B82F6', // blue
                    '#10B981', // green
                    '#EF4444', // red
                    '#6B7280'  // gray
                ],
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        usePointStyle: true
                    }
                }
            }
        }
    });

    // 2. Graphique: Employés par Département (Bar Chart)
    const usersByDepartmentCtx = document.getElementById('usersByDepartmentChart').getContext('2d');
    const usersByDepartmentData = @json($usersByDepartment);
    
    new Chart(usersByDepartmentCtx, {
        type: 'bar',
        data: {
            labels: usersByDepartmentData.map(item => item.name),
            datasets: [{
                label: '{{ __('messages.Employees') }}',
                data: usersByDepartmentData.map(item => item.count),
                backgroundColor: '#6366F1',
                borderRadius: 6,
                barThickness: 40
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    },
                    grid: {
                        color: '#F3F4F6'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // 3. Graphique: Candidatures par Mois (Line Chart)
    const candidatesByMonthCtx = document.getElementById('candidatesByMonthChart').getContext('2d');
    const candidatesByMonthData = @json($candidatesByMonth);
    
    const monthNames = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'];
    
    new Chart(candidatesByMonthCtx, {
        type: 'line',
        data: {
            labels: candidatesByMonthData.map(item => monthNames[item.month - 1] + ' ' + item.year),
            datasets: [{
                label: '{{ __('messages.Candidates') }}',
                data: candidatesByMonthData.map(item => item.total),
                borderColor: '#10B981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#10B981',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    },
                    grid: {
                        color: '#F3F4F6'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // 4. Graphique: Congés par Type (Horizontal Bar Chart)
    const leavesByTypeCtx = document.getElementById('leavesByTypeChart').getContext('2d');
    const leavesByTypeData = @json($leavesByType);
    
    new Chart(leavesByTypeCtx, {
        type: 'bar',
        data: {
            labels: leavesByTypeData.map(item => item.name),
            datasets: [{
                label: '{{ __('messages.Leaves') }}',
                data: leavesByTypeData.map(item => item.count),
                backgroundColor: '#06B6D4',
                borderRadius: 6,
                barThickness: 30
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    },
                    grid: {
                        color: '#F3F4F6'
                    }
                },
                y: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

});
</script>
@endpush
