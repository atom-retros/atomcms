<?php

namespace App\Models\Compositions;

trait HasNotificationUrl
{
    public function getNotificationUrl(): string
    {
        return route('articles.show', [$this->id, $this->slug]);
    }
}
