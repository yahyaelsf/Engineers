<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEngineerRequest extends BaseFormRequest
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
        $primaryKey = $this->get('pk_i_id');
        $rules = [
            's_name' =>'required',
            'i_id_number' => 'required|unique:t_engineers,i_id_number,'. $primaryKey . ',pk_i_id',
            's_mobile' => 'numeric|digits_between:10,14',
            'i_family' => 'required|numeric',
            's_address' => 'required',
            's_value' => 'required',


        ];



        return $rules;
    }
}
