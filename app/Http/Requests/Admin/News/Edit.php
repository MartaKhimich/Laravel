<?php

namespace App\Http\Requests\Admin\News;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class Edit extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $tableNameCategory = (new Category())->getTable();

        return [
            'category_id' => ['required', 'integer', "exists:{$tableNameCategory},id"],
            'title' => ['required', 'string', 'min:3', 'max:150'],
            'image' => ['nullable', 'url'],
            'description' => ['nullable', 'string'],
            'author' => ['required', 'string', 'min:2', 'max:100'],
            'status' => ['required'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'заголовок',
            'description' => 'описание',
            'author' => 'автор',
        ];
    }
}
