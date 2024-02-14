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
        <p style="text-align:center;">Dashboard</p>
        <p style="text-align:right;">Hello, {{ $user->username }}</p>
        <div style="text-align:right;">
            <form action="/logout" method="post">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
        <table>
            <thead>
                <tr >
                    <td style="border: 1px solid black;">Сity</td>
                    <td style="border: 1px solid black;">Country</td>
                    <td style="border: 1px solid black;">Temp in Celcius</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border: 1px solid black;">{{ $weather['location']['name'] }}</td>
                    <td style="border: 1px solid black;">{{ $weather['location']['country'] }}</td>
                    <td style="border: 1px solid black;">{{ $weather['current']['temp_c'] }}</td>
                </tr>
            </tbody>
        </table>
        <img src="{{ $weather['current']['condition']['icon']}}" >

        <p style="text-align: center;">TO_DO list</p>
        <div style="text-align: center;">
            <form action="/dashboard" method="post">
                @csrf
                <input type="text" name="title">
                <button>Add Task</button>
            </form>   
        </div>
        <hr>
        @if (isset($tasks))
        <table>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>
                    @if ($task->status == 'notdone')
                    <a href="/dashboard/{{$task->id}}/done">Завершить</a>
                    @else
                    Завершено
                    @endif
                </td>
                <td><a href="/dashboard/{{$task->id}}/delete">Delete</a></td>
            </tr>
            @endforeach
        </table>
        @endif
        
        
       
    </body>
</html>
