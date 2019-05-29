<?php

namespace App\Http\Requests;

use App\Event;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->route()->hasParameter('blog')) {
            $event = Event::findOrFail($this->route('event'));
            return $event && $this->user()->can('crud', $event);
        } else {
            return $this->user()->can('crud', Event::class);
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
            'title' => 'required|min:4',
            'location' => 'required|min:4',
            'start_date' => 'required|date',
            'start_time' => 'required|min:5|max:8',
            'end_date' => 'required|date',
            'end_time' => 'required|min:5|max:8',
            'description' => 'required|min:10',
        ];
    }
}
