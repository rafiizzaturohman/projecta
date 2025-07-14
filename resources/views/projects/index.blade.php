<x-app-layout>
    {{-- Tabel User --}}
    @include('projects.partials.table')
<<<<<<< HEAD
    
    
=======
 
 {{-- Flash Success Message --}}
    @if(session('success'))
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-transition 
            x-init="setTimeout(() => show = false, 3000)"
            class="mt-4 px-4 py-3 text-primary text-base text-center"
        >
            {{ session('success') }}
        </div>
    @endif
>>>>>>> 1e879df33aa4114c790f81c2fa3cc7a97a3d5921
</x-app-layout>
