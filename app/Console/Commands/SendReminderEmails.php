<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Reminder;
use Illuminate\Console\Command;
use App\Mail\ReminderEmailDigest;
use Illuminate\Support\Facades\Mail;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification to user about reminders.';

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
        // get all the reminders for today
        $reminders = Reminder::where('reminder_date', now()->format('Y-m-d'))
                        ->where('status','pending')
                        ->orderBy('user_id')
                        ->get();
        $reminders->load(['lead']);

        
        // group by user
        $data = [];
        foreach($reminders as $reminder){
            $data[$reminder->user_id][] = $reminder->toArray();
        }

        
        // send email
        foreach($data as $userId => $reminders){
            $this->sendEmailToUser($userId, $reminders);
        }
    }

    private function sendEmailToUser($userId, $reminders){
        $user = User::find($userId);
        Mail::to($user)->send(new ReminderEmailDigest($reminders));
    }
}
