<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'nim' => ['nullable', 'string'],
            'nidn' => ['nullable', 'string'],
            'nip' => ['nullable', 'string'],
            'kd_prodi' => ['nullable', 'string'],
            'role' => ['required', Rule::in(['mahasiswa', 'dosen', 'admin'])],
        ];
    }

}
