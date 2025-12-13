<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // redirect ke assesment kalau belum lengkap
        if (!$user->umur) {
            return redirect('/assesment');
        }

        $today = Carbon::today()->toDateString();

        // reset hanya 1x per hari
        if ($user->last_reset_date !== $today) {
            $user->update([
                'current_protein' => 0,
                'current_karbo' => 0,
                'current_kalori' => 0,
                'food_today' => [],
                'last_reset_date' => $today
            ]);
        }

        return view('pages.dashboard', compact('user'));
    }
}
