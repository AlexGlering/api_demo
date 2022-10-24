<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //Specifies which table values we want to see, when looking up customers in the db
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' =>$this->type,
            'email'=>$this->email,
            'address'=>$this->address,
            'city'=>$this->city,
            'postalCode'=>$this->postal_code, //changing from db standard to json standard (i.e. to camelCasing)
            //timestamp fields only available for users with create and edit authorization
            'invoices'=> InvoiceResource::collection($this->whenLoaded('invoices'))
        ];
    }
}
