<?php

namespace ConfrariaWeb\Document\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{

    protected $table = 'document_content';

    protected $fillable = ['document_id', 'user_id', 'content'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
