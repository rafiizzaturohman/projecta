<x-app-layout>
    <!-- tasks Detail Card -->
<div class="bg-surface rounded-2xl shadow-soft overflow-hidden transition-all duration-200 dark:bg-dark-surface">
    <!-- Project Header -->
    <div class="px-8 py-6 border-b border-white/40">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <p class="text-sm font-medium text-white opacity-80 mb-1">PROJECT</p>
                <h1 class="text-2xl font-bold text-white">{{ $tasks->project->judul }}</h1>
            </div>
            <div class="flex items-center gap-4">
                <div>
                    <p class="text-xs font-medium text-white opacity-80 mb-1">STATUS TUGAS</p>
                            @php
                                $statusColor = match ($tasks->status) {
                                    'belum' => 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium tracking-wide text-white bg-red-800',
                                    'proses' => 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium tracking-wide text-white bg-amber-500',
                                    'selesai' => 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium tracking-wide text-white bg-teal-700',
                                    default => 'bg-gray-100 text-gray-600',
                                };
                            @endphp
                    <span class="{{ $statusColor }}">
                        {{ ucfirst($tasks->status) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- tasks Content -->
    <div class="p-8">
        <!-- tasks Title -->
        <h2 class="text-3xl font-bold mb-8">{{ $tasks->judul }}</h2>

        <!-- tasks Meta Info -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
            <!-- Assigned User Info -->
            <div class="space-y-4">
                <p class="text-sm font-medium uppercase tracking-wider text-text-secondary dark:text-dark-text-secondary">Ditugaskan ke</p>
                <div class="flex items-center gap-4">
                    <div class="h-14 w-14 rounded-full bg-secondary flex items-center justify-center text-white text-xl font-medium dark:bg-dark-secondary">
                        {{ strtoupper(substr($tasks->user->name, 0, 2)) }}
                    </div>
                    <div>
                        <p class="text-lg font-medium">{{ $tasks->user->nama }}</p>
                        <p class="text-text-secondary dark:text-dark-text-secondary capitalize">{{ $tasks->user->role }}</p>
                        <p class="text-sm text-primary dark:text-dark-primary mt-1">{{ $tasks->user->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Deadline Info -->
            <div class="space-y-4">
                <p class="text-sm font-medium uppercase tracking-wider text-text-secondary dark:text-dark-text-secondary">Batas pengumpulan</p>
                <div class="flex items-center gap-4">
                    <div class="p-3 rounded-lg bg-surface border border-border dark:bg-dark-surface dark:border-dark-border">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-text-secondary dark:text-dark-text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        @php
                            \Carbon\Carbon::setLocale('id');
                        @endphp
                        <p class="text-lg font-medium">
                            {{ \Carbon\Carbon::parse($tasks->deadline)->translatedFormat('j F Y') }}
                        </p>
                        @php
                            $daysLeft = \Carbon\Carbon::parse($tasks->deadline)->diffInDays(now(), false);

                            if ($daysLeft < 0) {
                                $statusClass = 'text-danger';
                                $statusText = 'Sudah melebihi batas ' . intval(abs($daysLeft)) . ' hari';
                            } elseif ($daysLeft <= 10) {
                                $statusClass = 'text-warning';
                                $statusText = 'Tenggat dalam ' . intval($daysLeft) . ' hari';
                            } else {
                                $statusClass = 'text-success';
                                $statusText = 'Tenggat masih lama (' . intval($daysLeft) . ' hari)';
                            }
                        @endphp
                        <p class="{{ $statusClass }}">
                            {{ $statusText }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- tasks Description -->
        <div class="mb-10">
            <p class="text-sm font-medium uppercase tracking-wider text-text-secondary dark:text-dark-text-secondary mb-4">Deskripsi</p>
            <div class="prose max-w-none text-text-primary dark:text-dark-text-primary text-lg">
                <p>{{ $tasks->deskripsi }}</p>
            </div>
        </div>

        <!-- tasks Actions -->
        <div class="flex flex-col md:flex-row gap-4 pt-6 border-t border-border dark:border-dark-border">
            <a href="{{  route('dashboard') }}" class="px-6 py-3 bg-primary hover:bg-primary-hover text-white rounded-lg font-medium transition-colors duration-200 dark:bg-dark-secondary dark:hover:bg-dark-secondary -hover flex items-center justify-center gap-2 text-lg">KEMBALI</a>

            <a href="{{ route('tasks.edit', $tasks->id) }}"
               class="px-6 py-3 bg-primary hover:bg-primary-hover text-white rounded-lg font-medium transition-colors duration-200 dark:bg-dark-primary dark:hover:bg-dark-primary-hover flex items-center justify-center gap-2 text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit tasks
            </a>
        </div>
    </div>
</div>
</x-app-layout>
