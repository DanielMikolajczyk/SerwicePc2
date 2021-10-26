<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiagnoseRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules(): array
  {
    return [
      'name'        => 'required|unique:diagnoses,name,'.$this->diagnose->id.'|max:64',
      'type_id'     => 'required|exists:order_types,id',
      'price'       => ['required','regex:/^\d+((\.|\,)\d{1,2})?$/'],
      'description' => 'max:1024'
    ];
  }
}
