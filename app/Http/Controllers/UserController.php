<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){

        $reminders = Reminder::where('reminders.user_id', Auth::user()->id)
                        //  ->whereDate('reminders.reminder_date', now()->format('Y-m-d'))
                        ->where('reminders.status', 'Pending')
                        ->get();
        $reminders->load(['lead']);
        
        $users = User::all()->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                
            ];
        });


        return Inertia::render('Dashboard/Index', [
            'users' => $users,
            'reminders' => $reminders,
            ]);
    }
}
