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
            class="mt-4 px-4 py-3 rounded-xl bg-success text-white text-sm shadow-md"
        >
            {{ session('success') }}
        </div>
    @endif
</x-app-layout>
