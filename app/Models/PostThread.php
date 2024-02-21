<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostThread extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'post_threads';

    /**
     * Get the post thread that owns the user.
     */
    public function latestOrder(): BelongsTo
    {
        return $this->belongsTo(User::class)->latestOfMany();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'content', 'file_content', 'delete_at'];
}
