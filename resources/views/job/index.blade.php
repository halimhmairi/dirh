@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center"> 
        <div class="w-full lg:w-2/3">
            
            <!-- Formulaire de filtrage -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                    </svg>
                    Filtrer les offres
                </h2>
                
                <form method="GET" action="{{ route(config('app.name').'.jobs.jobs') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        
                        <!-- Recherche par mot-clé -->
                        <div>
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
                                Mot-clé
                            </label>
                            <div class="relative">
                                <input type="text" 
                                       name="search" 
                                       id="search"
                                       value="{{ request('search') }}"
                                       placeholder="Titre, description..." 
                                       class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <svg class="absolute left-3 top-3 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Filtre par statut -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                Statut
                            </label>
                            <select name="status" 
                                    id="status" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <option value="">Tous les statuts</option>
                                <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Ouvert</option>
                                <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Fermé</option>
                                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Brouillon</option>
                            </select>
                        </div>

                        <!-- Filtre par date -->
                        <div>
                            <label for="date_filter" class="block text-sm font-medium text-gray-700 mb-2">
                                Période
                            </label>
                            <select name="date_filter" 
                                    id="date_filter" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <option value="">Toutes les dates</option>
                                <option value="today" {{ request('date_filter') == 'today' ? 'selected' : '' }}>Aujourd'hui</option>
                                <option value="week" {{ request('date_filter') == 'week' ? 'selected' : '' }}>Cette semaine</option>
                                <option value="month" {{ request('date_filter') == 'month' ? 'selected' : '' }}>Ce mois</option>
                                <option value="year" {{ request('date_filter') == 'year' ? 'selected' : '' }}>Cette année</option>
                            </select>
                        </div>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="flex flex-wrap gap-3 pt-2">
                        <button type="submit" 
                                class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-2.5 px-6 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Rechercher
                        </button>
                        
                        <a href="{{ route(config('app.name').'.jobs.jobs') }}" 
                           class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 px-6 rounded-lg transition-colors duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Réinitialiser
                        </a>
                    </div>
                </form>
        </div>

            <!-- Résultats de recherche -->
            @if(request()->hasAny(['search', 'status', 'date_filter']))
                <div class="mb-4 p-4 bg-blue-50 border-l-4 border-blue-500 rounded-r-lg">
                    <p class="text-sm text-blue-700">
                        <span class="font-semibold">{{ $jobs->total() }}</span> offre(s) trouvée(s)
                        @if(request('search'))
                            pour "<span class="font-semibold">{{ request('search') }}</span>"
                        @endif
                    </p>
                </div>
            @endif

            @forelse($jobs as $job)
            <div class="mb-6">
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                    <!-- Card Body -->
                    <div class="p-6">
                        <h1 class="text-3xl font-bold text-gray-800 mb-3">{{$job->title}}</h1>
                        <p class="text-gray-600 text-base leading-relaxed mb-4">{{$job->jobsummary}}</p> 
                        <x-badge :badges="$job->tags" /> 
                    </div>
                    
                    <!-- Card Footer -->
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-between items-center">
                        <small class="text-gray-500 text-sm">
                            Publié {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}
                        </small>
                        <a href="{{ Route(config('app.name').'.jobs.show',$job) }}" 
                           class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-2.5 px-6 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg hover:scale-105 group">
                            <span>Voir les détails</span>
                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-r-lg">
                <div class="flex items-center">
                    <svg class="w-10 h-10 text-yellow-400 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-yellow-800">Aucune offre trouvée</h3>
                        <p class="text-yellow-700 mt-1">Essayez de modifier vos critères de recherche ou réinitialisez les filtres.</p>
                    </div>
                </div>
    </div>
            @endforelse
        </div>
</div>

    <!-- Pagination -->
    @if($jobs->count() > 0)
    <div class="flex justify-center mt-8"> 
  {{ $jobs->links('pagination.custom') }}
</div>
    @endif
</div>

@endsection