<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CronJobs;
use App\Classes\LyskillsCarbon;
use Exception;

abstract class BaseCron extends Command
{
    protected $cronJob;

    public function handle()
    {
        // Ensure cron record exists and mark as running
        $this->cronJob = CronJobs::firstOrCreate(
            [config('table.name') => $this->signature],
            [
                config('table.name')   => $this->signature,
                config('table.status') => config('constants.idle'),
                config('table.w_name') => config('app.url'),
                config('table.starts_at') => LyskillsCarbon::now()
            ]
        );

        $this->cronJob->starts_at = LyskillsCarbon::now();
        try {
            // Execute the actual cron logic
            $erro_message = $this->runCron();

            // Success update
            $this->updateCron($erro_message);
        } catch (Exception $e) {
            // Failure update
            $this->updateCron($e->getMessage());
            $this->error($e->getMessage());
        }
    }

    private function updateCron($erro_message){
            $this->cronJob->update([
                config('table.status')  => $erro_message ? config('constants.error') : config('constants.successed'),
                config('table.message') => $erro_message ?? 'Cron executed successfully',
                config('table.ends_at') => LyskillsCarbon::now(),
            ]);
    }

    // Child classes must implement this
    abstract protected function runCron();
}
