<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartamentRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   */
  public function rules(): array
  {
    return [
      'code'  =>  'required|string|max:2|unique:departaments,code,'.$this->departament->id,
      'name'  =>  'required|string|max:32|unique:departaments,name,'.$this->departament->id
    ];
  }
}
