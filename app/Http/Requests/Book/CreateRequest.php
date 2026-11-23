<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'author' => 'required|max:50',
            'genres' => 'required|array',
            'published_date' => 'required|date_format:Y-m-d',
             'isbn' => [
                'required','digits:13',
                Rule::unique('books', 'isbn')->ignore($this->route('book') ?? $this->route('id')),
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'タイトルを入力してください',

            'author.required' => '著者名を入力してください',
            'author.max' => '著者名は50文字以内で入力してください',

            'isbn.required' => 'ISBNコードを入力してください',
            'isbn.unique' => 'このISBNコードはすでに入力されています',
            'isbn.digits' => 'ISBNコードは13桁の数字で入力してください',

            'genres.required' => 'ジャンルを1つ以上選択してください',

            'published_date.required'    => '出版日を入力してください',
            'published_date.date_format' => '出版日は「Y-M-D」の形式で入力してください'
        ];
    }
}
