<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'wo' => $this->wo,
            'work_date' => $this->work_date->format('d M Y'),
            'parts_cost' => $this->parts_cost,
            'payment' => $this->payment,
        ];
    }
}
