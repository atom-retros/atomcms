<?php

namespace App\Services\Community;

use App\Models\WebsiteOpenPosition;
use Illuminate\Database\Eloquent\Collection;

class StaffApplicationService
{
    public function fetchOpenPositions(): Collection
    {
       return WebsiteOpenPosition::canApply()->with('permission')->get();
    }

    public function hasUserAppliedForPosition($user, $positionId): bool
    {
        return $user->applications()->where('rank_id', $positionId)->exists();
    }

    public function isPositionOpenForApplication($position): bool
    {
        $currentTime = now();
        return $position->apply_from <= $currentTime && $position->apply_to >= $currentTime;
    }
}
