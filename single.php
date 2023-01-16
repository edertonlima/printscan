
<?php get_header(); ?>

	<?php if( have_posts() ){
		while ( have_posts() ) : the_post(); ?>

			<section class="box-section box-section-no-padding">
				<div class="slide-page">

					<?php if( have_rows('slide-principal') ):
						while( have_rows('slide-principal') ) : the_row(); ?>

							<div class="item imagem slide-item-height-full" style="background-image: url('<?php the_sub_field('imagem'); ?>');">

								<?php if(get_sub_field('titulo')){ ?>
									<div class="container">
										<h2 class="destaque"><?php the_sub_field('titulo'); ?></h2>
									</div>
								<?php } ?>
							</div>

						<?php endwhile;
					endif; ?>

				</div>
			</section>

			<section class="box-section">
				<div class="container">
					<div class="row">
						
						<div class="col-12 align-center">
							<h1 class="destaque cor-cor2 single-cor2 label-h1">
								<?php the_title(); ?>
								<div>
									<?php $category = wp_get_post_terms( $post->ID, 'category' )[0]; ?>
									<a href="<?php echo get_term_link( $category->term_id); ?>" title="<?php echo $category->name; ?>">
										<?php echo $category->name; ?>
									</a>
									<span><?php the_date(); ?></span>
								</div>		
							</h1>
						</div>

						<div class="col-12 content-txt">
							<?php the_content(); ?>
						</div>

					</div>
					<div class="row footer-single">

						<div class="col-12 align-center">
							<div class="ico-redes">
								<p class="cor-cor2">Compartilhe com pessoas de interesse!</p>

								<div class="sharethis-inline-share-buttons"></div>
							</div>
						</div>

					</div>
				</div>
			</section>

		<?php endwhile;
	} ?>

<?php get_footer(); ?>

<script type="text/javascript">
	$(document).ready(function(){
		
	});
</script>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/slick/slick.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.slide-produtos').slick({
			dots: false,
			arrows: true,
			infinite: false,
			speed: 300,
			slidesToShow: 1,
			slidesToScroll: 1,
			variableWidth: true
		});

		/*slide = 0;
		$('#depoimentos .slick-dots li').each(function() {
			imagem = $('#depoimentos .slick-slide[data-slick-index="'+ slide +'"] img').attr('src');
			$('button', this).css('background-image','url('+ imagem +')');
			slide = slide+1;
		});

		// projetos
		$('#projetos').slick({
			dots: true,
			arrows: false,
			infinite: false,
			speed: 300,
			slidesToShow: 3,
			slidesToScroll: 1
		});*/
	});
</script>