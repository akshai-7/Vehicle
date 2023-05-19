<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
        $date = now()->format('Y-m-d'); // Get the current date

        // Query the records based on the date condition
        $records = YourModel::whereDate('date_column', $date)->get(); // Replace 'date_column' with your actual column name

        // Update the status for each record
        foreach ($records as $record) {
            $record->status = 'updated_status'; // Replace 'updated_status' with the desired status
            $record->save();
        }

        $this->info('Status updated successfully.');
    }
}
