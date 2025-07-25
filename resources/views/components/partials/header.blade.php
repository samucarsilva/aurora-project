<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Aurora Platform </title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('icons/brand-logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>


    <header class="aurora-header">

            <nav class="aurora-navbar">

                    <div class="aurora-logo">

                        <a href="{{ route('home') }}"> 
                            <img src="{{ asset('icons/brand-logo.png') }}" alt="The Brand Logo"> 
                        </a>

                    </div>


                @if ($page != 'register' && 
                        $page != 'login')

                    <div class="aurora-menu">

                        <div class="menu-icon" id="menu-icon">
                            <span class="bi bi-list"> </span>
                        </div>

                        <ul class="navbar-menu" id="navbar-menu">

                            <li class="navbar-item">
                                <a href="{{ route('about') }}"> About </a>
                            </li>

                            <li class="navbar-item">
                                <a href="{{ route('home') }}"> Home </a>
                            </li>

                            <li class="navbar-item">
                                <a href="{{ route('courses') }}"> Courses </a>
                            </li>

                            <li class="navbar-item">
                                <a href="{{ route('login') }}"> Login </a>
                            </li>

                            <li class="navbar-item">
                                <a href="{{ route('register') }}"> Register </a>
                            </li>

                        </ul>

                    </div>
                
                @endif

            </nav>

    </header>
