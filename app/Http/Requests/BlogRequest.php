<?php

namespace App\Http\Requests;

use App\Blog;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->route()->hasParameter('blog')) {
            $blog = Blog::findOrFail($this->route('blog'));
            return $blog && $this->user()->can('updateDelete', $blog);
        } else {
            return $this->user()->can('create', Blog::class);
        }


    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|unique:blogs,title,' . $this->segment(2),
            'body' => 'required|min:8'
        ];
    }
}
