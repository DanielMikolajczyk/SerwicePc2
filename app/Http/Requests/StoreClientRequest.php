<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
      'first_name'       => 'required|string|max:32',
      'middle_name'      => 'required|string|max:32',
      'last_name'        => 'required|string|max:32',
      'phone_number'     => 'required|string|unique:clients,phone_number',
      'email'            => 'required|email',
      'address'          => 'required|string|max:64',
      'description'      => 'required|string|max:1024',
      'type_id'          => 'required|exists:client_types,id',
      'image'            => 'file|max:5120'
    ];
  }
}
