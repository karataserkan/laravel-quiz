<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Customer;

class EmailPazarlama extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:emailPazarlama';

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
            $customers->where('department_id', 2)->each(function ($customer) {
                Mail::raw("Some description here", function ($mail) use ($customer) {
                    $mail->from('mail@application.com');
                    $mail->to($customer->email)
                    ->subject('Daily mail!');
                });
            });
        }
    }
}
