@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="infa2">
        <div>
            <h1>ColorBuild</h1>
            <p>Магазин лакокрасочных материалов</p>
        </div>
        <div>
            <p>
                г. Ижевск
            </p>
            <h1>+7 (000) 000-00-00
            </h1>
            <p>Пн-Вс: 8:00 - 20:00</p>
        </div>
    </div>
    <div class="filter_search">
        <div class="filter_glav">
            <div class="filter_text"><h3 class="filter_text2">Фильтр</h3></div>
        <form method="get" class="filter" action="{{route ('filterByPrice')}}">
            <input type="number" class="ot-do" id="min_price" name="min_price" placeholder="от">
            <input type="number" class="ot-do" id="max_price" name="max_price" placeholder="до">
            <button type="submit" class="podrob">
                <span class="text">Фильтровать </span></button>
        </form>
        </div>
        <div class="search">
    <form method="get" class="search_glav"  action="{{route ('search')}}">
        <input type="text" class="search_txt" id="s" name="s" placeholder="Поиск...">
        <div>
        <button type="submit" class="podrob">
            <span class="text">Поиск </span></button>
        <button type="submit" class="podrob2">
            <span class="text">Очистить </span></button>
        </div>
    </form>
    </div>

    </div>

    <div class="product-grid">
        @foreach($products as $product)
            <div class="product-item">
                <img src="{{ $product->path_product }}" class="card_img" alt="картинка не найдена">
                <p> {{ $product->name_product }}</p>

                <p><b>Цена:</b>{{ $product->price_product }} руб.</p>

                <a href="{{ route('product', ['id' => $product->id  ]) }}"><button type="submit" class="podrob">
                        <span class="text">Подробнее</span>
                    </button></a>
            </div>
        @endforeach

    </div>
    </div>
    <div class="best1">
        <h2 class="best_text">Товар недели </h2>

        @php
            $products = DB::table('products')
                ->where('is_best', 1)
                ->get();
        @endphp
        @foreach($products as $product)
            <div class="product-item">
                <img src="{{ $product->path_product }}" class="card_img" alt="картинка не найдена">
                <p> {{ $product->name_product }}</p>
                <p><b>Цена:</b>{{ $product->price_product }} руб.</p>
                <a href="{{ route('product', ['id' => $product->id]) }}"><button  type="submit" class="podrob">
                        <span class="text">Подробнее</span>
                    </button></a>
            </div>
    </div>

    @endforeach

@endsection
