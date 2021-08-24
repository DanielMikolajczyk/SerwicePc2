<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
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
  public function rules()
  {
    return [
      'name'  => 'required|string|max:32|unique:permissions,name,'.$this->permission->id,
    ];
  }
}
