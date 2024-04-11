<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input placeholder="okkk">
    @foreach($data as $d)
        {{ $d->nama }}
        {{ $d->nim }}
    @endforeach
</body>
</html>