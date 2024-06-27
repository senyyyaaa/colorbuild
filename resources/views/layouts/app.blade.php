<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<header>
<nav class="nav_glav">
    <div class="glav_div">
        <div class="buttuns">
            <a href="{{ url('/') }}" class="text_head">
                Главная
            </a>
            <a href="{{ route('AllProduct') }}" class="text_head">
                {{ __('Весь товар') }}
            </a>
            <a href="{{ route('onas') }}" class="text_head">
                О нас
            </a>
        </div>


        <button class="button_head">
            <svg class="svg_head" viewBox="0 0 24 24">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <div class="hidden md:block">
            <ul class="ul_glav">
                @auth
                    @if(Auth::user()->is_admin == 1)
                        <li>
                            <a href="{{ route('admin') }}" class="text_head">
                                {{ __('Админ панель') }}
                            </a>
                        </li>
                    @endif
                        <a class="text_head" href="{{ route('basket.index') }}">Корзина</a>
                    <li class="rila">

                        <div class="rila">
                            <button id="profile-btn" class="button_glav">

                                <p class="text_head">{{ Auth::user()->name }}</p>

                                <svg class="svg_head" viewBox="0 0 24 24">
                                    <path d="M7 10l5 5 5-5z" />
                                </svg>
                            </button>
                            <ul id="profile-menu" class="ul_glav2">
                                <li>
                                    <form method="POST"  action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="podrob2">
                                                <span class="text">Выйти</span>
                                            </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <script>
                            const profileMenu = document.getElementById('profile-menu');

                            profileMenu.style.display = 'none'; // скрыть меню по умолчанию

                            const profileBtn = document.getElementById('profile-btn');

                            profileBtn.addEventListener('click', () => {
                                profileMenu.style.display = profileMenu.style.display === 'none' ? 'block' : 'none';
                            });

                        </script>
                    </li>
                @else
                    @if (Route::has('login'))
                        <li>
                            <a href="{{ route('login') }}" class="sumbit">
                                {{ __('Войти') }}
                            </a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="sumbit">
                                {{ __('Зарегистрироваться') }}
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>

</nav>
</header>
<main class="">
    @yield('content')
</main>
<footer class="footer">
    <div class="foot_text_div"><h5   class="foot_text_h">ColorBuild</h5> <p class="foot_text">© 2020 - 2024
            ИНН 000000000
            Код счетчиков</p></div>
    <div class="foot_text_div"><h5   class="foot_text_h">+7 (000) 000-00-00
            8 (000) 111-11-11</h5> <p class="foot_text">Пн-Вс: 8:00 - 20:00</p></div>
    <div class="foot_text_div"><h4   class="foot_text_h">Адрес</h4> <p class="foot_text">Ленинский проспект, дом, строение, номер кабинетав</p></div>
    <div class="foot_text_div"><h5   class="foot_text_h">Почта</h5> <p class="foot_text">her67673@gmail.com</p></div>
</footer>
</body>
</html>

