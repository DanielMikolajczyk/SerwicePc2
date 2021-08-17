<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
      'type_id'             => 'required|exists:order_types,id',
      'serial_number'       => 'required|string|max:32|unique:orders,serial_number,'.$this->order->id,
      'part_number'         => 'required|string|max:32',
      'model'               => 'required|string|max:32',
      'manufacturer'        => 'required|string|max:32',
      'deadline'            => 'required|date',
      'visual_description'  => 'required|string|max:1024',
      'issue_description'   => 'required|string|max:1024',
      'comment'             => 'required|string|max:1024',
    ];
  }
}
