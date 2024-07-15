<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
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
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Number::make('Level')
                ->sortable()
                ->rules('required', 'integer', 'min:1', 'max:255')
                ->creationRules('unique:permissions,level')
                ->updateRules('unique:permissions,level,{{resourceId}}'),

            Text::make('Name', 'rank_name')
                ->sortable()
                ->rules('required', 'max:255')
                ->creationRules('unique:permissions,rank_name')
                ->updateRules('unique:permissions,rank_name,{{resourceId}}'),

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
                ->rules('sometimes', 'nullable', 'max:255'),

            Text::make('Prefix')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'max:5'),

            Text::make('Prefix Color')
                ->hideFromIndex()
                ->rules('sometimes', 'nullable', 'max:7'),

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

            Select::make('cmd_about')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_alert')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_allow_trading')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_badge')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_ban')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_blockalert')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_bots')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_bundle')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_calendar')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_changename')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_chatcolor')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_commands')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_connect_camera')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_control')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_coords')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_credits')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_subscription')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_danceall')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_diagonal')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_disconnect')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_duckets')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_ejectall')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_empty')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_empty_bots')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_empty_pets')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_enable')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_event')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_faceless')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_fastwalk')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_filterword')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_freeze')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_freeze_bots')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_gift')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_give_rank')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_ha')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_can_stalk')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_hal')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_invisible')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_ip_ban')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_machine_ban')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_hand_item')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_happyhour')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_hidewired')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_kickall')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_softkick')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_massbadge')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_roombadge')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_masscredits')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_massduckets')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_massgift')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_masspoints')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_moonwalk')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_mimic')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_multi')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_mute')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_pet_info')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_pickall')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_plugins')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_points')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_promote_offer')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_pull')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_push')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_redeem')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_reload_room')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_roomalert')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_roomcredits')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_roomeffect')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_roomgift')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_roomitem')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_roommute')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_roompixels')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_roompoints')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_say')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_say_all')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_setmax')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_set_poll')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_setpublic')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_setspeed')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_shout')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_shout_all')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_shutdown')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_sitdown')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_staffalert')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_staffonline')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_summon')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_summonrank')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_super_ban')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_stalk')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_superpull')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_take_badge')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_talk')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_teleport')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_trash')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_transform')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_unban')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_unload')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_unmute')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_achievements')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_bots')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_catalogue')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_config')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_guildparts')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_hotel_view')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_items')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_navigator')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_permissions')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_pet_data')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_plugins')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_polls')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_texts')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_wordfilter')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_userinfo')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_word_quiz')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_warp')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_anychatcolor')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_anyroomowner')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_empty_others')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_enable_others')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_see_whispers')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_see_tentchat')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_superwired')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_supporttool')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_unkickable')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_guildgate')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_moverotate')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_placefurni')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_unlimited_bots')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_unlimited_pets')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_hide_ip')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_hide_mail')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_not_mimiced')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_chat_no_flood')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_staff_chat')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_staff_pick')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_enteranyroom')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_fullrooms')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_infinite_credits')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_infinite_pixels')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_infinite_points')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_ambassador')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_debug')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_chat_no_limit')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_chat_no_filter')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_nomute')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_guild_admin')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_catalog_ids')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_modtool_ticket_q')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_modtool_user_logs')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_modtool_user_alert')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_modtool_user_kick')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_modtool_user_ban')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_modtool_room_info')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_modtool_room_logs')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_trade_anywhere')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_update_notifications')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_helper_use_guide_tool')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_helper_give_guide_tours')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_helper_judge_chat_reviews')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_floorplan_editor')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_camera')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_ads_background')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_wordquiz')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_room_staff_tags')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_infinite_friends')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_mimic_unredeemed')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_youtube_playlists')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_add_youtube_playlist')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_mention')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_setstate')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_buildheight')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_setrotation')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_sellroom')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_buyroom')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_pay')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_kill')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_hoverboard')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_kiss')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_hug')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_welcome')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_disable_effects')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_brb')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_nuke')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_slime')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_explain')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_closedice')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_closedice_room')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_set')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_furnidata')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('kiss_cmd')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes', '2' => 'Room Rights / Room Owner'])
                ->rules('required', 'in:0,1,2')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('acc_calendar_force')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            Select::make('cmd_update_calendar')
                ->hideFromIndex()
                ->options(['0' => 'No', '1' => 'Yes'])
                ->rules('required', 'in:0,1')
                ->default(0)
                ->displayUsingLabels(),

            HasMany::make('Users'),
        ];
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
