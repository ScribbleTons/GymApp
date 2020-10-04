<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Inertia\Inertia;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LeadController;


class ReminderController extends Controller
{
    private $validation = [
        'reminder' => 'required|min:3',
        'reminder_date' => 'required|date',
        'lead_id' => 'required|exists:leads,id'
    ];
    public function add(Lead $lead){
        return Inertia::render('Leads/Reminder/ReminderAdd', ['lead'=>$lead]);
    }

    public function store(Request $request){
        $postData = $this->validate($request, $this->validation);
        $postData['user_id'] = $request->user()->id;
        $postData['status'] = 'Pending';

        $lead = Lead::find($postData['lead_id']);
        $lead->reminder()->create($postData);

        return redirect()->route('lead.view', [$lead]);
    }
    public function view(Lead $lead, Reminder $reminder){
        return inertia::render('Leads/Reminder/ReminderView', [
            'lead' => $lead,
            'reminder' => $reminder
        ]);
    }
    public function update(Request $request){

       if($request->has('id')){
           $reminder = Reminder::find($request->input('id'));
           $reminder->note = $request->validate(['note'=>'required|min:5']);
           $reminder->status ="Completed";
           $reminder->update($request->all());
           return redirect()->action([LeadController::class, 'view'],['lead'=>$request->lead_id]);
       }else{
           die('You are still in the ditch!');
       }
    }

    public function delete(Reminder $reminder){
        $reminder->delete();
        $lead = Lead::find($reminder->lead_id);
        return redirect()->route('lead.view', ['lead' =>$lead]);

    }
}
