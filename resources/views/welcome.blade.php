<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Questionnaire App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .list{
                align-items: center;
                display: flex;
                justify-content: center;
                font-size: 20px;
                /* display: none; */
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: left;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <!-- JavaScript Animation -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#list_features").css('display', 'none');
                $("#list_features").fadeIn(2000);
            });
        </script>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    My Questionnaire App
                </div>
                <div class="list" id="list_features">
                    <ul class="list-group">
                        <li class="list-group-item">Create a User by Signing Up</li>
                        <li class="list-group-item">Create a Questionnaire Survey</li>
                        <li class="list-group-item">Add as Many Questions as You Like</li>
                        <li class="list-group-item">Share Your Questionnaire with a link for Others to Take</li>
                        <li class="list-group-item">Get statistics for each response</li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
