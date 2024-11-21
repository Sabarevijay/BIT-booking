<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
   public function store(Request $request)
   {
    $request->validate(
        [
            'feedback'=>'required|string|max:1000'
        ]
        );
        Feedback::create([
            'feedback'=>$request->feedback,
            'user_id' => Auth::id(),
        ]);
        return redirect()->back()->with('success','Thankyou');

        
   }
     
   public function index()
   {
       // Retrieve all feedback with user details
       $feedbacks = Feedback::with('user')->get();

       // Pass data to the blade view
       return view('admin.auth.feedback', compact('feedbacks'));
   }
 

  
   
}
