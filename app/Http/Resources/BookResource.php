<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'author' => $this->author,
            'description' => $this->description,
            'price' => $this->price,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:m:s'),
            'vendor' => $this->vendor->vendor_name,
        ];
    }
}
