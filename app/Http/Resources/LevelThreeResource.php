<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LevelThreeResource extends JsonResource
{
    public function rules()
    {
        return [
            'commitment' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'commitment.required' => 'لطفا تایید کنید که تعهدنامه مطالعه شده است',
        ];
    }
}
