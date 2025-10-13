@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8" style="background-color: rgb(240, 241, 243); min-height: calc(100vh - 80px);">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- En-tête -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Configuration Email
                </h2>
                <p class="text-blue-100 text-sm mt-1">Configurez les paramètres SMTP pour l'envoi d'emails</p>
            </div>

            <!-- Corps -->
            <div class="p-6">
                <form method="POST" action="{{ route('config.email.update') }}" class="space-y-6">
                    @csrf

                    <!-- Information -->
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
                        <div class="flex">
                            <svg class="w-5 h-5 text-blue-600 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <p class="text-sm text-blue-700">Ces paramètres sont stockés dans le fichier .env. Après modification, videz le cache de configuration.</p>
                        </div>
                    </div>

                    <!-- Configuration du serveur SMTP -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>
                            </svg>
                            Serveur SMTP
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Mail Mailer -->
                            <div>
                                <label for="mail_mailer" class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                        </svg>
                                        Type de mailer
                                    </span>
                                </label>
                                <select name="mail_mailer" 
                                        id="mail_mailer"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    <option value="smtp" {{ $emailConfig['mail_mailer'] == 'smtp' ? 'selected' : '' }}>SMTP</option>
                                    <option value="sendmail" {{ $emailConfig['mail_mailer'] == 'sendmail' ? 'selected' : '' }}>Sendmail</option>
                                    <option value="mailgun" {{ $emailConfig['mail_mailer'] == 'mailgun' ? 'selected' : '' }}>Mailgun</option>
                                    <option value="ses" {{ $emailConfig['mail_mailer'] == 'ses' ? 'selected' : '' }}>Amazon SES</option>
                                </select>
                            </div>

                            <!-- Mail Host -->
                            <div>
                                <label for="mail_host" class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>
                                        </svg>
                                        Serveur SMTP
                                    </span>
                                </label>
                                <input type="text" 
                                       name="mail_host" 
                                       id="mail_host"
                                       value="{{ $emailConfig['mail_host'] }}"
                                       placeholder="smtp.gmail.com"
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            </div>

                            <!-- Mail Port -->
                            <div>
                                <label for="mail_port" class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                                        </svg>
                                        Port SMTP
                                    </span>
                                </label>
                                <input type="number" 
                                       name="mail_port" 
                                       id="mail_port"
                                       value="{{ $emailConfig['mail_port'] }}"
                                       placeholder="587"
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            </div>

                            <!-- Encryption -->
                            <div>
                                <label for="mail_encryption" class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                        Chiffrement
                                    </span>
                                </label>
                                <select name="mail_encryption" 
                                        id="mail_encryption"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    <option value="tls" {{ $emailConfig['mail_encryption'] == 'tls' ? 'selected' : '' }}>TLS</option>
                                    <option value="ssl" {{ $emailConfig['mail_encryption'] == 'ssl' ? 'selected' : '' }}>SSL</option>
                                    <option value="null" {{ $emailConfig['mail_encryption'] == 'null' ? 'selected' : '' }}>Aucun</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Authentification -->
                    <div class="space-y-4 pt-6 border-t">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                            </svg>
                            Authentification
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Username -->
                            <div>
                                <label for="mail_username" class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        Nom d'utilisateur
                                    </span>
                                </label>
                                <input type="text" 
                                       name="mail_username" 
                                       id="mail_username"
                                       value="{{ $emailConfig['mail_username'] }}"
                                       placeholder="votre-email@example.com"
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="mail_password" class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                        Mot de passe
                                    </span>
                                </label>
                                <input type="password" 
                                       name="mail_password" 
                                       id="mail_password"
                                       value="{{ $emailConfig['mail_password'] }}"
                                       placeholder="••••••••"
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            </div>
                        </div>
                    </div>

                    <!-- Expéditeur -->
                    <div class="space-y-4 pt-6 border-t">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Informations de l'expéditeur
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- From Address -->
                            <div>
                                <label for="mail_from_address" class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                        </svg>
                                        Adresse email
                                    </span>
                                </label>
                                <input type="email" 
                                       name="mail_from_address" 
                                       id="mail_from_address"
                                       value="{{ $emailConfig['mail_from_address'] }}"
                                       placeholder="noreply@example.com"
                                       required
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            </div>

                            <!-- From Name -->
                            <div>
                                <label for="mail_from_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                        </svg>
                                        Nom de l'expéditeur
                                    </span>
                                </label>
                                <input type="text" 
                                       name="mail_from_name" 
                                       id="mail_from_name"
                                       value="{{ $emailConfig['mail_from_name'] }}"
                                       placeholder="{{ config('app.name') }}"
                                       required
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            </div>
                        </div>
                    </div>

                    <!-- Bouton de sauvegarde -->
                    <div class="flex justify-end gap-3 pt-6 border-t">
                        <button type="button" 
                                onclick="testEmail()"
                                class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 px-6 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Tester la connexion
                        </button>
                        <button type="submit" 
                                class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-2.5 px-6 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Aide & Documentation -->
        <div class="mt-6 bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Aide & Exemples de configuration
            </h3>
            
            <div class="space-y-4">
                <!-- Gmail -->
                <div class="border rounded-lg p-4">
                    <h4 class="font-semibold text-gray-700 mb-2">Gmail</h4>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li><strong>Host:</strong> smtp.gmail.com</li>
                        <li><strong>Port:</strong> 587 (TLS) ou 465 (SSL)</li>
                        <li><strong>Username:</strong> votre-email@gmail.com</li>
                        <li><strong>Password:</strong> Mot de passe d'application</li>
                    </ul>
                </div>

                <!-- Mailtrap -->
                <div class="border rounded-lg p-4">
                    <h4 class="font-semibold text-gray-700 mb-2">Mailtrap (Test)</h4>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li><strong>Host:</strong> smtp.mailtrap.io</li>
                        <li><strong>Port:</strong> 2525</li>
                        <li><strong>Username:</strong> Votre username Mailtrap</li>
                        <li><strong>Password:</strong> Votre password Mailtrap</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function testEmail() {
    alert('Fonctionnalité de test email - À implémenter');
}
</script>
@endpush

@endsection

