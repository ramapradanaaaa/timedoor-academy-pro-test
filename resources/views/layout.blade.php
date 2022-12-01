<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel</title>
  
  <style>
    table.data, table.data th, table.data td {
      border: 1px solid;
    }

    table.data {
      width: 100%;
    }
  </style>
</head>
<body>
  <header>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('author') }}">Authors</a>
    <a href="{{ route('rating.index') }}">Rating</a>
    <hr>
  </header>


  @yield('body')
</body>
</html>