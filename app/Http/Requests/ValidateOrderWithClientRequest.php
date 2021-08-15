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
            'order.type'              => 'required|exists:order_types,type',
            'order.serial_number'      => 'required|string|max:32',
            'order.part_number'        => 'required|string|max:32',
            'order.model'             => 'required|string|max:32',
            'order.manufacturer'      => 'required|string|max:32',
            'order.deadline'          => 'required|date',
            'order.visual_description' => 'required|string|max:1024',
            'order.issue_description'  => 'required|string|max:1024',
            'order.comment'           => 'required|string|max:1024',

            'client.first_name'        => 'required|string|max:32',
            'client.last_name'         => 'required|string|max:32',
            'client.phone_number'      => 'required|string',
            'client.email'            => 'required|email',
            'client.address'          => 'required|string|max:64',
            'client.type'             => 'required|exists:client_types,type'
        ];
    }
}
