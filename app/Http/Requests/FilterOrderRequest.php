<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterOrderRequest extends FormRequest
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
      'code'        => 'sometimes|nullable|max:64',
      'deadline'    => 'sometimes|nullable|date',
      'status'      => 'sometimes|nullable|max:64|exists:order_statuses,id',
      'type'        => 'sometimes|nullable|max:64|exists:order_types,id',
      'client_name' => 'sometimes|nullable|max:64'
    ];
  }
}
