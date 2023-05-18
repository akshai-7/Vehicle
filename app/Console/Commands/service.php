<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vehicle;

class service extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'service:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $date = date('Y-m-d');
        $vehicles = Vehicle::whereDate('nextservice', '<', $date)->get();
        foreach ($vehicles as $vehicle) {
            $vehicle->servicestatus = 'YES';
            $vehicle->save();
        }
    }
}
