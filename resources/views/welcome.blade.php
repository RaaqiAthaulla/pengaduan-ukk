<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        section {
            position: relative;
            width: 100%;
            min-height: 100vh;
            padding: 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
        }

        header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo {
            position: relative;
            max-width: 80px;
        }

        header ul {
            position: relative;
            display: flex;
        }

        a {
            display: inline-block;
            color: #333;
            font-weight: 400;
            margin-left: 40px;
            text-decoration: none;
        }

        .content {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content .textbox {
            position: relative;
            max-width: 600px;
        }

        .content .textbox h2 {
            color: #333;
            font-size: 1.8em;
            line-height: 1.4em;
            font-weight: 500;
        }

        .content .textbox h2 span {
            color: #44749d;
            font-size: 1.9em;
            font-weight: 900;
        }

        .circle {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #c6d4e1;
            clip-path: circle(600px at right 500px)
        }

        /* .component {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #017143;
            clip-path: circle(300px at 100px)
        } */
    </style>
</head>

<body class="antialiased">

    <section>
        <div class="component"></div>
        <div class="circle"></div>
        <header>

            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <ul>
                            <button
                                class="text-black font-normal rounded-md py-3 border-black px-4 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                <a href="{{ url('login') }}">Masuk</a>
                            </button>
                            <button
                                class="text-blue-500 font-medium rounded-md py-3 px-4 border-2 border-white focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                <a href="{{ url('register') }}">Daftar</a>
                            </button>
                            <a href="{{ url('/dashboard') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        </ul>
                    @endauth
                </div>
            @endif
        </header>
        <div class="content">
            <div class="textbox">
                <h2><span>CORES</span><br>Berikan Tanggapan anda<br></h2>
                <p>Website pengaduan masyarakat ini digunakan untuk menyampaikan pengaduan yang ingin masyarakat
                    sampaikan.</p>
            </div>
            <div class="col-sm-10 position-relative ">
                <div class="position-absolute">
                    <img src="{{ asset('assets/img/right-image.png') }}" class="img">
                </div>
            </div>
    </section>
    </div>
</body>

</html>
