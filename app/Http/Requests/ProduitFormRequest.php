<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitFormRequest extends FormRequest
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
       // dd($this->produit);
        return [
            "designation" =>"required|min:2|max:10|unique:produits",
           // "designation" =>"required|min:2|max:10|unique:produits,designation,".$this->produit,
            "prix" =>"required|numeric|between:200,80000",
            "description" =>"required|max:50",
            "category_id" =>"required|numeric"
        ];
    }
}
