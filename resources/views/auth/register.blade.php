<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>

<body>
    <h1>Register</h1>

    <form action="{{route('register.post')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name"><br><br>
        <input type="text" name="email" placeholder="Email"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="password" name="password_confirmation" placeholder="Confirm Password"><br><br>
        <button type="submit">Register</button>
    </form>

    Already Register!!<a href="{{route('login')}}">Login Now!</a>
</body>

</html>
