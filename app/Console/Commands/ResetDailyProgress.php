<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class ResetDailyProgress extends Command
{
    protected $signature = 'progress:reset-daily';
    protected $description = 'Reset daily food progress at midnight';

    public function handle()
    {
        $today = Carbon::today()->toDateString();
        
        // Reset semua user yang belum direset hari ini
        $updated = User::where(function($query) use ($today) {
            $query->whereNull('last_reset_date')
                  ->orWhere('last_reset_date', '<', $today);
        })->update([
            'current_protein' => 0,
            'current_karbo' => 0,
            'current_kalori' => 0,
            'food_today' => json_encode([]),
            'last_reset_date' => $today
        ]);

        $this->info("Daily progress reset successfully! {$updated} users updated.");
        
        return Command::SUCCESS;
    }
}