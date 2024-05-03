<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PutRequest extends FormRequest
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
        //dd($this->route("post"));
        return [
            "title"=>"required|min:5|max:250",
            "slug"=>"min:5|max:250|unique:posts,slug,".$this->route("post")->id,
            "category_id"=>"required",
            "content"=>"required|min:5",
            "description"=>"required",
            "posted"=>"required",
            "image"=>"mimes:jpeg, jpg, png|max:10240"
        ];
    }
}
