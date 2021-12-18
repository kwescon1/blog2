<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //
    protected $table = "comments";

    protected $guarded = ['id'];

    /**
     * Custom attributesvar
     *
     *  @var array
     */
    // protected $appends = ['date'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id')->latest();
    }

    /**
     * Get date attribute
     *
     *  @return string
     */
    public function getDate()
    {
        return $this->created_at->format('j F, Y');
    }
}
