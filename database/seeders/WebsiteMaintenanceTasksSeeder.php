<?php

namespace Database\Seeders;

use App\Models\Game\Permission;
use App\Models\Miscellaneous\WebsiteMaintenanceTask;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WebsiteMaintenanceTasksSeeder extends Seeder
{
    public function run(): void
    {
        $permission = Permission::orderByDesc('id')->first();
        $user = User::where('rank', $permission->id)->first();

        if ($user === null) {
            $user = User::create([
                'username' => 'Admin',
                'mail' => 'admin@example.com',
                'password' => Hash::make(Str::password()),
                'account_created' => time(),
                'last_login' => time(),
                'motto' => setting('start_motto'),
                'look' => setting('start_look'),
                'credits' => setting('start_credits'),
                'ip_register' => '127.0.0.1',
                'ip_current' => '127.0.0.1',
                'auth_ticket' => '',
                'home_room' => (int) setting('hotel_home_room'),
                'rank' => $permission?->id ?? 1,
            ]);
        }

        WebsiteMaintenanceTask::firstOrCreate(['task' => 'Working on the hotel'], [
            'user_id' => $user->id,
            'completed' => false,
        ]);
    }
}
