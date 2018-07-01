<?php

namespace App\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use App\Models\Post; 

class PostTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [];

    /**
     * Transform object into a generic array
     *
     * @var \App\Models\Post $resource
     * @return array
     */
    public function transform(Models\Post $resource)
    {
        return [

            'id' => (int) $resource->id,
			'title' => $resource->title,
			'body' => $resource->body,
			'user_id' => $resource->user_id,
			'username' => $resource->username,
			'tag' => $resource->tag,
			'category' => $resource->category,
			'post_link' => $resource->post_link,
			'image' => $resource->image,
			'documents' => $resource->documents,
			'is_pinned' => $resource->is_pinned,
			'created_at' => $resource->created_at,
			'updated_at' => $resource->updated_at,
			
        ];
    }
}
