
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

						<?php 
							$imagem_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
							$imagem = $imagem_array[0];
						?>
						
						<div class="<?php if($imagem){ echo 'col-6'; }else{ echo 'col-12'; } ?> align-center">
							<h1 class="destaque cor-cor1"><?php the_title(); ?></h1>

							<div class="content-txt">
								<?php the_content(); ?>
							</div>
						</div>

						<?php if($imagem){ ?>
							<div class="col-6 align-center">
								<img src="<?php echo $imagem; ?>" alt="<?php the_title(); ?>" class="img-single">
							</div>
						<?php } ?>
					</div>
				</div>
			</section>

		<?php endwhile;
	} ?>

<?php get_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/slick/slick.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.slide-page').slick({
			dots: true,
			arrows: false,
			infinite: false,
			speed: 300,
			slidesToShow: 1,
			slidesToScroll: 1
		});
	});
</script>