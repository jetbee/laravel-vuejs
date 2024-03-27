<?php
namespace App\Http\Requests;
use Illuminate\contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaskRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'title'   => ['required', 'max:20'],
            'content' => ['required', 'max:100',
                function($attribute, $value, $fail){
                   if(preg_match('/^([ぁ-んァ-ヶーa-zA-Z0-9一-龠０-９、。]|<br>|<b>|<\/b>)+$/', $value)){
                       return true;
                   }
                   return $fail('The data format is incorrent.');
                }
            ],
            'person_in_charge'   => ['required', 'max:20'],
        ];
    }

    protected function failedValidation(Validator $validator) {
        $res = response()->json([
            'status' => 400,
            'errors' => $validator->errors(),
        ],400);
        throw new HttpResponseException($res);
    }
}
