<x-app-layout>
    {{-- Tabel User --}}
    @include('tasks.partials.list')
    
<<<<<<< HEAD
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
=======
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @include('tasks.partials.table')
                </div>
            </div>
>>>>>>> 9e3bd6221fc05790711a7c388a85bdafd8dbdb3f
        </div>
    @endif
</x-app-layout>
