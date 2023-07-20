<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto</title>
    <link rel="stylesheet" href="https://kit.fontawesome.com/542a40af0e.css" crossorigin="anonymous">
    @livewireStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
    
</head>
<body>
    
    <x-navbar />



    <div class="container-fluid min-vh-100 p-0 m-0 background-main">
        {{$slot}}
    </div>




    <x-footer />

    @livewireScripts
</body>
</html>