<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plans;
use App\Models\User_plans;

class InvPlanController extends Controller
{
     //Add plan requests
     public function addplan(Request $request){
       
        $plan=new Plans();
        $plan->name= $request['name'];
        $plan->price= $request['price'];
        $plan->min_price= $request['min_price'];
        $plan->max_price= $request['max_price'];
        $plan->minr=$request['minr'];
        $plan->maxr=$request['maxr'];
        $plan->gift=$request['gift'];
        $plan->expected_return= $request['return'];
        $plan->increment_type= $request['t_type'];
        $plan->increment_interval= $request['t_interval'];
        $plan->increment_amount= $request['t_amount'];
        $plan->expiration= $request['expiration'];
        $plan->tag = $request['tag'];
        $plan->type= 'Main';
        $plan->save();
        return redirect()->back()->with('success', 'Plan created Sucessfully!');
    }


    //Update plan
    public function updateplan(Request $request){
        Plans::where('id', $request['id'])
        ->update([
            'name' => $request['name'],
            'price' => $request['price'],
            'min_price' => $request['min_price'],
            'max_price' => $request['max_price'],
            'minr' => $request['minr'],
            'maxr' => $request['maxr'],
            'gift' => $request['gift'],
            'expected_return' => $request['return'],
            'increment_type' => $request['t_type'],
            'increment_amount' => $request['t_amount'],
            'increment_interval' => $request['t_interval'],
             'tag' => $request['tag'],
            'type' => 'Main',
            'expiration' => $request['expiration'],
        ]);
        return redirect()->back()->with('success', 'Plan Successfully Updated');
    }

    //Trash Plans route
    public function trashplan($id){
        
        // Delete this plan from every user account that have bought this plan
        $usersplan = User_plans::where('plan', $id)->get();
        if (count($usersplan) > 0) {
            foreach($usersplan as $plns){
                User_plans::where('id', $plns->id)->delete(); 
            }
        }

        //remove users from the plan before deleting
        $users=User::where('plan',$id)->get();
        foreach($users as $user){
            User::where('id',$user->id)
            ->update([
                'plan' => 0,
                //'confirmed_plan' => 0,
            ]);  
        }
        Plans::where('id',$id)->delete();
        return redirect()->back()
        ->with('success', 'Investment Plan deleted Successfully!');
    }

     
   
}
