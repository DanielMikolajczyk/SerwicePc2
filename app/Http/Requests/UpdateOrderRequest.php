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
      'status_id'           => 'exists:order_statuses,id',
      'type_id'             => 'exists:order_types,id',
      'serial_number'       => 'string|max:32|unique:orders,serial_number,'.$this->order->id,
      'part_number'         => 'string|max:32',
      'model'               => 'string|max:32',
      'manufacturer'        => 'string|max:32',
      'deadline'            => 'date',
      'visual_description'  => 'string|max:1024',
      'issue_description'   => 'string|max:1024',
      'comment'             => 'max:1024',
      'diagnoses'           => 'array',
      'decisions'           => 'array',
      'paid'                => 'boolean'
    ];
  }
}
