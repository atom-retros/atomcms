<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteArticleReaction extends Model
{
    use HasFactory;

    protected $table = 'website_article_reactions';

    protected $guarded = [];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }

    public function article()
    {
        return $this->belongsTo(WebsiteArticle::class, 'article_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
