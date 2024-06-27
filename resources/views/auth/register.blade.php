@extends('layouts.app')

@section('content')
    <div class="card">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>{{ __('Регистрация') }}</div>
            <div class="card-body">

                    <label for="login">{{ __('Логин') }}</label>
                    <input id="login" type="text" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>
                    @error('login')
                    <span>{{ $message }}</span>
                    @enderror



                    <label for="name">{{ __('Имя') }}</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span>{{ $message }}</span>
                    @enderror


                    <label for="email">{{ __('Почта') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span>{{ $message }}</span>
                    @enderror



                    <label for="password">{{ __('Пароль') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                    <span>{{ $message }}</span>
                    @enderror



                    <label for="password-confirm">{{ __('Подтверждение пароля') }}</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">


                <div>

                    <button  type="submit" class="podrob">
                           <span> {{ __('Зарегистрироваться') }}</span>
                        </button>
                </div>
            </div>
        </form>
    </div>
@endsection
