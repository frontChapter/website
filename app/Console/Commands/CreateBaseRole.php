<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class CreateBaseRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:assign-super-admin {assignee}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'assign given email as super admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Role::updateOrCreate([
            'name' => 'Super Admin',
        ]);

        $user = User::whereEmail($this->argument('assignee'))->first();

        if(is_null($user)) {
            $this->error('there is no user with given email!');
        } else {
            $user->syncRoles(['Super Admin']);
        }

    }
}
