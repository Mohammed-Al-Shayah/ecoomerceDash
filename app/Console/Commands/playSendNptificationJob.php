<?php

namespace App\Console\Commands;

use App\Jobs\SendNotificationJob;
use Illuminate\Console\Command;

class playSendNptificationJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $job=new SendNotificationJob();
        $this->info("start");
        $this->info($job->handle());
        $this->info("end job");

    }
}
