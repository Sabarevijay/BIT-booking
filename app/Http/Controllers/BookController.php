<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ButtonClass;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all stored class names
        $storedClasses = ButtonClass::all();

        $selectedHall=$request->input('hall');      
        $selectedDate = $request->input('selected_date');
      
        //   Fetch booked slots for the selected date
        $storedClasses = collect(); // Empty collection by default
        if ($selectedDate) {
            $storedClasses = ButtonClass::where('hall',$selectedHall)
                           ->where('selected_date', $selectedDate)
                           ->get();
        }

        // Pass the stored class names to the view
        return view('tasks.book', compact('storedClasses'));
    }
    
    public function bookNow(Request $request)
    {
        // Get the selected slots from the form
        $selectedSlots = $request->input('selected_slots', []);
        $selectedDate = $request->input('selected_date');
        $selectedHall=$request->input('hall');
        $selectedPurpose=$request->input('purpose');
        $userId = Auth::id();


        $request->validate([
            'selected_date' => 'required|date', // Ensure a date is selected
            'selected_slots' => 'required|array|min:1', 
            'hall' => 'required|min:1',
            'purpose' =>'required|string|max:255',
            
        ]);
        
    
        // Save the selected slots to the database
        foreach ($selectedSlots as $slot) {
            ButtonClass::create(
                ['hall' => $selectedHall,
                'class_name' => $slot,                 
                'selected_date' => $selectedDate,
                'purpose'=>$selectedPurpose,
                'user_id' => Auth::id()
                ]);
        }
    
      
        return redirect()->back()->with('success', 'Selected slots booked successfully!');
    }
    public function delete($id)
    {
        // Find the booking by ID and delete it
        $booking = ButtonClass::findOrFail($id);
        $booking->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Booking deleted successfully!');
    }
}
    
 
    


