<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderStatusRequest extends FormRequest
{
  public $stage_numbers = [1,2,3,4,5];

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
      'name'        => 'required|string|max:32|unique:order_statuses,name',
      'stage_number'=> 'required|in:'. implode(',',$this->stage_numbers),
      'description' => 'required|string|max:256'
    ];
  }
}
