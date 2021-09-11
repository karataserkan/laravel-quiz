<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

class EmailMuhasebe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:emailMuhasebe';

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
        $customers = Customer::get();
        if ($customers !== null) {
            $customers->where('department_id', 1)->each(function ($customer) {
                Mail::raw("Some description here", function ($mail) use ($customer) {
                    $mail->from('mail@application.com');
                    $mail->to($customer->email)
                    ->subject('Daily mail!');
                });
            });
        }
    }
}
