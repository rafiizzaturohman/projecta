<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\ProjectMember;

class StoreProjectMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // ubah sesuai kebutuhan autentikasi
    }

    public function rules(): array
    {
        $projectId = $this->input('project_id');
        $role = $this->input('role');

        $rules = [
            'project_id' => ['required', 'exists:projects,id'],
            'user_id' => ['required', 'exists:users,id'],
            'role' => ['required', Rule::in(['ketua', 'anggota'])],
        ];

        // Validasi khusus untuk ketua (boleh hanya satu)
        if ($role === 'ketua') {
            $rules['role'][] = function ($attribute, $value, $fail) use ($projectId) {
                $exists = ProjectMember::where('project_id', $projectId)
                    ->where('role', 'ketua')
                    ->exists();

                if ($exists) {
                    $fail('Project ini sudah memiliki ketua.');
                }
            };
        }

        return $rules;
    }
}
