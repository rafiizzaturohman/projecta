<x-app-layout>
    <div class="p-6">
        <a href="{{ route('userManagement.create') }}">Tambah Data</a>
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Role</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border p-2">{{ $user->nama }}</td>
                        <td class="border p-2">{{ $user->email }}</td>
                        <td class="border p-2">{{ $user->role }}</td>
                        <td class="border p-2 flex gap-2">
                            <a href="{{ route('userManagement.edit', $user->id) }}" class="text-blue-500">Edit</a>

                            <form method="POST" action="{{ route('userManagement.destroy', $user->id) }}" onsubmit="return confirm('Hapus user ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-500">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if(session('success'))
            <div  x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600">{{ session('success') }}</div>
        @endif

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
