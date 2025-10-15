@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8" style="background-color: rgb(240, 241, 243); min-height: calc(100vh - 80px);">
    <div class="flex justify-center">
        <div class="w-full max-w-4xl">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- En-tête -->
                <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                    <h2 class="text-xl font-bold text-white flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        Démo Toast Tailwind CSS
                    </h2>
                </div>

                <!-- Corps -->
                <div class="p-6 space-y-6">
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg mb-6">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <div class="flex-1">
                                <p class="text-sm text-blue-800 font-medium">Testez les différents types de toasts</p>
                                <p class="text-xs text-blue-700 mt-1">Cliquez sur les boutons ci-dessous pour voir les toasts en action</p>
                            </div>
                        </div>
                    </div>

                    <!-- Boutons de test -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        
                        <!-- Toast Success -->
                        <div class="border border-green-200 rounded-lg p-4 bg-green-50">
                            <h3 class="text-lg font-semibold text-green-800 mb-2 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Success Toast
                            </h3>
                            <p class="text-sm text-green-700 mb-3">Notification de succès (vert)</p>
                            <button onclick="showToast('{{ __('messages.Your category has been updated!') }}', 'success')" 
                                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                                Afficher Success
                            </button>
                        </div>

                        <!-- Toast Error -->
                        <div class="border border-red-200 rounded-lg p-4 bg-red-50">
                            <h3 class="text-lg font-semibold text-red-800 mb-2 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                Error Toast
                            </h3>
                            <p class="text-sm text-red-700 mb-3">Notification d'erreur (rouge)</p>
                            <button onclick="showToast('Une erreur est survenue lors de la mise à jour!', 'error')" 
                                    class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                                Afficher Error
                            </button>
                        </div>

                        <!-- Toast Warning -->
                        <div class="border border-yellow-200 rounded-lg p-4 bg-yellow-50">
                            <h3 class="text-lg font-semibold text-yellow-800 mb-2 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                Warning Toast
                            </h3>
                            <p class="text-sm text-yellow-700 mb-3">Notification d'avertissement (jaune)</p>
                            <button onclick="showToast('Attention! Veuillez vérifier vos données avant de continuer.', 'warning')" 
                                    class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                                Afficher Warning
                            </button>
                        </div>

                        <!-- Toast Info -->
                        <div class="border border-blue-200 rounded-lg p-4 bg-blue-50">
                            <h3 class="text-lg font-semibold text-blue-800 mb-2 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                Info Toast
                            </h3>
                            <p class="text-sm text-blue-700 mb-3">Notification d'information (bleu)</p>
                            <button onclick="showToast('Information: Une nouvelle fonctionnalité est disponible!', 'info')" 
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                                Afficher Info
                            </button>
                        </div>

                    </div>

                    <!-- Test multiple toasts -->
                    <div class="border-t border-gray-200 pt-6 mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Test Multiple Toasts</h3>
                        <button onclick="testMultipleToasts()" 
                                class="bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white font-semibold py-3 px-6 rounded-lg transition-all shadow-md hover:shadow-lg">
                            Afficher 4 toasts simultanément
                        </button>
                    </div>

                    <!-- Code d'exemple -->
                    <div class="border-t border-gray-200 pt-6 mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Utilisation dans les contrôleurs</h3>
                        <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                            <pre class="text-green-400 text-sm"><code>// Dans votre contrôleur
public function update(Request $request, $id)
{
    $category->update($request->all());
    
    toast(__('messages.Your category has been updated!'), 'success');
    
    return redirect('/category');
}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function testMultipleToasts() {
    setTimeout(() => showToast('1ère notification - Success', 'success'), 0);
    setTimeout(() => showToast('2ème notification - Info', 'info'), 500);
    setTimeout(() => showToast('3ème notification - Warning', 'warning'), 1000);
    setTimeout(() => showToast('4ème notification - Error', 'error'), 1500);
}
</script>

@endsection


