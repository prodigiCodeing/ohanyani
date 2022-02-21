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
        <div class="w-full max-w-1100 bg-green mx-auto  bg-custom-image">
            <router-view></router-view>
        </div>

    </div>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '256178373358728',
                cookie     : true,
                xfbml      : true,
                version    : 'v13.0'
            });

            FB.AppEvents.logPageView();

        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
<script src="./js/app.js"></script>
</body>
</html>
