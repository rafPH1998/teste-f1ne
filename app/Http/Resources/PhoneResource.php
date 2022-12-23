<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'telephone'  => $this->telephone,
            'cellphone1' => $this->cellphone1,
            'cellphone2' => $this->telephone2,
            'created_at' => Carbon::make($this->created_at)->format('d/m/Y')
        ];
    }
}
