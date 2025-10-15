@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8" style="background-color: rgb(240, 241, 243); min-height: calc(100vh - 80px);">

    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                    <h2 class="text-xl font-bold text-white flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ __('Confirm Password') }}
                    </h2>
                </div>

                <!-- Body -->
                <div class="p-6">
                    <div class="mb-6">
                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ app()->getLocale() == 'fr' ? 'Veuillez confirmer votre mot de passe avant de continuer.' : 'Please confirm your password before continuing.' }}
                        </p>
                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                        @csrf

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    {{ __('Password') }}
                                </span>
                            </label>
                            <input id="password" 
                                   type="password" 
                                   name="password" 
                                   required 
                                   autocomplete="current-password"
                                   placeholder="{{ app()->getLocale() == 'fr' ? 'Votre mot de passe actuel' : 'Your current password' }}"
                                   class="block w-full px-4 py-3 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            @error('password')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
                                <span class="flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ __('Confirm Password') }}
                                </span>
                            </button>
                        </div>

                        <!-- Forgot Password Link -->
                        @if (Route::has('password.request'))
                        <div class="text-center pt-4 border-t border-gray-200">
                            <a href="{{ route('password.request') }}" 
                               class="text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                                {{ app()->getLocale() == 'fr' ? 'Mot de passe oublié ?' : 'Forgot Your Password?' }}
                            </a>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
