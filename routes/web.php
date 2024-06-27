<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Carbon\Carbon;
Route::view('/', 'welcome');
Route::get('/dashboard', function () {
    $users = User::where('id', '!=', auth()->user()->id)->get();

    foreach ($users as $user) {
        if ($user->last_seen_at) {
          

            $lastSeen = Carbon::parse($user->last_seen_at);
            $user->is_online = $lastSeen->diffInMinutes(Carbon::now()) < 1;
        } else {
            $user->is_online = false;
        }
    }

    return view('dashboard', [
        'users' => $users,
        
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/chat/{id}', function($id){
        return view('chat',[
            'id' => $id
        ]);
    })->middleware(['auth', 'verified'])->name('chat');





Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
