<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Register email</title>
</head>
<body>
    Hello {{ $user->name }}, please click below link and verified your email.<br/>
    <a href="{{ url('/verification/'.$user->remember_token) }}" style="padding: 15px; background-color: #7E41C2">Verified</a>
</body>
</html>
