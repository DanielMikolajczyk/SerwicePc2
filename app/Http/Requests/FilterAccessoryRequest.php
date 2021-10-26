<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterAccessoryRequest extends FormRequest
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
   */
  public function rules(): array
  {
    return [
      'name'        => 'sometimes|nullable|string|max:64',
      'order'       => 'sometimes|nullable|integer',
      'client_name' => 'sometimes|nullable|string|max:128'
    ];
  }
}
