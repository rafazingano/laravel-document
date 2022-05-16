<?php

namespace ConfrariaWeb\Document\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $table = 'document_groups';

    protected $fillable = ['name'];

    public function documents()
    {
        return $this->belongsToMany(Document::class, 'document_group', 'group_id', 'document_id');
    }

}
