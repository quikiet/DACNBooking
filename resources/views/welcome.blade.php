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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans">
    <div class="text-black">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full">
                <div class="hero min-h-screen"
                    style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">

                    <div class="hero-overlay bg-opacity-60"></div>
                    <div class="hero-content text-neutral-content text-center">
                        <div class="max-w-md">
                            <header class="grid grid-cols-2 items-center gap-2 pb-10 lg:grid-cols-3">
                                <div class="flex lg:justify-center lg:col-start-2">
                                    <x-application-logo></x-application-logo>
                                </div>
                            </header>
                            <h1 class="mb-5 text-5xl font-semibold">Chào mừng bạn đã đến với <br> Khách sạn của chúng
                                tôi
                            </h1>
                            <p class="mb-5">
                                Chúng tôi mang đến sự tận tâm, chú trọng vào từng chi tiết nhỏ nhất và luôn sẵn sàng
                                vượt qua mong đợi của bạn.
                            </p>
                            <a class="btn btn-primary" href="{{route('home')}}">Bắt đầu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>