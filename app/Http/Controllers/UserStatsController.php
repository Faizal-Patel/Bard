<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class UserStatsController extends Controller
{
    public function showStats(Request $request)
    {
        $user = $request->user();
        $stats = DB::table('user_searches')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('UserStats', [
            'stats' => $stats
        ]);
    }
}
