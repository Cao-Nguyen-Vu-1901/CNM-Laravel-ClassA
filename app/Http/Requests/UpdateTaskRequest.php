<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|required|string|max:255', // Có thể không cần thiết nếu không cập nhật
            'description' => 'nullable|string',
            'status' => 'sometimes|required|in:pending,completed', // Có thể không cần thiết nếu không cập nhật
        ];
    }
}
