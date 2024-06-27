@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="car12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Вы успешно зарегистрировались! Теперь вы можете перейти на главную страничку  ') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
