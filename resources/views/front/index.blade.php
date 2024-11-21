<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front-page</title>
    <!--======== CSS ========-->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <!--===== Boxicons CSS =====-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="popup">
    <div class="container">
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </span>

                    <div class="text logo-text">
                        <span class="name">BIT</span>
                    </div>
                </div>

                <i class='bx bx-chevron-right toggle'></i>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="{{ route('front.index') }}">
                                <i class='bx bx-home icon'></i>
                                <span class="text nav-text">Home</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('tasks.book') }}">
                                <i class='bx bx-book-add icon'></i>
                                <span class="text nav-text">Hall-Booking</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="{{ route('tasks.available') }}">
                                <i class='bx bx-bookmarks icon'></i>
                                <span class="text nav-text">Hall-available</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bottom-content">
                    @if(in_array(Auth::user()->id, [1]))
                    <li>
                        <form id="admin-form" method="GET" action="{{ route('admin.admin') }}" style="float: left;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('admin-form').submit();">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Admin</span>
                        </a>
                    </li>

                    <li>
                        <form id="feedback-page" method="GET" action="{{ route('admin.feedback') }}" style="float: left;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('feedback-page').submit();">
                            <i class='bx bx-edit icon'></i>
                            <span class="text nav-text">Feedback</span>
                        </a>
                    </li>
                    @endif

                    <li>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </div>
            </div>
        </nav>

        <div class="feedback">
            <span href="#" class="feed" onclick="openFeedback()">Feedback</span>
        </div>

        <div class="popup-box" id="feedbackPopup">
            <div class="popup-content">
                <span class="close" onclick="closeFeedback()">&times;</span>
                <h2>Feedback</h2>
                <form action="{{ route('tasks.feedback') }}" method="POST">
                    @csrf
                    <textarea name="feedback" placeholder="Share your feedback..." rows="5" cols="40"></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle");

    // Popup open/close functionality
    function openFeedback() {
        const feedbackPopup = document.getElementById('feedbackPopup');
        feedbackPopup.style.display = 'flex';
    }

    function closeFeedback() {
        const feedbackPopup = document.getElementById('feedbackPopup');
        feedbackPopup.style.display = 'none';
    }

    // Toggle sidebar close/open
    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });

    // Ensure sidebar open/close functionality on hover
    sidebar.addEventListener('mouseenter', () => {
        sidebar.classList.remove("close");
    });

    sidebar.addEventListener('mouseleave', () => {
        sidebar.classList.add("close");
    });
</script>

</body>
</html>
