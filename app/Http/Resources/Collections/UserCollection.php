<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\UserResource;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => UserResource::collection($this->collection),
            'links' => [
                'has_more_items' => $this->hasMorePages(),
                'current_page' => $this->currentPage(),
                'next_page' => $this->nextPageUrl(),
                'total_records' => $this->total()
            ]
        ];
    }
}
