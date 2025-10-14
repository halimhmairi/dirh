<!-- Toast Container -->
<div id="toast-container" class="fixed top-20 right-4 z-50 space-y-2 pointer-events-none">
    <!-- Les toasts seront insérés ici dynamiquement -->
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour créer et afficher un toast
    window.showToast = function(message, type = 'success') {
        const container = document.getElementById('toast-container');
        const toastId = 'toast-' + Date.now();
        
        // Configuration des couleurs selon le type
        const types = {
            success: {
                bg: 'bg-green-50',
                border: 'border-green-500',
                icon: 'text-green-500',
                iconPath: 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'
            },
            error: {
                bg: 'bg-red-50',
                border: 'border-red-500',
                icon: 'text-red-500',
                iconPath: 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'
            },
            warning: {
                bg: 'bg-yellow-50',
                border: 'border-yellow-500',
                icon: 'text-yellow-500',
                iconPath: 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'
            },
            info: {
                bg: 'bg-blue-50',
                border: 'border-blue-500',
                icon: 'text-blue-500',
                iconPath: 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
            }
        };
        
        const config = types[type] || types.success;
        
        // Créer le toast
        const toast = document.createElement('div');
        toast.id = toastId;
        toast.className = `${config.bg} border-l-4 ${config.border} p-4 rounded-r-lg shadow-lg pointer-events-auto transform transition-all duration-300 ease-in-out translate-x-full opacity-0 max-w-sm`;
        toast.innerHTML = `
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 ${config.icon}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${config.iconPath}"/>
                    </svg>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-medium text-gray-900">${message}</p>
                </div>
                <div class="ml-4 flex-shrink-0">
                    <button onclick="removeToast('${toastId}')" class="inline-flex text-gray-400 hover:text-gray-600 focus:outline-none transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="mt-2 h-1 bg-gray-200 rounded-full overflow-hidden">
                <div class="h-full ${config.border.replace('border-', 'bg-')} progress-bar" style="width: 100%; animation: progress 3s linear;"></div>
            </div>
        `;
        
        container.appendChild(toast);
        
        // Animation d'entrée
        setTimeout(() => {
            toast.classList.remove('translate-x-full', 'opacity-0');
            toast.classList.add('translate-x-0', 'opacity-100');
        }, 10);
        
        // Suppression automatique après 3 secondes
        setTimeout(() => {
            removeToast(toastId);
        }, 3000);
    };
    
    // Fonction pour supprimer un toast
    window.removeToast = function(toastId) {
        const toast = document.getElementById(toastId);
        if (toast) {
            toast.classList.add('translate-x-full', 'opacity-0');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }
    };
});
</script>

<style>
@keyframes progress {
    from {
        width: 100%;
    }
    to {
        width: 0%;
    }
}

.progress-bar {
    transition: width 3s linear;
}
</style>

@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    showToast("{{ session('success') }}", 'success');
});
</script>
@endif

@if(session('error'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    showToast("{{ session('error') }}", 'error');
});
</script>
@endif

@if(session('warning'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    showToast("{{ session('warning') }}", 'warning');
});
</script>
@endif

@if(session('info'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    showToast("{{ session('info') }}", 'info');
});
</script>
@endif

