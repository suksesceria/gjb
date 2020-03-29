<?php

namespace App\Console\Commands;

use App\Menu;
use App\Role;
use Illuminate\Console\Command;

class TesterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tester:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing cuy';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $role = Role::first();
//        $role->menus()->detach([3]);
//        $role->menus()->attach([3]);
        dd($role->menus->count());
    }
}
