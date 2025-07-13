<x-app-layout>
    <div class="p-6 bg-surface dark:bg-dark-surface rounded-lg shadow-soft transition-colors duration-300 max-w-7xl w-auto mx-auto">
        <h2 class="text-xl font-semibold text-text-primary dark:text-dark-text-primary mb-4">
            Edit Data User
        </h2>

        <form method="POST" action="{{ route('projects.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="bg-surface-50 dark:bg-dark-surface-50 p-6 rounded-xl border border-border dark:border-dark-border">
    <!-- Header Dinamis -->
    <h2 class="text-xl font-bold text-text-primary dark:text-dark-text-primary mb-6" x-text="isEditMode ? 'Edit Proyek' : 'Buat Proyek Baru'"></h2>
    
    <form class="space-y-5" x-data="{
        isEditMode: false,
        projectId: null,
        projectName: '',
        projectDescription: '',
        supervisor: '',
        deadline: '',
        
        // Untuk mode edit
        editProject(project) {
            this.isEditMode = true;
            this.projectId = project.id;
            this.projectName = project.name;
            this.projectDescription = project.description;
            this.supervisor = project.supervisor_id;
            this.deadline = project.deadline;
        },
        
        // Reset form
        resetForm() {
            this.isEditMode = false;
            this.projectId = null;
            this.projectName = '';
            this.projectDescription = '';
            this.supervisor = '';
            this.deadline = '';
        },
        </form>
    </div>
</x-app-layout>
