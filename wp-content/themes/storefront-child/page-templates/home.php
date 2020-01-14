<?php
/**
 * Template Name: Homepage Template
 *
 * @package techone
 */

get_header();?>


</div></div></div>
<style>
	#top-block {display: none}
	</style>
<div id="myCarousel" class="carousel slide mt30" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    <div class="item carousel-item itemm-3" style="">
	      <div class="container">
		      <div class="itemblock2">
			      <h2 class="itemname animated fadeIn">Каффы для Ваших ушек</h2>
				  <p class="animated fadeIn hidden-xs">Каффы ручной работы из серебра и золота для ваших прелестных ушек от мастера Степана Васильева</p>
				  <a class="itemhref animated fadeIn" href="/shop/">Перейти в каталог</a>
		      </div>
	      </div>
    </div>
    <div class="item carousel-item itemm-1 active">
	      <div class="container">
		      <div class="itemblock">
			      <h3 class="itemname animated fadeIn">Кафф Дракоша из серебра с чернением</h3>
				  <p><a class="itemhref animated fadeIn" href="/shop/silver/kaff-drakosha-iz-serebra-s-cherneniem">Подробнее</a></p>
		      </div>
	      </div>
    </div>
    <div class="item carousel-item itemm-2">
	      <div class="container">
		      <div class="itemblock">
			      <h3 class="itemname animated fadeIn">Кафф-серьга Кленовые листья</h3>
				  <p><a class="itemhref animated fadeIn" href="/shop/silver/kaff-serga-klenovyie-listya-iz-serebra-925">Подробнее</a></p>
		      </div>
	      </div>
    </div>
  </div>
  <!-- Left and right controls -->
  <a class="left carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container stepa-container">
	<div class="row mt30">
		<div class="col-sm-4 hidden-xs">
			<p class="stepa-abouts">Мастер Степан Васильев – единственный в России, посвятивший себя каффам — столь необычным сережкам, способным украсить не только мочку, но и все ушко...</p>
		</div>
		<div class="col-sm-4 text-center">
			<center><a href="/stepan-vasiliev" title="Степан Васильев"><img src="/images/stepa-master.jpg" alt="Степан Васильев" class="stepan mt30"></a></center>
			<p class="stepa-zitat">Каждый кафф создан вручную, наполнен любовью и вниманием к деталям</p>
			<img src="/images/signature.png" alt="Степан Васильев">
		</div>
		<div class="col-sm-4 hidden-xs">
			<p class="stepa-abouts">Каффы - это настоящая находка для тех, у кого не проколоты ушки, ведь большинство моделей не требуют проколов вообще. Попробуйте и вы кое-что особенное...</p>
		</div>
	</div>
</div>
<div class="block-1400">
<div class="bg-grey pdb30">
<div class="container pd30">
	<?php echo do_shortcode('[best_selling_products per_page="12"]'); ?>
	
	
	
		<p class="mt30 text-center mb-5"><a href="/shop" class="button-more addtocartbutton">Посмотреть все каффы</a></p>
</div>
</div>

<div  class="container main-content-area"><div><div>
<?php get_footer(); ?>