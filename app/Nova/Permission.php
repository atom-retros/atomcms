<?php

namespace App\Nova;

use Laravel\Nova\Nova;
use Laravel\Nova\Panel;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Color;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\KeyValue;
use Illuminate\Support\Facades\File;
use Laravel\Nova\Fields\BooleanGroup;
use Illuminate\Support\Facades\Schema;
use Laravel\Nova\Http\Requests\NovaRequest;

class Permission extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\Atom\Core\Models\Permission>
     */
    public static $model = \Atom\Core\Models\Permission::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'rank_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'rank_name',
    ];

    /**
     * The columns that should be excluded from the permissions fields.
     */
    protected array $excludedColumns = [
        'id',
        'rank_name',
        'hidden_rank',
        'badge',
        'job_description',
        'staff_color',
        'staff_background',
        'level',
        'room_effect',
        'log_commands',
        'prefix',
        'prefix_color',
        'admin_permissions',
        'auto_credits_amount',
        'auto_pixels_amount',
        'auto_gotw_amount',
        'auto_points_amount',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Name', 'rank_name')
                ->sortable()
                ->rules('required', 'max:255')
                ->creationRules('unique:permissions,rank_name')
                ->updateRules('unique:permissions,rank_name,{{resourceId}}'),

            Number::make('Level')
                ->sortable()
                ->rules('required', 'integer', 'min:1', 'max:255')
                ->creationRules('unique:permissions,level')
                ->updateRules('unique:permissions,level,{{resourceId}}'),


            Boolean::make('Hidden Rank')
                ->sortable()
                ->rules('required', 'boolean'),

            Boolean::make('Log Commands')
                ->hideFromIndex()
                ->sortable()
                ->rules('required', 'boolean')
                ->trueValue(1)
                ->falseValue(0),

            Text::make('Badge')
                ->sortable()
                ->rules('sometimes', 'nullable', 'max:255')
                ->default('ADM'),

            Color::make('Prefix Color')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'max:7')
                ->suggestions(['#f8fafc', '#f1f5f9', '#e2e8f0', '#cbd5e1', '#94a3b8', '#64748b', '#475569', '#334155', '#1e293b', '#0f172a', '#020617', '#f9fafb', '#f3f4f6', '#e5e7eb', '#d1d5db', '#9ca3af', '#6b7280', '#4b5563', '#374151', '#1f2937', '#111827', '#030712', '#fafafa', '#f4f4f5', '#e4e4e7', '#d4d4d8', '#a1a1aa', '#71717a', '#52525b', '#3f3f46', '#27272a', '#18181b', '#09090b', '#fafafa', '#f5f5f5', '#e5e5e5', '#d4d4d4', '#a3a3a3', '#737373', '#525252', '#404040', '#262626', '#171717', '#0a0a0a', '#fafaf9', '#f5f5f4', '#e7e5e4', '#d6d3d1', '#a8a29e', '#78716c', '#57534e', '#44403c', '#292524', '#1c1917', '#0c0a09', '#fef2f2', '#fee2e2', '#fecaca', '#fca5a5', '#f87171', '#ef4444', '#dc2626', '#b91c1c', '#991b1b', '#7f1d1d', '#450a0a', '#fff7ed', '#ffedd5', '#fed7aa', '#fdba74', '#fb923c', '#f97316', '#ea580c', '#c2410c', '#9a3412', '#7c2d12', '#431407', '#fffbeb', '#fef3c7', '#fde68a', '#fcd34d', '#fbbf24', '#f59e0b', '#d97706', '#b45309', '#92400e', '#78350f', '#451a03', '#fefce8', '#fef9c3', '#fef08a', '#fde047', '#facc15', '#eab308', '#ca8a04', '#a16207', '#854d0e', '#713f12', '#422006', '#f7fee7', '#ecfccb', '#d9f99d', '#bef264', '#a3e635', '#84cc16', '#65a30d', '#4d7c0f', '#3f6212', '#365314', '#1a2e05', '#f0fdf4', '#dcfce7', '#bbf7d0', '#86efac', '#4ade80', '#22c55e', '#16a34a', '#15803d', '#166534', '#14532d', '#052e16', '#ecfdf5', '#d1fae5', '#a7f3d0', '#6ee7b7', '#34d399', '#10b981', '#059669', '#047857', '#065f46', '#064e3b', '#022c22', '#f0fdfa', '#ccfbf1', '#99f6e4', '#5eead4', '#2dd4bf', '#14b8a6', '#0d9488', '#0f766e', '#115e59', '#134e4a', '#042f2e', '#ecfeff', '#cffafe', '#a5f3fc', '#67e8f9', '#22d3ee', '#06b6d4', '#0891b2', '#0e7490', '#155e75', '#164e63', '#083344', '#f0f9ff', '#e0f2fe', '#bae6fd', '#7dd3fc', '#38bdf8', '#0ea5e9', '#0284c7', '#0369a1', '#075985', '#0c4a6e', '#082f49', '#eff6ff', '#dbeafe', '#bfdbfe', '#93c5fd', '#60a5fa', '#3b82f6', '#2563eb', '#1d4ed8', '#1e40af', '#1e3a8a', '#172554', '#eef2ff', '#e0e7ff', '#c7d2fe', '#a5b4fc', '#818cf8', '#6366f1', '#4f46e5', '#4338ca', '#3730a3', '#312e81', '#1e1b4b', '#f5f3ff', '#ede9fe', '#ddd6fe', '#c4b5fd', '#a78bfa', '#8b5cf6', '#7c3aed', '#6d28d9', '#5b21b6', '#4c1d95', '#2e1065', '#faf5ff', '#f3e8ff', '#e9d5ff', '#d8b4fe', '#c084fc', '#a855f7', '#9333ea', '#7e22ce', '#6b21a8', '#581c87', '#3b0764', '#fdf4ff', '#fae8ff', '#f5d0fe', '#f0abfc', '#e879f9', '#d946ef', '#c026d3', '#a21caf', '#86198f', '#701a75', '#4a044e', '#fdf2f8', '#fce7f3', '#fbcfe8', '#f9a8d4', '#f472b6', '#ec4899', '#db2777', '#be185d', '#9d174d', '#831843', '#500724', '#fff1f2', '#ffe4e6', '#fecdd3', '#fda4af', '#fb7185', '#f43f5e', '#e11d48', '#be123c', '#9f1239', '#881337', '#4c0519']),

            Text::make('Prefix')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'max:5'),

            new Panel('Automatic Currency', [
                Number::make('Auto Credits Amount')
                    ->hideFromIndex()
                    ->rules('required', 'integer', 'min:0'),

                Number::make('Auto Pixels Amount')
                    ->hideFromIndex()
                    ->rules('required', 'integer', 'min:0'),

                Number::make('Auto GOTW Amount')
                    ->hideFromIndex()
                    ->rules('required', 'integer', 'min:0'),

                Number::make('Auto Points Amount')
                    ->hideFromIndex()
                    ->rules('required', 'integer', 'min:0'),
            ]),

            new Panel('Website Permissions', $this->getAdminPermissionsFields($request)),

            new Panel('Command Permissions', $this->getPermissionsFields($request)),

            HasMany::make('Users'),
        ];
    }

    /**
     * Get the admin permissions fields for the resource.
     */
    public function getAdminPermissionsFields(NovaRequest $request): array
    {
        return collect(File::files(app_path('Nova')))
            ->map(fn ($file) => pathinfo($file, PATHINFO_FILENAME))
            ->filter(fn (string $resource) => $resource !== 'Resource')
            ->map(fn (string $resource) => $this->getAdminPermissionField($request, $resource))
            ->toArray();
    }

    /**
     * Get the admin permission field for the resource.
     *
     * @return Field
     */
    public function getAdminPermissionField(NovaRequest $request, string $column): Select
    {
        return Select::make(Str::plural(Nova::humanize(sprintf('Manage %s', $column))), sprintf('admin_permissions->App\\Nova\\%s', $column))
            ->hideFromIndex()
            ->options([false => 'No', true => 'Yes'])
            ->rules('required', 'boolean')
            ->default(false)
            ->displayUsingLabels();
    }

    /**
     * Get the permissions fields for the resource.
     */
    public function getPermissionsFields(NovaRequest $request): array
    {
        return collect(Schema::getColumnListing((new self::$model)->getTable()))
            ->filter(fn (string $column) => ! in_array($column, $this->excludedColumns))
            ->map(fn (string $column) => $this->getPermissionField($request, $column))
            ->toArray();
    }

    /**
     * Get the permission field for the resource.
     *
     * @return Field
     */
    public function getPermissionField(NovaRequest $request, string $column): Select
    {
        return Select::make(Str::replace(['_', 'Cmd', 'Acc'], [' ', ''], Nova::humanize($column)), $column)
            ->hideFromIndex()
            ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
            ->rules('required', 'in:0,1,2')
            ->default(0)
            ->displayUsingLabels();
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
