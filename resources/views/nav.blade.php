<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('nav/nav.css') }}">
</head>
<body>
    <nav class="nav">
        <div class="container">
            <div class="logo">
                <img src="{{ asset('public/images/web/nikon.jpg') }}" alt="">
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a  href="{{ url('/') }}">Home</a></li>
                    <li><a  href="{{ url('photos') }}">Galary</a></li>
                    <li><a  href="{{ url('pricing') }}">Pricing</a></li>
                    <li><a  href="{{ url('contact') }}">Contact</a></li>
                </ul>
            </div>
            <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </div>
    </nav>
    <!-- Jquery needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ asset('nav/nav.js') }}"></script>

    <!-- Function used to shrink nav bar removing paddings and adding black background -->
    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });
    </script>
</body>
</html>
