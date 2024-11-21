<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/available.css') }}"> 
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Hall-available</title>
</head>
<body>
@extends('front.index')

<div class="avail-container">
    <div class="pane">
    <h1> <img src="{{ asset('images/logo2.png') }}" alt="logo"> BIT</h1>
        <h2> <u> Hall-Availablity</u></h2>
        <br>   
    <form action="{{ route('tasks.table') }}" method="GET">
           @csrf
            <!-- Date Picker (Select a date) -->
           <div class="date">
               <label for="booking-date">Select Date:</label>
               <input type="date" id="booking-date" name="selected_date" value="{{ request('selected_date') }}" onchange="this.form.submit()" required>
           </div>
       </form>

       <div class="book-table">
      


       @if(!empty($bookedSlotsByHall) )
            <table>
                <thead>
                    <tr>
                        <th>Hall</th>
                        <th>Slot</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (['Main Autditorium Hall', 'Vedhanayagam Hall', 'ECE seminar Hall', 'SF Seminar Hall'] as $hall)
                    <tr>
                        <td>{{ $hall }}</td>
                        <td>
                                    <div class="slots-row">
                                        @foreach (['8.30 - 9.00', '9.00 - 9.30', '9.30 - 10.00', '10.00 - 10.30', '10.30 - 11.00', '11.00 - 11.30', '11.30 - 12.00', '12.00 - 12.30'] as $slot)
                                            <span class="slot {{ in_array($slot, $bookedSlotsByHall[$hall] ?? []) ? 'booked' : 'notbooked' }}">
                                                {{ $slot }}
                                            </span>
                                        @endforeach
                                    </div>
                                    <div class="slots-row">
                                        @foreach (['1.00 - 1.30', '1.30 - 2.00', '2.00 - 2.30', '2.30 - 3.00', '3.00 - 3.30', '3.30 - 4.00', '4.00 - 4.30', 'After 4.30'] as $slot)
                                            <span class="slot {{ in_array($slot, $bookedSlotsByHall[$hall] ?? []) ? 'booked' : 'notbooked' }}">
                                                {{ $slot }}
                                            </span>
                                        @endforeach
                                    </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p><b>No Bookings</b></p>
         @endif
        </div>
       
    </div>
</div>
</body>
</html>