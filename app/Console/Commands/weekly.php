<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Assign;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;

class weekly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weekly:mail';

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
        $emails = Assign::pluck('email');
        foreach ($emails as $email) {
            Mail::To($email)->send(new sendMail);
        }
    }
}
