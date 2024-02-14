<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Main page</title>

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
        <p style="text-align:center;"><img src="/images/logo.png"  height="72"><br></p>
        <p style="text-align:center;"><a href="/login" class="glow-button">Log in</a>
                                      <a href="/register" class="glow-button">Register</a></p>
       
    </body>
</html>
