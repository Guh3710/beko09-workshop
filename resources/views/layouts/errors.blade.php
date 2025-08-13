<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Error')</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #1a1a1a;
            color: #f1f1f1;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
        }

        h1 {
            font-size: 100px;
            margin: 0;
            color: #ff4444;
        }

        p {
            font-size: 24px;
            margin-top: 10px;
        }

        .emoji {
            font-size: 40px;
            display: inline-block;
            animation: bounce 1s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        a {
            margin-top: 20px;
            color: #00c3ff;
            text-decoration: none;
            font-size: 18px;
            border: 1px solid #00c3ff;
            padding: 10px 20px;
            border-radius: 5px;
        }

        a:hover {
            background: #00c3ff;
            color: #1a1a1a;
        }
    </style>
</head>

<body>
    @yield('content')
</body>

</html>
