@extends('layouts.app')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
        <div class="card">
            <div class="best">
                <h2  class="best_text">Товар недели </h2>
                <div class="card-body">
                    @php
                        $products = DB::table('products')
                            ->where('is_best', 1)

                            ->get();
                    @endphp
                    @foreach($products as $product)
                        <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                            <img src="{{ $product->path_product }}" class="card_img" alt="картинка не найдена">
                            <p> {{ $product->name_product }}</p>
                            <p><b>Цена:</b>{{ $product->price_product }} руб.</p>
                            <a href="{{ route('product', ['id' => $product->id]) }}"><button  type="submit" class="podrob">
                                    <span class="text">Подробнее</span>
                                </button></a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="onas_text">
            <h2>О компании</h2>
            <div class="onas_text2"> <div class="gap_t"> <p class="txt_1onas">Наш магазин - это место, где можно найти все необходимые материалы для строительства и ремонта. Здесь представлены такие материалы, как строительные блоки, крепеж, инструменты, краски и лаки, а также многое другое. Качество продукции высокое, а цены доступные.</p>
            <p class="txt_1onas">Персонал магазина всегда готов предоставить консультацию и помочь в выборе нужных материалов. Посетите наш магазин стройматериалов и осуществите свои строительные планы с комфортом и уверенностью в качестве приобретенных материалов.</p>
        </div>
                <img class="img_onas" src="{{ asset('assets/img/promo/onas.webp') }}" alt="onas"></div>
                <p class="txt_2onas">Наш магазин постоянно расширяет ассортимент и предлагает своим клиентам самые новые и инновационные материалы для строительства. Мы работаем только с проверенными поставщиками и гарантируем высокое качество всех продуктов. У нас есть все необходимые сертификаты и лицензии, подтверждающие нашу компетентность.

                    В магазине действуют постоянные акции и скидки, которые помогут сэкономить деньги на строительстве. Мы также предлагаем удобные условия доставки и оплаты, чтобы наши клиенты могли получить нужные материалы в любое удобное для них время.

                    Магазин стройматериалов - это лучший выбор для всех, кто хочет сделать свой дом комфортным и стильным. Заходите к нам и убедитесь в этом сами!</p>
                <div class="svg_moment2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"><path d="M43.998 48h-9.995a1 1 0 1 0 0 2h9.995a1 1 0 1 0 0-2zM47 49a1 1 0 1 0 2 0 1 1 0 1 0-2 0zm9.01-1h-4.02a1 1 0 0 0 0 2h4.02a1 1 0 0 0 0-2zM30 48H8a1 1 0 1 0 0 2h22a1 1 0 1 0 0-2zm-18.993-1h11.986A1 1 0 0 0 24 46.005v-8.01A1.008 1.008 0 0 0 22.993 37H11.007a1 1 0 0 0-1.007.995v8.01a1.008 1.008 0 0 0 1.007.995zM12 45v-6h10v6zm14.007-8a1 1 0 0 0-1.007.995v8.01a1.008 1.008 0 0 0 1.007.995h11.986A1 1 0 0 0 39 46.005v-8.01A1.008 1.008 0 0 0 37.993 37zM37 39v6H27v-6zm3-1.005v8.01a1.008 1.008 0 0 0 1.007.995h11.986A1 1 0 0 0 54 46.005v-8.01A1.008 1.008 0 0 0 52.993 37H41.007a1 1 0 0 0-1.007.995zM42 39h10v6H42zm-23.993-3h11.986A1 1 0 0 0 31 35.005v-8.01A1.008 1.008 0 0 0 29.993 26H18.007a1 1 0 0 0-1.007.995v8.01a1.008 1.008 0 0 0 1.007.995zM19 34v-6h10v6zm13-7.005v8.01a1.008 1.008 0 0 0 1.007.995h11.986A1 1 0 0 0 46 35.005v-8.01A1.008 1.008 0 0 0 44.993 26H33.007a1 1 0 0 0-1.007.995zM34 28h10v6H34zm-7.993-3h11.986A1 1 0 0 0 39 24.005v-8.01A1.008 1.008 0 0 0 37.993 15H26.007a1 1 0 0 0-1.007.995v8.01a1.008 1.008 0 0 0 1.007.995zM27 23v-6h10v6z"></path></svg></svg>

                    <div class="slabo"><h4>Доставка в регионы</h4><p>Транспортными компаниями</p></div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"><path d="M53.06 24.626l-11.163-1.622a2.317 2.317 0 0 1-1.353-.983L35.55 11.905a2.857 2.857 0 0 0-5.354 0l-4.992 10.116a2.318 2.318 0 0 1-1.354.983l-11.163 1.622a2.857 2.857 0 0 0-1.654 5.093l8.077 7.873a2.317 2.317 0 0 1 .517 1.592L17.722 50.3a2.857 2.857 0 0 0 4.331 3.147l9.985-5.249a2.318 2.318 0 0 1 1.673 0l9.984 5.25a2.857 2.857 0 0 0 4.332-3.148l-.212-1.233-.008.001-.066-.418a1 1 0 0 0-1.976.313l.157.99a1.01 1.01 0 0 0 .048.187l.086.498c.186 1.087-.448 1.556-1.43 1.04l-9.984-5.25a4.239 4.239 0 0 0-3.535 0l-9.984 5.25c-.976.512-1.618.054-1.43-1.04L21.6 39.522a4.239 4.239 0 0 0-1.093-3.362l-8.077-7.874c-.79-.77-.552-1.52.546-1.68l11.163-1.623a4.239 4.239 0 0 0 2.86-2.077L31.99 12.79c.488-.99 1.276-.995 1.767 0l4.992 10.115a4.238 4.238 0 0 0 2.86 2.077l11.163 1.622c1.09.159 1.34.907.546 1.681L45.24 36.16a4.26 4.26 0 0 0-1.104 3.284l.003.014.157.99a1 1 0 0 0 1.975-.313l-.157-.99-.002-.015a2.356 2.356 0 0 1 .524-1.538l8.078-7.874a2.857 2.857 0 0 0-1.655-5.092zM45.037 44.51a1 1 0 1 0 2 0 1 1 0 1 0-2 0zM28.125 32.874a1 1 0 0 0-1.948-.396l-.01-.003a6.993 6.993 0 1 0 4.643-5.126 1 1 0 0 0-.132.045l-.108.04.006.01a1.001 1.001 0 0 0 .932 1.771l.005.01a4.995 4.995 0 1 1-3.43 3.863 1.01 1.01 0 0 0 .042-.214z"></path></svg>  </svg>

                    <div class="slabo"><h4>Большой выбор позиций</h4><p>Более 1000 позиций</p></div>

                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"><path d="M8 25a1 1 0 1 0 2 0 1 1 0 1 0-2 0zm46.362 8.733l-2.591-.864a1.77 1.77 0 0 1-.817-.701l-3.1-6.227a2.766 2.766 0 0 0-2.336-1.441H40V18a2.998 2.998 0 0 0-2.997-3H10.996A2.994 2.994 0 0 0 8 18v3.001a1 1 0 0 0 2 0v-3A.995.995 0 0 1 10.997 17h26.007A.998.998 0 0 1 38 18v17.001a1 1 0 0 0 2 0V26.5h5.518a.82.82 0 0 1 .545.332l3.1 6.227a3.717 3.717 0 0 0 1.975 1.708l2.591.864A.51.51 0 0 1 54 36v5H40v-2.001a1 1 0 0 0-2 0V41H10V28.999a1 1 0 0 0-2 0V43h46v5.01a.997.997 0 0 1-1.002.99H51.9a5 5 0 0 0-9.798 0H21.899a5 5 0 0 0-9.798 0H9a1 1 0 0 0 0 2h3.1a5 5 0 0 0 9.8 0h20.2a5 5 0 0 0 9.8 0h1.098A2.997 2.997 0 0 0 56 48.01V36a2.48 2.48 0 0 0-1.638-2.268zM17 53a2.994 2.994 0 0 1-2.898-2.263c-.015-.058-.034-.114-.045-.173a2.824 2.824 0 0 1 0-1.128c.011-.059.03-.115.045-.173a2.987 2.987 0 0 1 5.796 0c.015.058.034.114.045.173a2.824 2.824 0 0 1 0 1.128c-.011.059-.03.115-.045.173A2.994 2.994 0 0 1 17 53zm30 0a2.994 2.994 0 0 1-2.898-2.263c-.015-.058-.034-.114-.045-.173a2.824 2.824 0 0 1 0-1.128c.011-.059.03-.115.045-.173a2.987 2.987 0 0 1 5.796 0c.015.058.034.114.045.173a2.824 2.824 0 0 1 0 1.128c-.011.059-.03.115-.045.173A2.994 2.994 0 0 1 47 53z"></path></svg>
                    <div class="slabo"><h4>Скидки и акции</h4><p>Покупайте отличный товар по низкой цене</p></div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"><title>reload</title><circle cx="54.03" cy="31.129" r="1"></circle><path d="M53.799 34.383a1 1 0 0 0-.99.855l-.006-.001a21.001 21.001 0 0 1-38.308 8.318l3.42.917a1 1 0 0 0 .517-1.932l-5.8-1.554a.994.994 0 0 0-.754.1.981.981 0 0 0-.468.605l-1.554 5.8a1 1 0 0 0 1.931.518l.94-3.504a23.001 23.001 0 0 0 42.036-8.857 1 1 0 0 0-.964-1.265zM10.501 33.785a1 1 0 0 0 .496-.96h.007a21.003 21.003 0 0 1 38.543-12.339l-3.42-.916a1 1 0 0 0-.518 1.932l5.801 1.554a.994.994 0 0 0 .754-.1.981.981 0 0 0 .467-.605l1.555-5.801a1 1 0 0 0-1.932-.518l-.94 3.505a23.004 23.004 0 0 0-42.31 13.318 1 1 0 0 0 1.497.93z"></path></svg>
                    <div class="slabo"><h4>Гарантии и возврат</h4><p>Не понравился товар? Мы вернем деньги</p></div>
                </div>
            </div>

           </div>
@endsection
