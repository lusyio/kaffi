<?php
/**
 * Template Name: zakaz
 *
 * @package techone
 */

get_header(); ?>

<div class="col-12">
    <hr>
    <header class="entry-header page-header">
        <h1 class="entry-title">Изделия на заказ</h1>
    </header>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">

            <div class="entry-content">
                <p>Вы можете заказать эксклюзивное изделие, которое будет сделано специально для Вас или по Вашему
                    эскизу.</p>

                <p>Стоимость от 8000 руб. Итоговая цена рассчитывается в зависимости от сложности, веса и используемых
                    материалов.</p>
            </div>
            <form action="/reg.php" method="post" class="form-horizontal">
                <fieldset>
                    <div class="form-group row">
                        <label for="inputName" class="col-lg-2 control-label">Имя</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" placeholder="Ваше имя" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPhone" class="col-lg-2 control-label">Телефон</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="phone" placeholder="Контактный телефон"
                                   required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-lg-2 control-label">E-mail</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="mail" placeholder="E-mail" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="textArea" class="col-lg-2 control-label">Сообщение</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="7" name="message" id="textArea"
                                      placeholder="Каков Ваш вопрос?"></textarea>
                            <span class="help-block">Опишите изделие, которое Вы хотели бы изготовить</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-10 offset-lg-2">
                            <button type="submit" class="button-more">Отправить запрос мастеру</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php get_footer(); ?>
