<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coba Output AI</title>
</head>

<body>
    <form action="{{ route('ai.post') }}" method="post">
        @csrf
        <input type="text" name="prompt">
        <button type="submit">Generate</button>
    </form>
</body>

</html>
