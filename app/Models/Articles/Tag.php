<?php

namespace App\Models\Articles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Articles\WebsiteArticle;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function websiteArticles()
    {
        return $this->morphedByMany(WebsiteArticle::class, 'taggable');
    }
}
