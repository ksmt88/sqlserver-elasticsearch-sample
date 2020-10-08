<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>
<body>
<form method="post" action="/search">
    @csrf
    <label for="word">search: </label>
    <input type="text" name="word" id="word" placeholder="search text" value="{{ $word }}">
    <button type="submit">submit</button>
</form>

<table>
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>created_at</th>
        <th>updated_at</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th>{{ $user['id'] }}</th>
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['email'] }}</td>
            <td>{{ $user['created_at'] }}</td>
            <td>{{ $user['updated_at'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
