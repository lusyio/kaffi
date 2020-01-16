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
<style>
    * {
        box-sizing: border-box;
    }


    /* ---- button ---- */

    .button {
        display: inline-block;
        padding: 0.5em 1.0em;
        background: #EEE;
        border: none;
        border-radius: 7px;
        background-image: linear-gradient(to bottom, hsla(0, 0%, 0%, 0), hsla(0, 0%, 0%, 0.2));
        color: #222;
        font-family: sans-serif;
        font-size: 16px;
        text-shadow: 0 1px white;
        cursor: pointer;
    }

    .button:hover {
        background-color: #8CF;
        text-shadow: 0 1px hsla(0, 0%, 100%, 0.5);
        color: #222;
    }

    .button:active,
    .button.is-checked {
        background-color: #28F;
    }

    .button.is-checked {
        color: white;
        text-shadow: 0 -1px hsla(0, 0%, 0%, 0.8);
    }

    .button:active {
        box-shadow: inset 0 1px 10px hsla(0, 0%, 0%, 0.8);
    }

    /* ---- button-group ---- */

    .button-group:after {
        content: '';
        display: block;
        clear: both;
    }

    .button-group .button {
        float: left;
        border-radius: 0;
        margin-left: 0;
        margin-right: 1px;
    }

    .button-group .button:first-child {
        border-radius: 0.5em 0 0 0.5em;
    }

    .button-group .button:last-child {
        border-radius: 0 0.5em 0.5em 0;
    }

    /* ---- isotope ---- */


    /* clear fix */
    .grid:after {
        content: '';
        display: block;
        clear: both;
    }

    /* ui group */

    .ui-group {
        display: inline-block;
    }

    .ui-group h3 {
        display: inline-block;
        margin-right: 0.2em;
        font-size: 16px;
    }

    .ui-group .button-group {
        display: inline-block;
        margin-right: 20px;
    }

    /* color-shape */

    .color-shape {
        width: 70px;
        height: 70px;
        margin: 5px;
        float: left;
    }

    .color-shape.round {
        border-radius: 35px;
    }

    .color-shape.big.round {
        border-radius: 75px;
    }

    .color-shape.red {
        background: red;
    }

    .color-shape.blue {
        background: blue;
    }

    .color-shape.yellow {
        background: yellow;
    }

    .color-shape.wide, .color-shape.big {
        width: 150px;
    }

    .color-shape.tall, .color-shape.big {
        height: 150px;
    }
</style>
<script>
    window.console = window.console || function (t) {
    };
</script>
<script>
    if (document.location.search.match(/type=embed/gi)) {
        window.parent.postMessage("resize", "*");
    }
