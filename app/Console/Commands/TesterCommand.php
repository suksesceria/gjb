<?php

namespace App\Console\Commands;

use App\Menu;
use App\Role;
use Carbon\Carbon;
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
        $sd = Carbon::createFromFormat('Y-m-d', '2020-01-01');
        $ed = Carbon::createFromFormat('Y-m-d', '2020-01-31');

        $totalDays = $sd->diffInDays($ed);
        $totalWeeks = ceil($totalDays/7);
        $this->info("Total weeks {$totalWeeks}");


        $selip = Carbon::createFromFormat('Y-m-d', '2020-02-01');
        $totalDays = $sd->diffInDays($selip);
        $totalWeeks = ceil($totalDays/7);
        $this->info($totalWeeks);

        dd(

            str_pad("<td>2</td>", 50, "<td></td>", STR_PAD_LEFT)
        );
    }
}
