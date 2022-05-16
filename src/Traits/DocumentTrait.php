<?php

namespace ConfrariaWeb\Document\Traits;

use ConfrariaWeb\Document\Models\Document;

trait DocumentTrait
{
    public function documents()
    {
        return $this->morphToMany(Document::class, 'documentgable');
    }
}
