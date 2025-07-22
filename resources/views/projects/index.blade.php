<x-app-layout>
    {{-- Tabel User --}}
    @include('projects.partials.table')

    {{-- Flash Success Message --}}
    @if(session('success'))
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-transition 
            x-init="setTimeout(() => show = false, 3000)"
            class="text-center mt-2 px-4 py-3 text-primary text-base"
        >
            {{ session('success') }}
        </div>
    @endif
</x-app-layout>
