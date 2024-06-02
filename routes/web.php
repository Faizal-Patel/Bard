<?php

use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\ShakespeareController;
use App\Http\Controllers\UserStatsController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/user-ip', function () {
        $userId = Auth::id();
        $session = DB::table('sessions')->where('user_id', $userId)->orderBy('last_activity', 'desc')->first();
        return response()->json(['ip' => $session ? $session->ip_address : null]);
    });

    Route::get('/api/works', [ShakespeareController::class, 'getWorks']);
    Route::get('/api/characters', [ShakespeareController::class, 'fetchCharacters']);
    Route::get('/fetch-paragraphs', [ShakespeareController::class, 'fetchParagraphs'])->name('fetch-paragraphs');
    Route::post('/validate-api-key', [ApiTokenController::class, 'validateApiKey'])->name('validate-api-key');
    Route::get('/user-stats', [UserStatsController::class, 'showStats'])->name('user-stats');
});
