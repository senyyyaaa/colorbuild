@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ваша корзина</h1>

        @if (count($products) > 0)
            @php
                $basketCost = 0;
            @endphp

            <div class="product-grid2">
                @foreach($products as $product)
                    @php
                        $itemName = $product->name_product;
                        $itemPrice = $product->price_product;
                        $itemQuantity = $product->pivot->quantity;
                        $itemCost = $itemPrice * $itemQuantity;
                        $basketCost += $itemCost;
                    @endphp
                    <div class="product-item">
                        <img src="{{ asset($product->path_product) }}" class="d-block w-100" alt="картинка не найдена">
                        <p><b>Название:</b> {{ $itemName }}</p>
                        <p><b>Цена:</b> {{ $itemPrice }} руб.</p>
                        <p><b>Модель:</b> {{ $product->model_product }}</p>
                        <p><b>Количество:</b> {{ $itemQuantity }}</p>
                        <form action="{{ route('basket.plus', ['id' => $product->id]) }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                больше
                            </button>
                        </form>
                        <span class="mx-1">{{ $itemQuantity }}</span>
                        <form action="{{ route('basket.minus', ['id' => $product->id]) }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                меньше
                            </button>
                        </form>

                    </div>
                @endforeach
            </div>

            <p>Итого: {{ number_format($basketCost, 2, '.', '') }} руб.</p>
        @else
            <p>Ваша корзина пуста</p>
        @endif
    </div>
@endsection
