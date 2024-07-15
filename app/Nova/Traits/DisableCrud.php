<?php

namespace App\Nova\Traits;

use Illuminate\Http\Request;

trait DisableCrud
{
    /**
     * The authority to create new resources.
     */
    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    /**
     * The authority to delete resources.
     */
    public function authorizedToDelete(Request $request)
    {
        return false;
    }

    /**
     * The authority to update resource.
     */
    public function authorizedToUpdate(Request $request)
    {
        return false;
    }
}
