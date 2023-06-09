<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Assign;

class UpdateStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UpdateStatusCommand:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status based on date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**s
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $date = now()->format('Y-m-d'); // Get the current date

        // // Query the records based on the date condition
        // $records = Assign::whereDate('date_column', $date)->get(); // Replace 'date_column' with your actual column name

        // // Update the status for each record
        // foreach ($records as $record) {
        //     $record->status = 'updated_status'; // Replace 'updated_status' with the desired status
        //     $record->save();
        // }
        $date = date('Y-m-d');
        $records = Assign::whereDate('next_inspection', '<', $date)->get();
        foreach ($records as $record) {
            $record->overdue = 'YES';
            $record->save();
        }
    }
}
