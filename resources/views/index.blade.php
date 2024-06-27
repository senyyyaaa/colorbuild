@extends('layouts.app')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <div class="infa">
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

        <div class="slider_best">
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
        </div>

        <div class="slider">

            <!-- Первый слайд -->
            <div class="item">
                <img class="img_slider" src="{{ asset('assets/img/promo/promo1.jpg') }}" alt="Promo Image">
                <div class="skidka_text">-10%</div>
                <div class="skidka_text2">Внимание, снижаемся!</div>
                <div class="skidka_text3">Снижение цен + антикризисный тариф </div>
                <div class="skidka_text4"> <a href="{{ route('AllProduct') }}"><button  type="submit" class="podrob">
                            <span class="text">Купить</span>
                        </button></a></div>
            </div>

            <div class="item">
                <img class="img_slider" src="{{ asset('assets/img/promo/promo4.jpg') }}" alt="Promo Image">
                <div class="skidka_text">Антикризисное предложение</div>
                <div class="skidka_text2">Скидки до 5%</div>
                <div class="skidka_text3">На все краски для внутренних работ</div>
                <div class="skidka_text4"> <a href="{{ route('AllProduct') }}"><button  type="submit" class="podrob">
                            <span class="text">К покупкам</span>
                        </button></a></div>
            </div>

            <div class="item">

                <img class="img_slider" src="{{ asset('assets/img/promo/promo3.jpg') }}" alt="Promo Image">
                <div class="skidka_text">-3%</div>
                <div class="skidka_text2">Удивительная экономия</div>
                <div class="skidka_text3">Возьми набор инструментов с выгодой!</div>
                <div class="skidka_text4"> <a href="{{ route('AllProduct') }}"><button  type="submit" class="podrob">
                            <span class="text">Подробнее</span>
                        </button></a></div>

            </div>

            <!-- Кнопки-стрелочки -->
            <a class="previous" onclick="previousSlide()">&#10094;</a>
            <a class="next" onclick="nextSlide()">&#10095;</a>
        </div>
        </div>
      <script>/* Устанавливаем стартовый индекс слайда по умолчанию: */
          let slideIndex = 1;
          /* Вызываем функцию, которая реализована ниже: */
          showSlides(slideIndex);

          /* Увеличиваем индекс на 1 — показываем следующий слайд: */
          function nextSlide() {
              showSlides(slideIndex += 1);
          }

          /* Уменьшаем индекс на 1 — показываем предыдущий слайд: */
          function previousSlide() {
              showSlides(slideIndex -= 1);
          }

          /* Устанавливаем текущий слайд: */
          function currentSlide(n) {
              showSlides(slideIndex = n);
          }

          /* Функция перелистывания: */
          function showSlides(n) {
              /* Обращаемся к элементам с названием класса "item", то есть к картинкам: */
              let slides = document.getElementsByClassName("item");

              /* Проверяем количество слайдов: */
              if (n > slides.length) {
                  slideIndex = 1
              }
              if (n < 1) {
                  slideIndex = slides.length
              }

              /* Проходим по каждому слайду в цикле for: */
              for (let slide of slides) {
                  slide.style.display = "none";
              }
              /* Делаем элемент блочным: */
              slides[slideIndex - 1].style.display = "block";
          }

          /* Автоматическое переключение слайдов каждые 5 секунд: */
          setInterval(nextSlide, 5000);
      </script>


        <div class="svg_moment">
            <svg width="42" height="41" viewBox="0 0 42 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 24V2.24324C9 1.55946 9.58605 1 10.3023 1H35.6977C36.414 1 37 1.55946 37 2.24324V20.8919" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M18 1V5H28V1" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round"></path>
                <path d="M29 18H33" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M27.4413 26.5969L36.6428 21.3953C38.0115 20.5847 39.8365 21.0576 40.6186 22.4762C41.4007 23.8948 40.9444 25.7863 39.5758 26.5969L27.4413 34.4668C26.8547 34.8045 25.7585 34.9734 25.0416 34.9734H15.4608C14.7438 34.9734 13.8965 35.0748 13.3099 35.4801L11.75 36.5M17.5464 27.8804H25.0416C26.671 27.8804 27.9745 26.5293 27.9745 24.8405C27.9745 23.1517 26.671 22 25.0416 22H14.4179C13.701 22 12.9841 22.2027 12.3975 22.608L5.5 27" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M1 27.9091L4.23529 26L12 38.0909L8.76471 40" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round"></path>
            </svg>

            <div class="slabo"><h4>Доставка в регионы</h4><p>Транспортными компаниями</p></div>
            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 41V34H41V41" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="round"></path>
                <path d="M7 41V38H18V41" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="round"></path>
                <path d="M24 41V38H35V41" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="round"></path>
                <path d="M4.87097 38H6.80646" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="round"></path>
                <path d="M21.6451 38H23.5806" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="round"></path>
                <path d="M39 38H41" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="round"></path>
                <path d="M38 33V17H21V33" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="round"></path>
                <path d="M32 17V20H27V17" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M33.5 29H31" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="round"></path>
                <path d="M24 17V1H7V13" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="round"></path>
                <path d="M18 1V4H13V1" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M19.5 13H17" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="round"></path>
                <path d="M21 33V17H4V29.5" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="round"></path>
                <path d="M15 17V20H10V17" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M16.5 29H14" stroke="#464646" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="round"></path>
            </svg>

            <div class="slabo"><h4>Большой выбор позиций</h4><p>Более 1000 позиций</p></div>

        <svg width="36" height="42" viewBox="0 0 36 42" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14.3556 2.96154L15.7037 1H27.2968L35.0002 12.1154L35.0002 38.3846C35.0002 39.8231 33.8447 41 32.4324 41H10.5681C9.15578 41 8.00026 39.8231 8.00026 38.3846L8.00024 12.1154L10.6965 8.19231" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M21.0002 11C22.381 11 23.5002 9.88071 23.5002 8.5C23.5002 7.11929 22.381 6 21.0002 6C19.6195 6 18.5002 7.11929 18.5002 8.5C18.5002 9.88071 19.6195 11 21.0002 11Z" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round"></path>
            <path d="M4.52122 13.1306C2.16738 12.2806 1 11 1 9.24983C1 6.69983 4.5 4.5 10.0789 4.82674C15.3007 5.13256 17.5 7.00001 18.5981 9.24983" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M25.1926 18.6539L17.3464 31.0769" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M16.6925 23.8846C18.137 23.8846 19.3079 22.7137 19.3079 21.2693C19.3079 19.8248 18.137 18.6539 16.6925 18.6539C15.2481 18.6539 14.0771 19.8248 14.0771 21.2693C14.0771 22.7137 15.2481 23.8846 16.6925 23.8846Z" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M25.8463 31.0769C27.2908 31.0769 28.4617 29.906 28.4617 28.4615C28.4617 27.0171 27.2908 25.8461 25.8463 25.8461C24.4019 25.8461 23.231 27.0171 23.231 28.4615C23.231 29.906 24.4019 31.0769 25.8463 31.0769Z" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
            <div class="slabo"><h4>Скидки и акции</h4><p>Покупайте отличный товар по низкой цене</p></div>
            <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.7742 1L15 7.5V13.6613L18 12.75L21.0001 13.6613L24 12.75L27 13.6613V7.5L24.2259 1" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M16.1613 19.4677L11 23.9839L16.1613 28.5" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M11.6613 24H25.8885C28.4976 24 30.6613 26.04 30.6613 28.5C30.6613 30.96 28.4976 33 25.8885 33" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M40.5 8.60742L33.0161 1H8.5L1.5 8.60742M39.0645 41H2.93548C1.83871 41 1 40.1722 1 39.0897V9.91028C1 8.82779 1.83871 8 2.93548 8H39.0645C40.1613 8 41 8.82779 41 9.91028V39.0897C41 40.1722 40.1613 41 39.0645 41Z" stroke="#101010" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <div class="slabo"><h4>Гарантии и возврат</h4><p>Не понравился товар? Мы вернем деньги</p></div>
        </div>
                </div>

    <script>
        const podrob = document.querySelector('.podrob');

        podrob.addEventListener('mouseover', () => {
            podrob.classList.add('hover');
        });

        podrob.addEventListener('mouseout', () => {
            podrob.classList.remove('hover');
        });
    </script>


@endsection
