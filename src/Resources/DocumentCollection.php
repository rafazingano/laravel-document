<?php

namespace ConfrariaWeb\Document\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DocumentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        /*return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];*/
    }
}
