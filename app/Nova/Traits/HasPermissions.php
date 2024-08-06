<?php

namespace App\Nova\Traits;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;

trait HasPermissions
{
    /**
     * Determine if the resource should be available for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public static function authorizedToViewAny(Request $request)
    {
        return Arr::get(
            auth()->user()->permission->admin_permissions,
            get_called_class(),
            false,
        );
    }

    /**
     * The authority to create new resources.
     */
    public static function authorizedToCreate(Request $request)
    {
        return Arr::get(
            auth()->user()->permission->admin_permissions,
            get_called_class(),
            false,
        );
    }

    /**
     * The authority to delete resources.
     */
    public function authorizedToDelete(Request $request)
    {
        return Arr::get(
            auth()->user()->permission->admin_permissions,
            get_called_class(),
            false,
        );
    }

    /**
     * The authority to update resource.
     */
    public function authorizedToUpdate(Request $request)
    {
        return Arr::get(
            auth()->user()->permission->admin_permissions,
            get_called_class(),
            false,
        );
    }
}
