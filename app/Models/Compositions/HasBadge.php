<?php

namespace App\Models\Compositions;

interface HasBadge
{
    public function getBadgePath(): string;

    public function getBadgeName(): string;
}
