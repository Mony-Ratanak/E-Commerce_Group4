<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

            <p>Welcome, {{$name}}!</p>
            <p>sessionId=, {{$sessionId}}!</p>
            <p>the cookie for sessionId, {{$cookie}}!</p>
        </div>
    </div>
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="{{ str_replace('', '', app()->getLocale()) }}">

<head>

    <style>
        .container {
            margin: 50px auto;
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="container">
        <h3>Welcome to Ecommerce backend server</h3>
        <h5>Powered by Laravel v.10 <br/>Version 0.1</h5>
    </div>
    
</body>

</html> -->

