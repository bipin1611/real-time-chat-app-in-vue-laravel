<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->

        <script>
            window.App = {!! json_encode([
                    'user' => Auth::user(),
                    'signedIn' => Auth::check()
                ])
            !!};
        </script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            /*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/
            body {
                background-color: #74EBD5;
                background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);

                min-height: 100vh;
            }

            ::-webkit-scrollbar {
                width: 5px;
            }

            ::-webkit-scrollbar-track {
                width: 5px;
                background: #f5f5f5;
            }

            ::-webkit-scrollbar-thumb {
                width: 1em;
                background-color: #ddd;
                outline: 1px solid slategrey;
                border-radius: 1rem;
            }

            .text-small {
                font-size: 0.9rem;
            }

            .messages-box,
            .chat-box {
                height: 510px;
                overflow-y: scroll;
            }

            .rounded-lg {
                border-radius: 0.5rem;
            }

            input::placeholder {
                font-size: 0.9rem;
                color: #999;
            }

        </style>

    </head>
    <body class="antialiased">
        <div id="app" class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
           
                @auth
                    <h1 class="relative justify-center" style="text-align: center; margin-top: 10px;">Welcome, {{ auth()->user()->name }}</h1>

                    <div class="container py-5 px-4">
                        <div class="row rounded-lg overflow-hidden shadow">
                            <!-- Users box-->
                            <users ></users>
                            <!-- Chat Box-->
                            <chat-box></chat-box>
                        </div>
                    </div>
                @else
                    <h2 class="relative justify-center" style="text-align: center; margin-top: 50px;">Please Sign in to Chat with Other User</h2>

                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-2 sm:block" style="text-align: center">
                            @auth
                                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">{{ auth()->user()->name }}</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline" style="margin-right: 20px;">Log in</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
    
                @endauth
                

        </div>

    <script src="/js/app.js"></script>
    </body>
</html>
