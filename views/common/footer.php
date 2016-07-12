<?php if(isset($this->params['IsMain'])) {?>
<footer class="main-footer">
<?php } else {?>
<footer class="main-footer catalog-footer">
<?php }?>
    <div class="container clearfix">
        <section class="footer-contacts">
            Барбершоп «Бородинский»<br>
            Адрес: г. Санкт-Петербург, Б. Конюшенная, д. 19/8<br>
            <a href="#">Как нас найти?</a><br>
            Телефон: +7 (812) 666-02-66
        </section>
        <section class="footer-social">
            <p>Давайте дружить!</p>
            <a class="social-btn social-btn-vk" href="#">Вконтакте</a>
            <a class="social-btn social-btn-fb" href="#">Фейсбук</a>
            <a class="social-btn social-btn-inst" href="#">Инстаграм</a>
        </section>
        <section class="footer-copyright">
            <p>Разработано:</p>
            <a class="btn" href="https://htmlacademy.ru">HTML Academy</a>
        </section>
    </div>
</footer>

<?=$this->render('userModalForm');?>
<?=$this->render('userModalSignup');?>
<?=$this->render('userModalSuccessReg');?>

<div class="modal-map">
    <button class="modal-close" type="button" title="Закрыть"></button>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1998.6060683380301!2d30.323265688510688!3d59.938678633356446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696310fca5ba729%3A0xea9c53d4493c879f!2z0JHQvtC70YzRiNCw0Y8g0JrQvtC90Y7RiNC10L3QvdCw0Y8g0YPQuy4sIDE5LCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywg0KDQvtGB0YHQuNGPLCAxOTExODY!5e0!3m2!1sru!2s!4v1455745492252" width="766" height="561" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>