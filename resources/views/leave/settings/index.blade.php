@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8" style="background-color: rgb(240, 241, 243); min-height: calc(100vh - 80px);">
    
    <!-- En-tête avec titre -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Configuration des Congés</h1>
        <p class="text-gray-600">Gérez les paramètres globaux de gestion des congés pour votre entreprise</p>
    </div>

    <!-- Messages de succès/erreur -->
    @if(session('success'))
    <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg animate-fade-in">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="text-green-800 font-medium">{{ session('success') }}</span>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg animate-fade-in">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <span class="text-red-800 font-medium">{{ session('error') }}</span>
        </div>
    </div>
    @endif

    <!-- Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total des demandes -->
        <div class="bg-white rounded-lg shadow-md p-6 transform transition-all hover:shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Total des demandes</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalLeaveRequests }}</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- En attente -->
        <div class="bg-white rounded-lg shadow-md p-6 transform transition-all hover:shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">En attente</p>
                    <p class="text-3xl font-bold text-yellow-600">{{ $pendingRequests }}</p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Acceptées -->
        <div class="bg-white rounded-lg shadow-md p-6 transform transition-all hover:shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Acceptées</p>
                    <p class="text-3xl font-bold text-green-600">{{ $acceptedRequests }}</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Rejetées -->
        <div class="bg-white rounded-lg shadow-md p-6 transform transition-all hover:shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 mb-1">Rejetées</p>
                    <p class="text-3xl font-bold text-red-600">{{ $rejectedRequests }}</p>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Paramètres de Congés -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Paramètres Globaux
            </h2>
            <p class="text-gray-600 mt-2">Configurez les règles de gestion des congés pour votre entreprise</p>
        </div>

        <form method="POST" action="{{ route('settings.updateSettings') }}" class="space-y-6">
            @csrf

            <!-- Grille de paramètres -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Jours de congé par mois -->
                <div>
                    <label for="monthly_leave_days" class="block text-sm font-medium text-gray-700 mb-2">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Jours de congé par mois
                        </span>
                    </label>
                    <input type="number" name="monthly_leave_days" id="monthly_leave_days" 
                           value="{{ $settings['monthly_leave_days'] }}" 
                           step="0.5" min="0" max="31"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-xs text-gray-500 mt-1">Nombre de jours de congé acquis chaque mois</p>
                </div>

                <!-- Jours de congé par an -->
                <div>
                    <label for="yearly_leave_days" class="block text-sm font-medium text-gray-700 mb-2">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Jours de congé par an
                        </span>
                    </label>
                    <input type="number" name="yearly_leave_days" id="yearly_leave_days" 
                           value="{{ $settings['yearly_leave_days'] }}" 
                           min="0" max="365"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-xs text-gray-500 mt-1">Total de jours de congé payés par an</p>
                </div>

                <!-- Maximum reportable -->
                <div>
                    <label for="max_carry_forward" class="block text-sm font-medium text-gray-700 mb-2">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Maximum de jours reportables
                        </span>
                    </label>
                    <input type="number" name="max_carry_forward" id="max_carry_forward" 
                           value="{{ $settings['max_carry_forward'] }}" 
                           min="0" max="365"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-xs text-gray-500 mt-1">Nombre maximum de jours reportables sur l'année suivante</p>
                </div>

                <!-- Délai de demande -->
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <label for="leave_request_deadline" class="block text-sm font-medium text-gray-700">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Délai de demande
                            </span>
                        </label>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" 
                                   id="enable_request_deadline" 
                                   onchange="toggleDeadlineField()"
                                   {{ $settings['leave_request_deadline'] > 0 ? 'checked' : '' }}
                                   class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-700">Activer</span>
                        </label>
                    </div>
                    <div id="deadline_field_container">
                        <input type="number" 
                               name="leave_request_deadline" 
                               id="leave_request_deadline" 
                               value="{{ $settings['leave_request_deadline'] }}" 
                               min="0" 
                               max="90"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <p class="text-xs text-gray-500 mt-1">Nombre de jours à l'avance pour faire une demande</p>
                    </div>
                </div>

                <!-- Jours de congé maladie -->
                <div>
                    <label for="sick_leave_days_per_year" class="block text-sm font-medium text-gray-700 mb-2">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Jours de congé maladie par an
                        </span>
                    </label>
                    <input type="number" name="sick_leave_days_per_year" id="sick_leave_days_per_year" 
                           value="{{ $settings['sick_leave_days_per_year'] }}" 
                           min="0" max="365"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-xs text-gray-500 mt-1">Nombre de jours de congé maladie par an</p>
                </div>
            </div>

            <!-- Options booléennes -->
            <div class="border-t pt-6 space-y-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Options de gestion</h3>
                
                <!-- Approbation automatique -->
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div class="flex-1">
                        <label for="auto_approve" class="font-medium text-gray-700 cursor-pointer">
                            Approbation automatique
                        </label>
                        <p class="text-sm text-gray-500">Les demandes sont approuvées automatiquement</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="auto_approve" id="auto_approve" 
                               {{ $settings['auto_approve'] ? 'checked' : '' }}
                               class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>

                <!-- Approbation du manager -->
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div class="flex-1">
                        <label for="require_manager_approval" class="font-medium text-gray-700 cursor-pointer">
                            Approbation du manager requise
                        </label>
                        <p class="text-sm text-gray-500">Les demandes doivent être validées par un manager</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="require_manager_approval" id="require_manager_approval" 
                               {{ $settings['require_manager_approval'] ? 'checked' : '' }}
                               class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>

                <!-- Solde négatif -->
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div class="flex-1">
                        <label for="allow_negative_balance" class="font-medium text-gray-700 cursor-pointer">
                            Autoriser le solde négatif
                        </label>
                        <p class="text-sm text-gray-500">Les employés peuvent prendre des congés même sans solde suffisant</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="allow_negative_balance" id="allow_negative_balance" 
                               {{ $settings['allow_negative_balance'] ? 'checked' : '' }}
                               class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
            </div>

            <!-- Bouton de sauvegarde -->
            <div class="flex justify-end pt-6 border-t">
                <button type="submit" 
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Enregistrer les paramètres
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
// Fonction pour activer/désactiver le champ de délai
function toggleDeadlineField() {
    const enableCheckbox = document.getElementById('enable_request_deadline');
    const deadlineInput = document.getElementById('leave_request_deadline');
    const deadlineContainer = document.getElementById('deadline_field_container');
    
    if (enableCheckbox.checked) {
        deadlineContainer.classList.remove('opacity-50');
        deadlineInput.disabled = false;
        if (deadlineInput.value == '0') {
            deadlineInput.value = '7'; // Valeur par défaut
        }
    } else {
        deadlineContainer.classList.add('opacity-50');
        deadlineInput.disabled = true;
        deadlineInput.value = '0'; // Mettre à 0 pour désactiver
    }
}

// Initialiser l'état au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    toggleDeadlineField();
});
</script>
@endpush

@endsection
