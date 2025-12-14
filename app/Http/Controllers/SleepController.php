<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SleepRecord;
use Carbon\Carbon;

class SleepController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $records = SleepRecord::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->get();

        return view('pages.sleep-tracking', [
            'user' => $user,
            'records' => $records,
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'hour' => 'required|integer|min:0|max:23',
            'minute' => 'required|integer|min:0|max:59',
        ]);

        SleepRecord::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'date' => now()->format('Y-m-d'),
            ],
            [
                'sleep_time' => sprintf('%02d:%02d:00', $request->hour, $request->minute),
                'wake_time' => null,
            ]
        );

        return response()->json(['success' => true]);
    }

    public function wake(Request $request)
    {
        $request->validate([
            'id' => 'required|integer'
        ]);

        $record = SleepRecord::where('id', $request->id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $record->wake_time = now()->format('H:i:s');
        $record->save();

        return response()->json(['success' => true]);
    }
}
