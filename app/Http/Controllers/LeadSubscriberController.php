<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Inertia\Inertia;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadSubscriberController extends Controller
{
    public function view(Request $request){
        $package = null;
        $search = false;

        if($request->has('search') && $request->input('search') != ''){
            $search = true;
        }

        if($request->has('package') && $request->input('package') != 0){
            $package = $request->input('package');
        }

        $subscribers = Subscribers::where('branch_id', 1)
            ->where('added_by', Auth::user()->id)
            ->when($search, function($query) use ($request){
                $query->where('name', 'like', "%{$request->input('search')}%")
                        ->orWhere('email', 'like', "%{$request->input('search')}%")
                        ->orWhere('age', 'like', "%{$request->input('search')}%");
            })
            ->when($package != null, function($query) use ($package){
                $query->where('package', $package);
            })
            ->orderByDesc('id')
            ->get();

            return Inertia::render('Subscribers/SubscriberView', ['subscribers' => $subscribers]);
    }
    public function add(Lead $lead){
        
        return Inertia::render('Subscribers/SubscriberAdd.vue', ['lead'=>$lead]);
    }
    public function store(Request $request){
        
        $postData = $this->validate($request, [
            'name' => 'required',
            'lead_id' => 'required|exists:leads,id',
            'renewal_date' => 'required|date|date_format:"Y-m-d"',
            'amount' => 'required',
            'package' => 'required'
        ]);

        $lead = Lead::find($postData['lead_id']);

        Subscribers::create([
        'name' => $postData['name'],
        'lead_id' =>  $postData['lead_id' ],
        'renewal_date' => $postData['renewal_date'] ,
        'amount' => $postData['amount'],
        'package' => $postData['package'],

        'name' => $lead['name'], 
        'email' => $lead['email'],
        'phone' => $lead[ 'phone'],
        'dob' => $lead[ 'dob'],
        'age' => $lead[ 'age'],
        'branch_id' => $lead['branch_id'],
        'added_by' => $lead['added_by']
        ]);
        $lead->active = 0;
        $lead->save();

        return redirect()->route('lead.subscribe', ['lead'=>$lead])->with('success', 'Subscriber Added.');
    }
}
