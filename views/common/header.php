<header class="main-header">
    <div class="container clearfix">
        <?php if(!isset($this->params['IsMain'])) {?>
            <div class="icon-logo">
                <a href="/">
                    <img src="/img/icon-logo.png" width="111" height="24" alt="Barbershop">
                </a>
            </div>
        <?php } ?>
        <nav class="main-navigation">
            <ul>
                <li>
                    <a href="#">Информация</a>
                </li>
                <li>
                    <a href="#">Новости</a>
                </li>
                <li>
                    <a href="">Прайс-лист</a>
                </li>
                <li>
                    <a href="">Магазин</a>
                </li>
                <li>
                    <a href="#">Контакты</a>
                </li>
            </ul>
        </nav>
        <div class="user-block">
            <a class="login" href="#">Вход</a>
        </div>
    </div>
</header>