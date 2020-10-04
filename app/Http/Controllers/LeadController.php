<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Auth\Events\Validated;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class LeadController extends Controller
{
    private $validation;

    public function __construct(){
        $this->validation = [
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'phone' => 'required',
            "interested_package" => 'sometimes',
        ];
    }
    
    public function index(Request $request){
        $package = null;
        $search = false;

        if($request->has('search') && $request->input('search') != ''){
            $search = true;
        }

        if($request->has('package') && $request->input('package') != 0){
            $package = $request->input('package');
        }

        $leads = Lead::where('branch_id', 1)
            ->where('active', 1)
            ->when($search, function($query) use ($request){
                $query->where('name', 'like', "%{$request->input('search')}%")
                        ->orWhere('email', 'like', "%{$request->input('search')}%");
            })
            ->when($package != null, function($query) use ($package){
                $query->where('interested_package', $package);
            })
            ->orderByDesc('id')
            ->get();

            return Inertia::render('Leads/Index', [
                'leads' => $leads,
            ]);
    }
    public function create(){
        return Inertia::render('Leads/LeadAdd');
    }
    public function store(Request $request){
        $postData = $this->validate($request, $this->validation);

        $package = "";
        if($request->has('interested_package')){
            $package = $request->input('interested_package');
        }
        
        $dob = Carbon::parse($postData['dob']);
        $age = $dob->age;

        Lead::create([
            'name' => $postData['name'],
            'email' => $postData['email'],
            'dob' => $postData['dob'],
            'phone' => $postData['phone'],
            'branch_id' => 1,
            'age' => $age,
            'added_by' => Auth::user()->id,
            "interested_package" => $package,
        ]);
        return redirect()->route('lead.list');
    }
    public function view(Lead $lead){
        $lead->load(['reminder']);
        return Inertia::render('Leads/LeadView', [
            'lead-prop' => $lead,
        ]);
    }
    public function update(Request $request){

        $rules = $this->validation;
        $rules['id'] = 'required|exists:leads';
        $postData = $request->validate($rules);
        $postData['age'] = Carbon::parse($postData['dob'])->age;
        $lead = Lead::where('id', '=', $postData['id'])->update($postData);
        return redirect()->route('lead.list', ['lead'=> $postData['id']]);
    }
    public function delete(Lead $lead){
        $lead->load(['reminder']);
        $lead->delete();
        return redirect()->route("lead.list");
    }
}
 