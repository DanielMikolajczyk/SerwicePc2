<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateOrderWithClientRequest extends FormRequest
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
            'order.type_id'           => 'required|exists:order_types,id',
            'order.serial_number'     => 'required|string|max:32',
            'order.part_number'       => 'required|string|max:32',
            'order.model'             => 'required|string|max:32',
            'order.manufacturer'      => 'required|string|max:32',
            'order.deadline'          => 'required|date',
            'order.visual_description'=> 'required|string|max:1024',
            'order.issue_description' => 'required|string|max:1024',
            'order.comment'           => 'required|string|max:1024',
            'order.image'             => 'mimes:jpeg,jpg,png|max:10000',

            'client.first_name'       => 'required|string|max:32',
            'client.last_name'        => 'required|string|max:32',
            'client.phone_number'     => 'required|string',
            'client.email'            => 'required|email',
            'client.address'          => 'required|string|max:64',
            'client.type_id'          => 'required|exists:client_types,id'
        ];
    }
}
