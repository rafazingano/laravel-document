<?php

namespace ConfrariaWeb\Document\Services;

use ConfrariaWeb\Document\Models\Document;
use Illuminate\Support\Facades\Auth;

class DocumentService
{

    public $document;

    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    public function all()
    {
        return $this->document->all();
    }

    public function find($id)

    {
        return $this->document->find($id);
    }

    public function paginate()
    {
        return $this->document->paginate();
    }

    public function create($data)
    {
        if (empty($data['user_id']) && Auth::check()) {
            $data['user_id'] = Auth::id();
        }
        $document = $this->document->create($data);
        $document->groups()->sync($data['groups']);
        if (isset($data['content']) && $document) {
            
            $document->contents()->create($data);
        }

        return $document;
    }

    public function update($id, $data)
    {
        $document = $this->document->find($id);
        $document->update($data);
        $document->groups()->sync($data['groups']);
        if (isset($data['content']) && $document) {
            if (empty($data['user_id']) && Auth::check()) {
                $data['user_id'] = Auth::id();
            }
            $document->contents()->create($data);
        }
        return $document;
    }
}
