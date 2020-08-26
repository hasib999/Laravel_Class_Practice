<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
</head>
<body>

<h1>Details Page </h1>
<a href="/home">Home</a> | <a href="/home/edit/{{$user['id']}}">Edit User</a> | <a href="/home/delete/{{$user['id']}}">Delete User</a>

    <table>
        <tr style="text-align: left"><th colspan="2">User info:</th></tr>
        <tr>
            <td>ID</td>
            <td>: {{$user['id']}}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>: {{$user['name']}}</td>
        </tr>

        <tr>
            <td>Password</td>
            <td>: {{$user['password']}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: {{$user['email']}}</td>
        </tr>
    </table>

</body>
</html>
