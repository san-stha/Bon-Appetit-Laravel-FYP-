<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            // 'id' => $this->id,
            // 'actual_amount' => $this->actual_amount,
            // 'percent_off' => $this->percent_off,
            // 'commission' => $this->comission,
            // 'discount' => $this->discount,
            // 'total' => $this->total,
            // 'ba_receivable' => $this->ba_receivable,
            // 'coupon_code' => $this->coupon_code,
            'user_id' => $this->user_id,
            'res_user_id' => $this->restaurant_id,
            'name' => $this->user->id,
            // 'res_user_id' => $this->restaurant->name,


        ];
    }
}
