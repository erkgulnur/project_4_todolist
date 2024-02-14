<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            .glow-button {
            text-decoration: none;
          
            padding: 15px 30px;
            margin: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 0 40px 40px #5ab0ff inset, 0 0 0 0 #5ab0ff;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            letter-spacing: 2px;
            color: white;
            transition: .15s ease-in-out;
            }
            .glow-button:hover {
            box-shadow: 0 0 10px 0 #5ab0ff inset, 0 0 10px 4px #5ab0ff;
            color: #5ab0ff;
            }
            
        </style>
    </head>
    <body>
        <p style="text-align:center;">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/login" method="post">
            @csrf
            <label for="username">Enter your Username:</label>
            <input type="text" name="username">
            <br>
            <label for="password">Enter your password:</label>
            <input type="password" name="password">
            <br>
            <button>Log in</button>
        </form>        
        </p>
       
    </body>
</html>
