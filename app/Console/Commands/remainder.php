<?php

namespace App\Console\Commands;

use App\Models\Assign;
use Illuminate\Console\Command;
use App\Mail\remainderMail;
use Illuminate\Support\Facades\Mail;

class remainder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remainder:mail';

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

        Mail::To('akshai2537@gmail.com')->send(new remainderMail);
    }
}
