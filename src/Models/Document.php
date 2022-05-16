<?php

namespace ConfrariaWeb\Document\Models;

use App\Models\User;
use ConfrariaWeb\File\Traits\FileTrait;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    use FileTrait;

    protected $fillable = ['user_id', 'title'];
    protected $appends = ['content'];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'document_group', 'document_id', 'group_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function getContentAttribute()
    {
        return $this->contents()->orderBy('created_at', 'desc')->first()->content?? NULL;
    }

}
