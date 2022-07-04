<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50|min:3',
            'image' => 'required|max:255|min:10',
            'type' => 'required',
        ];
    }

    /* Funzione per creare messaggi personalizzati

        public function messages(){
            return [
                [
                    'title.required' => 'Il campo nome è obbligatorio',
                    'title.max' => 'Il campo nome deve avere al massimo :max caratteri',
                    'title.min' => 'Il campo nome deve avere minimo :min caratteri',

                    'image.required' => 'Il campo image è obbligatorio',
                    'image.max' => 'Il campo image deve avere al massimo :max caratteri',
                    'image.min' => 'Il campo image deve avere minimo :min caratteri',

                ]
            ];
        }
    */
}
