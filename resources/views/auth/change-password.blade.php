<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
</head>

<body>
    <h1>Change Password</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf

        <input type="password" name="current_password" placeholder="Current Password"><br><br>
        <input type="password" name="new_password" placeholder="New Password"><br><br>
        <input type="password" name="new_password_confirmation" placeholder="New Password Confirmation"><br><br>

        <button type="submit">Change Password</button>
    </form>
</body>

</html>
