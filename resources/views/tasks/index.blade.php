<x-app-layout>
    {{-- Tabel User --}}
    @include('tasks.partials.table')
    
    {{-- Pagination --}}
    {{-- <div class="mt-6 flex justify-center">
        <div class="inline-flex items-center gap-2 rounded-xl border border-border dark:border-dark-border px-4 py-2 bg-surface dark:bg-dark-surface shadow-soft">
            {{ $users->links() }}
        </div>
    </div> --}}

    {{-- Flash Success Message --}}
    @if(session('success'))
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-transition 
            x-init="setTimeout(() => show = false, 3000)"
            class="mt-4 px-4 py-3 text-primary text-center text-base"
        >
            {{ session('success') }}
        </div>
    @endif
</x-app-layout>
