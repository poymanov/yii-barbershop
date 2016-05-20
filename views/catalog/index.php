<?php

/* @var $this yii\web\View */

$this->title = 'Каталог';

?>
<main class="container container-catalog clearfix">
    <h1 class="index-title">Средства для ухода</h1>
    <ul class="breadcrumbs">
        <li>
            <a href="/">Главная</a>
        </li>
        <li>
            <a href="#">Магазин</a>
        </li>
        <li>
            Средства для ухода
        </li>
    </ul>
    <div class="filter-container">
        <form class="filter-form" action="https://echo.htmlacademy.ru" method="post">
            <div class="brand-filter">
                <h2 class="filter-title">Производители:</h2>
                <input type="checkbox" name="brand-1" id="choice-1" checked>
                <label for="choice-1">Baxter of California</label>
                <input type="checkbox" name="brand-2" id="choice-2">
                <label for="choice-2">Mr Natty</label>
                <input type="checkbox" name="brand-3" id="choice-3" checked>
                <label for="choice-3">Suavecito</label>
                <input type="checkbox" name="brand-4" id="choice-4">
                <label for="choice-4">Malin+Goetz</label>
                <input type="checkbox" name="brand-5" id="choice-5">
                <label for="choice-5">Murray's</label>
                <input type="checkbox" name="brand-6" id="choice-6" checked>
                <label for="choice-6">American crew</label>
            </div>
            <div class="group-filter">
                <h2 class="filter-title">Группы товаров:</h2>
                <input type="radio" name="item-group" value="item-1" id="radio-1">
                <label for="radio-1">Бритвенные принадлежности</label>
                <input type="radio" name="item-group" value="item-2" id="radio-2" checked>
                <label for="radio-2">Средства для ухода</label>
                <input type="radio" name="item-group" value="item-3" id="radio-3">
                <label for="radio-3">Аксессуары</label>
            </div>
            <button class="btn" type="submit">Показать</button>
        </form>
    </div>
    <div class="item-container">
        <div class="item-block clearfix">
            <article class="item">
                <div class="item-photo">
                    <a href="/">
                        <img src="/img/item-1.jpg" width="220" height="165" alt="Набор для путешествий «Baxter of California»">
                    </a>
                </div>
                <div class="item-title">
                    <a href="/">Набор для путешествий<br>
                        <span>«Baxter of California»</span>
                    </a>
                </div>
                <div class="item-buy">
                    <div class="item-price">2 900 руб.</div>
                    <a class="btn" href="#">Купить</a>
                </div>
            </article>
            <article class="item">
                <div class="item-photo">
                    <a href="#">
                        <img src="/img/item-2.jpg" width="220" height="165" alt="Увлажняющий кондиционер «Baxter of California»">
                    </a>
                </div>
                <div class="item-title">
                    <a href="#">Увлажняющий кондиционер<br>
                        <span>«Baxter of California»</span>
                    </a>
                </div>
                <div class="item-buy">
                    <div class="item-price">750 руб.</div>
                    <a class="btn" href="#">Купить</a>
                </div>
            </article>
            <article class="item">
                <div class="item-photo">
                    <a href="#">
                        <img src="/img/item-3.jpg" width="220" height="165" alt="Гель для волос «Suavecito»">
                    </a>
                </div>
                <div class="item-title">
                    <a href="#">Гель для волос<br>
                        <span>«Suavecito»</span>
                    </a>
                </div>
                <div class="item-buy">
                    <div class="item-price">290 руб.</div>
                    <a class="btn" href="#">Купить</a>
                </div>
            </article>
            <article class="item">
                <div class="item-photo">
                    <a href="#">
                        <img src="/img/item-4.jpg" width="220" height="165" alt="Глина для укладки волос «American crew»<">
                    </a>
                </div>
                <div class="item-title">
                    <a href="#">Глина для укладки волос<br>
                        <span>«American crew»</span>
                    </a>
                </div>
                <div class="item-buy">
                    <div class="item-price">500 руб.</div>
                    <a class="btn" href="#">Купить</a>
                </div>
            </article>
            <article class="item">
                <div class="item-photo">
                    <a href="#">
                        <img src="/img/item-5.jpg" width="220" height="165" alt="Гель для волос «American crew»<">
                    </a>
                </div>
                <div class="item-title">
                    <a href="#">Гель для волос<br>
                        <span>«American crew»</span>
                    </a>
                </div>
                <div class="item-buy">
                    <div class="item-price">300 руб.</div>
                    <a class="btn" href="#">Купить</a>
                </div>
            </article>
            <article class="item">
                <div class="item-photo">
                    <a href="#">
                        <img src="/img/item-6.jpg" width="220" height="165" alt="Набор для бритья «Baxter of California»">
                    </a>
                </div>
                <div class="item-title">
                    <a href="#">Набор для бритья<br>
                        <span>«Baxter of California»</span>
                    </a>
                </div>
                <div class="item-buy">
                    <div class="item-price">3 900 руб.</div>
                    <a class="btn" href="#">Купить</a>
                </div>
            </article>
        </div>
        <ul class="pagination">
            <li>
                <a class="btn" href="/">1</a>
            </li>
            <li class="active">
                2
            </li>
            <li>
                <a class="btn" href="/">3</a>
            </li>
            <li>
                <a class="btn" href="/">4</a>
            </li>
        </ul>
    </div>
</main>