<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J/Karaveddy Manikkavasagar Vidyalayam</title>
    <link href="{{ asset('css\common.css') }}" rel="stylesheet">
    <link href="{{ asset('css\header\header.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="{{ asset('js\common.js') }}"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
@include('layouts.header')   
@section('content')
@show
@include('layouts.footer')
</body>
</html>