</script>
</head>
<div style="display: none">
    <section id="options" class="clearfix">


        <ul id="filters" class="filters option-set floated clearfix  animated fadeIn">
            <li><a href="#type-product" id="all" data-filter=".type-product" class="selected" title="Все украшения">Все
                    украшения</a></li>
            <li><a href="#product_cat-swarovski" id="product_cat-swarovski" data-filter=".product_cat-swarovski"
                   title="Каффы Swarovski">Swarovski</a></li>
            <li><a href="#product_cat-bez-prokola" id="product_cat-bez-prokola" data-filter=".product_cat-bez-prokola"
                   title="Каффы Без прокола">Без прокола</a></li>
            <li><a href="#product_cat-biznes-ledi" id="product_cat-biznes-ledi" data-filter=".product_cat-biznes-ledi"
                   title="Каффы Бизнес леди">Бизнес леди</a></li>
            <li><a href="#product_cat-gold" id="product_cat-gold" data-filter=".product_cat-gold" title="Каффы Золото">Золото</a>
            </li>
            <li><a href="#product_cat-lyubish-comic-con" id="product_cat-lyubish-comic-con"
                   data-filter=".product_cat-lyubish-comic-con" title="Каффы Любишь comic con?">Любишь comic con?</a>
            </li>
            <li><a href="#product_cat-malenkoy-printsesse" id="product_cat-malenkoy-printsesse"
                   data-filter=".product_cat-malenkoy-printsesse" title="Каффы Маленькой принцессе">Маленькой
                    принцессе</a></li>
            <li><a href="#product_cat-copper" id="product_cat-copper" data-filter=".product_cat-copper"
                   title="Каффы Медь">Медь</a></li>
            <li><a href="#product_cat-na-korporativ" id="product_cat-na-korporativ"
                   data-filter=".product_cat-na-korporativ" title="Каффы На корпоратив">На корпоратив</a></li>
            <li><a href="#product_cat-silverplated" id="product_cat-silverplated"
                   data-filter=".product_cat-silverplated" title="Каффы Посеребрение">Посеребрение</a></li>
            <li><a href="#product_cat-s-prokolom" id="product_cat-s-prokolom" data-filter=".product_cat-s-prokolom"
                   title="Каффы С проколом">С проколом</a></li>
            <li><a href="#product_cat-silver" id="product_cat-silver" data-filter=".product_cat-silver"
                   title="Каффы Серебро">Серебро</a></li>
            <li><a href="#product_cat-smeloy-devushke" id="product_cat-smeloy-devushke"
                   data-filter=".product_cat-smeloy-devushke" title="Каффы Смелой девушке">Смелой девушке</a></li>
            <li><a href="#product_cat-tvoy-pervyiy-kaff" id="product_cat-tvoy-pervyiy-kaff"
                   data-filter=".product_cat-tvoy-pervyiy-kaff" title="Каффы Твой первый кафф">Твой первый кафф</a></li>
            <li><a href="#product_cat-universalnyi-dlya-podarka" id="product_cat-universalnyi-dlya-podarka"
                   data-filter=".product_cat-universalnyi-dlya-podarka" title="Каффы Универсальны для подарка">Универсальны
                    для подарка</a></li>
            <li><a href="#product_cat-uniseks" id="product_cat-uniseks" data-filter=".product_cat-uniseks"
                   title="Каффы Унисекс">Унисекс</a></li>
            <li><a href="#product_cat-eksklyuziv" id="product_cat-eksklyuziv" data-filter=".product_cat-eksklyuziv"
                   title="Каффы Эксклюзив">Эксклюзив</a></li>
            <li><a href="#product_cat-etno" id="product_cat-etno" data-filter=".product_cat-etno" title="Каффы Этно">Этно</a>
            </li>
            <a href="#product_cat-etno" id="product_cat-etno" data-filter=".product_cat-etno" title="Каффы Этно">

            </a></ul>
        <a href="#product_cat-etno" id="product_cat-etno" data-filter=".product_cat-etno" title="Каффы Этно">

        </a>
        <ul style="display: none" class="filters"><a href="#product_cat-etno" id="product_cat-etno"
                                                     data-filter=".product_cat-etno" title="Каффы Этно">
            </a>
            <li><a href="#product_cat-etno" id="product_cat-etno" data-filter=".product_cat-etno"
                   title="Каффы Этно"></a><a href="#price1000" id="price1000" data-filter=".price1000"
                                             title="Все украшения">До 1000 рублей</a></li>
        </ul>


    </section>

    <body translate="no">
    <h1>Isotope - combination filters</h1>
    <div class="filters">
        <div class="ui-group">
            <h3>Color</h3>
            <div class="button-group js-radio-button-group" data-filter-group="color">
                <button class="button is-checked" data-filter="">any</button>
                <button class="button" data-filter=".red">red</button>
                <button class="button" data-filter=".blue">blue</button>
                <button class="button" data-filter=".yellow">yellow</button>
            </div>
        </div>
        <div class="ui-group">
            <h3>Size</h3>
            <div class="button-group js-radio-button-group" data-filter-group="size">
                <button class="button is-checked" data-filter="">any</button>
                <button class="button" data-filter=".small">small</button>
                <button class="button" data-filter=".wide">wide</button>
                <button class="button" data-filter=".big">big</button>
                <button class="button" data-filter=".tall">tall</button>
            </div>
        </div>
    </div>
    <div class="grid">
        <div class="color-shape small round red"></div>
        <div class="color-shape small round blue"></div>
        <div class="color-shape small round yellow"></div>
        <div class="color-shape small square red"></div>
        <div class="color-shape small square blue"></div>
        <div class="color-shape small square yellow"></div>
        <div class="color-shape wide round red"></div>
        <div class="color-shape wide round blue"></div>
        <div class="color-shape wide round yellow"></div>
        <div class="color-shape wide square red"></div>
        <div class="color-shape wide square blue"></div>
        <div class="color-shape wide square yellow"></div>
        <div class="color-shape big round red"></div>
        <div class="color-shape big round blue"></div>
        <div class="color-shape big round yellow"></div>
        <div class="color-shape big square red"></div>
        <div class="color-shape big square blue"></div>
        <div class="color-shape big square yellow"></div>
        <div class="color-shape tall round red"></div>
        <div class="color-shape tall round blue"></div>
        <div class="color-shape tall round yellow"></div>
        <div class="color-shape tall square red"></div>
        <div class="color-shape tall square blue"></div>
        <div class="color-shape tall square yellow"></div>
    </div>
</div>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='//npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js'></script>
<script id="rendered-js">
    // external js: isotope.pkgd.js

    // init Isotope
    var $grid = $('.grid').isotope({
        itemSelector: '.color-shape'
    });


    // store filter for each group
    var filters = {};

    $('.filters').on('click', '.button', function (event) {
        var $button = $(event.currentTarget);
        // get group key
        var $buttonGroup = $button.parents('.button-group');
        var filterGroup = $buttonGroup.attr('data-filter-group');
        // set filter for group
        filters[filterGroup] = $button.attr('data-filter');
        // combine filters
        var filterValue = concatValues(filters);
        // set filter for Isotope
        $grid.isotope({filter: filterValue});
    });

    // change is-checked class on buttons
    $('.button-group').each(function (i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', 'button', function (event) {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            var $button = $(event.currentTarget);
            $button.addClass('is-checked');
        });
    });

    // flatten object by concatting values
    function concatValues(obj) {
        var value = '';
        for (var prop in obj) {
            value += obj[prop];
        }
        return value;
    }

    //# sourceURL=pen.js
</script>
<link rel="stylesheet" href="/isotope/css/style2.css" type="text/css" media="screen"/>
<?php get_footer(); ?>
