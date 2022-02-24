<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <noscript>Please Enable Javascript</noscript>
    <div id="app">
        <div class="w-full max-w-1100 bg-green mx-auto  bg-custom-image for-height">
            <router-view></router-view>
        </div>

    </div>


<script src="./js/app.js"></script>
</body>
</html>
