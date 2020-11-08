<?php

namespace App\Http\Requests\Events;

use App\Enums\Day;
use DateTime;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Traits\ValidationErrorResponseCustomizer;

class CreateRequest extends FormRequest
{
    use ValidationErrorResponseCustomizer;

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
            'name' => ['required'],
            'started_at' => ['required'],
            'ended_at' => ['required'],
            'days.*' => ['required','in:'.implode(',', Day::getValues())],
        ];
    }

    /**
     * Perform after validation.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();

        $validator->after(function($validator) {
            if (!$this->checkDate($this->started_at)) {
                $validator->errors()->add('started_at', __('Invalid date format.'));
            }
            if (!$this->checkDate($this->ended_at)) {
              $validator->errors()->add('ended_at', __('Invalid date format.'));
            }

            if($this->checkDate($this->started_at) && $this->checkDate($this->ended_at)){
                if(Carbon::parse($this->started_at)->gt(Carbon::parse($this->ended_at))){
                    $validator->errors()->add('started_at', __('Start date should not be after the end date.'));
                }
            }
        });

        return $validator;
    }

    /**
     * Validate if value is a date
     *
     * @return Boolean
     */
    private function checkDate($date, $format = 'm/d/Y')
    {
        return DateTime::createFromFormat('m/d/Y', $date) ?? false;
    }

    /**
     * Get the validated data.
     *
     * @return array
     */
    public function data()
    {
        $data = $this->only('name', 'started_at', 'ended_at');

        return array_merge(
            $data,
            ['days' => json_encode($this->days)]
        );
    }
}
