@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row1">
                <div class="card">

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <img src="{{ asset($product->path_product) }}"  class="card_img2" alt="картинка не найдена">
                            <p><b>Название:</b> {{ $product->name_product }}</p>
                            <p><b>Цена:</b> {{ number_format($product->price_product, 2) }} руб.</p>
                            <p><b>Производитель:</b> {{ $product->country_product }}</p>
                            <p><b>Год производства:</b> {{ $product->year_product }}</p>
                            <p><b>Модель:</b> {{ $product->model_product }}</p>
                            <p><b>Количество на складе:</b> {{ $product->count_product }}</p>
                        </div>
                    </div>

                </div>


            <div class="col">
     
                <!-- Форма для добавления товара в корзину -->
                <form action="{{ route('basket.add', ['id' => $product->id  ]) }}"
                      method="post" >
                    @csrf
                    <label for="input-quantity">Количество</label>
                    <input type="text" name="quantity" id="input-quantity" value="1"
                           class="form-control ">
                    <button type="submit" class="podrob"><span>Добавить в корзину</span></button>
                </form>
            </div>
        </div>

@endsection
