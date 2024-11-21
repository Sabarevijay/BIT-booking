<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>
<body>
@extends('front.index')



<div class="user-container">
    <h2>Feedback</h2>
    <div class="users">
        <table class="user-table">
            <thead>
                <tr class="table-row">
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                <tr class="data">
                    <td>{{ $feedback->user_id }}</td>
                    <td>{{ $feedback->user->name ?? 'Unknown User' }}</td>
                    <td>{{ $feedback->feedback }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




</body>
</html>