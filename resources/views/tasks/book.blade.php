<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/book.css') }}"> 
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Hall-booking</title>
 
</head>         
<body>
@extends('front.index')
    <!-- Individual slot buttons -->
   <div class="book-container">
      <div class="pane">
      <h1> <img src="{{ asset('images/logo2.png') }}" alt="logo"> BIT</h1>
        <h2> <u> Hall-booking System</u></h2>
        <br>    
          <div class="hall-sec">
    <form action="{{route('tasks.book')}}" method="GET">
       @csrf
          <div class="hall-selection">
            <label for="hall">Select Hall:</label>
            <select name="hall" id="hall" required onchange="this.form.submit()">
                <option value="" disabled selected>Select a Hall</option>
                <option value="Main Autditorium Hall" {{ request('hall') == 'Main Autditorium Hall' ? 'selected' : '' }}>Main Autditorium Hall</option>
                <option value="Vedhanayagam Hall" {{ request('hall') == 'Vedhanayagam Hall' ? 'selected' : '' }}>Vedhanayagam Hall</option>
                <option value="ECE seminar Hall" {{ request('hall') == 'ECE seminar Hall' ? 'selected' : '' }}>ECE seminar Hall</option>
                <option value="SF Seminar Hall" {{ request('hall') == 'SF Seminar Hall' ? 'selected' : '' }}>SF Seminar Hall</option>
            </select>
        </div>
        </form>
        
        
        
   <form action="{{ route('tasks.book') }}" method="GET">
           @csrf
           <input type="hidden" name="hall" value="{{ request('hall') }}">
           <!-- Date Picker (Select a date) -->
           <div class="date">
               <label for="booking-date">Select Date:</label>
               <input type="date" id="booking-date" name="selected_date" value="{{ request('selected_date') }}" onchange="this.form.submit()" required>
           </div>
       </form>
       </div>


       <form action="{{ route('books.bookNow') }}" method="POST">
       @csrf
       <input type="hidden" name="hall" value="{{ request('hall') }}">
       <input type="hidden" name="selected_date" value="{{ request('selected_date') }}">
       <div class="purpose">
        <label for="hall-purpose">Purpose:</label>
        <input type="text" id="hall-purpose" name="purpose" placeholder="Enter the Purpose" required>
        <!-- <input type="textarea" id="hall-purpose"> -->
       </div>
      
       
       <br>      

        
    <form action="{{ route('books.bookNow') }}" method="POST">
        @csrf
        <input type="hidden" name="hall" value="{{ request('hall') }}">
        <input type="hidden" name="selected_date" value="{{ request('selected_date') }}">
        <label  class="words" for="selected_slots[]"> <b> Forenoon:</b>  </label>
      
       <div class="book-btns">
       @php
           $bookedSlots = $storedClasses->pluck('class_name')->toArray();
       @endphp      
       
        <!--1) Button for 8.30 - 9.00 -->
        <input type="checkbox" name="selected_slots[]" value="8.30 - 9.00" id="8.30 - 9.00" hidden>
        <button type="button" onclick="document.getElementById('8.30 - 9.00').checked = true;" 
                class="{{ in_array('8.30 - 9.00', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                8.30 - 9.00
        </button>
      
       <!--2) Button for 9.00 - 9.30 -->
       <input type="checkbox" name="selected_slots[]" value="9.00 - 9.30" id="9.00 - 9.30" hidden>
        <button type="button" onclick="document.getElementById('9.00 - 9.30').checked = true;" 
                class="{{ in_array('9.00 - 9.30', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                9.00 - 9.30
        </button>
       
       <!--3) Button for 9.30 - 10.00 -->
       <input type="checkbox" name="selected_slots[]" value="9.30 - 10.00" id="9.30 - 10.00" hidden>
        <button type="button" onclick="document.getElementById('9.30 - 10.00').checked = true;" 
                class="{{ in_array('9.30 - 10.00', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                9.30 - 10.00
        </button>
      
       <!--4) Button for 10.00 - 10.30 -->
       <input type="checkbox" name="selected_slots[]" value="10.00 - 10.30" id="10.00 - 10.30" hidden>
        <button type="button" onclick="document.getElementById('10.00 - 10.30').checked = true;" 
                class="{{ in_array('10.00 - 10.30', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                10.00 - 10.30
        </button>
        
         <!--5) Button for 10.30 - 11.00 -->
         <input type="checkbox" name="selected_slots[]" value="10.30 - 11.00" id="10.30 - 11.00" hidden>
        <button type="button" onclick="document.getElementById('10.30 - 11.00').checked = true;" 
                class="{{ in_array('10.30 - 11.00', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                10.30 - 11.00
        </button>
      
       <!--6) Button for 11.00-11.30 -->
       <input type="checkbox" name="selected_slots[]" value="11.00 - 11.30" id="11.00 - 11.30" hidden>
        <button type="button" onclick="document.getElementById('11.00 - 11.30').checked = true;" 
                class="{{ in_array('11.00 - 11.30', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                11.00 - 11.30
        </button>
        <!--7) Button for 11.30 - 12.00 -->
        <input type="checkbox" name="selected_slots[]" value="11.30 - 12.00" id="11.30 - 12.00" hidden>
        <button type="button" onclick="document.getElementById('11.30 - 12.00').checked = true;" 
                class="{{ in_array('11.30 - 12.00', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                11.30 - 12.00
        </button>
      
       <!--8) Button for 12.00 - 12.30 -->
       <input type="checkbox" name="selected_slots[]" value="12.00 - 12.30" id="12.00 - 12.30" hidden>
        <button type="button" onclick="document.getElementById('12.00 - 12.30').checked = true;" 
                class="{{ in_array('12.00 - 12.30', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                12.00 - 12.30
        </button>
       
       

        </div>

        <br>

        <label class="words" for="selected_slots[]"> <b> Afternoon:</b> </label>
       
        <div class="book-btns">
       @php
           $bookedSlots = $storedClasses->pluck('class_name')->toArray();
       @endphp

       
      
       <!--2) Button for 1.00 - 1.30 -->
       <input type="checkbox" name="selected_slots[]" value="1.00 - 1.30" id="1.00 - 1.30" hidden>
        <button type="button" onclick="document.getElementById('1.00 - 1.30').checked = true;" 
                class="{{ in_array('1.00 - 1.30', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                1.00 - 1.30
        </button>

        <!--3) Button for 1.30 - 2.00 -->
        <input type="checkbox" name="selected_slots[]" value="1.30 - 2.00" id="1.30 - 2.00" hidden>
        <button type="button" onclick="document.getElementById('1.30 - 2.00').checked = true;" 
                class="{{ in_array('1.30 - 2.00', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                1.30 - 2.00
        </button>
      
       <!--4) Button for 2.00 - 2.30-->
       <input type="checkbox" name="selected_slots[]" value="2.00 - 2.30" id="2.00 - 2.30" hidden>
        <button type="button" onclick="document.getElementById('2.00 - 2.30').checked = true;" 
                class="{{ in_array('2.00 - 2.30', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                2.00 - 2.30
        </button>
        
       
       <!--5) Button for 2.30 - 3.00 -->
       <input type="checkbox" name="selected_slots[]" value="2.30 - 3.00" id="2.30 - 3.00" hidden>
        <button type="button" onclick="document.getElementById('2.30 - 3.00').checked = true;" 
                class="{{ in_array('2.30 - 3.00', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                2.30 - 3.00
        </button>
             
       <!--6) Button for 3.00 - 3.30 -->
       <input type="checkbox" name="selected_slots[]" value="3.00 - 3.30" id="3.00 - 3.30" hidden>
        <button type="button" onclick="document.getElementById('3.00 - 3.30').checked = true;" 
                class="{{ in_array('3.00 - 3.30', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                3.00 - 3.30
        </button>
        
         <!--7) Button for 3.30 - 4.00 -->
         <input type="checkbox" name="selected_slots[]" value="3.30 - 4.00" id="3.30 - 4.00" hidden>
        <button type="button" onclick="document.getElementById('3.30 - 4.00').checked = true;" 
                class="{{ in_array('slot (3.30 - 4.000)', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                3.30 - 4.00
        </button>
      
       <!--8) Button for 4.00 - 4.30 -->
       <input type="checkbox" name="selected_slots[]" value="4.00 - 4.30" id="4.00 - 4.30" hidden>
        <button type="button" onclick="document.getElementById('4.00 - 4.30').checked = true;" 
                class="{{ in_array('4.00 - 4.30', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                4.00 - 4.30
        </button>

         <!--) Button for After 4.30 -->
       <input type="checkbox" name="selected_slots[]" value="After 4.30" id="After 4.30" hidden>
        <button type="button" onclick="document.getElementById('After 4.30').checked = true;" 
                class="{{ in_array('After 4.30', $bookedSlots) ? 'booked' : 'notbooked' }}" id="btns">
                
                After-4.30
        </button>

            </div>
            <br>
        

        <!-- Book Now Button -->
        <div class="book-btn-container">
            <button type="submit" class="book">Book Now</button>
        </div>
      
    </form>
       
  
    
   

    <div class="book-table">
    <!-- Display stored slots in a table -->
    @if($storedClasses->isNotEmpty())
    <table>
        <thead>
            <tr>
                <th>Slot</th>
                <th>Purpose</th>
                <th>Booked by</th>
                <th>Booked on</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($storedClasses as $class)
            
                <tr> 
                    <td>{{ $class->class_name }}</td>
                    <td>{{ $class->purpose }}</td>                    
                    <td>{{ $class->user->name ?? 'No User Assigned'}}</td>
                    <td>{{ $class->created_at->format('Y-m-d ') }}</td>
                    <td>
                    @if (Auth::id() === $class->user_id)
                        <form action="{{ route('books.delete', $class->id) }}" method="POST">
                        @csrf
                         @method('DELETE')
                        <button type="submit" class="del">Delete</button>
                        </form>
                        @else
                        -
                        @endif
                    </td>

                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
  
    @endif
    </div>
    </div>
    </div>

    <script>   
    const buttons = document.querySelectorAll('.notbooked, .booked');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
         
            if (this.classList.contains('selected')) {
                this.classList.remove('selected');
            } else {
                this.classList.add('selected');
            }
        });
    });
</script>

</body>
</html>
