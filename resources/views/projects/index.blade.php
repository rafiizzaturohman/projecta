<x-app-layout>
    {{-- Tabel User --}}
    @include('projects.partials.table')
<<<<<<< HEAD

    {{-- Flash Success Message --}}
=======
 
 {{-- Flash Success Message --}}
>>>>>>> 558972b46aa3fad0174fe0c8f7e9662ae57b68cc
    @if(session('success'))
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-transition 
            x-init="setTimeout(() => show = false, 3000)"
<<<<<<< HEAD
            class="text-center mt-2 px-4 py-3 text-primary text-base"
=======
            class="mt-4 px-4 py-3 text-primary text-base text-center"
>>>>>>> 558972b46aa3fad0174fe0c8f7e9662ae57b68cc
        >
            {{ session('success') }}
        </div>
    @endif
</x-app-layout>
