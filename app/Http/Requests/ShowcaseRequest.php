<?php

namespace App\Http\Requests;

use App\Showcase;
use Illuminate\Foundation\Http\FormRequest;

class ShowcaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->route()->hasParameter('showcase')) {
            $showcase = Showcase::findOrFail($this->route('showcase'));
            return $showcase && $this->user()->can('updateDelete', $showcase);
        } else {
            return $this->user()->can('create', Showcase::class);
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
            "title" => "required|min:3|max:30",
            "description" => "required|min:10|max:100",
            "body" => "required|min:10",
            "url" => "nullable|URL",
        ];
    }
}
