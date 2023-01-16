
<?php get_header(); ?>

	<section class="box-content home--header">
		<div class="container">

			<h1><?php the_field('title_header_home'); ?></h1>

			<div class="solution">
				<div class="solution--info-link">
					<span><?php the_field('resume_header_home'); ?></span>
				</div>

				<?php if( have_rows('call_action_header_home') ):
					while( have_rows('call_action_header_home') ) : the_row(); ?>

						<div class="solution--info-link">
							<div>
								<h4><?php the_sub_field('title'); ?></h4>
								<p><?php the_sub_field('resume'); ?></p>
								<a href="<?php the_permalink(get_sub_field('link')); ?>" class="button" title="LEARN MORE">LEARN MORE</a>
							</div>
						</div>

					<?php endwhile;
				endif; ?>

			</div>
		</div>
	</section>

	<section class="box-content">
		<div class="container">
			<div class="home--text-call-action">
				<h3><?php the_field('title_about'); ?></h3>
				<div class="home--text-call-action--info">
					<p><?php the_field('resume_about'); ?></p>
					<a href="<?php the_permalink(get_field('link_about')); ?>" class="button button--green" title="<?php the_field('text_link__bout'); ?>"><?php the_field('text_link__bout'); ?></a>
				</div>
			</div>
		</div>
	</section>

	<section class="box-content home--solution">
		<div class="container">
			<h2><?php the_field('title_services_solutions'); ?></h3>

			<div class="content-solution">
				<?php
					$post = array(
							'post_type' => 'services'
						);
					query_posts( $post ); 

					while ( have_posts() ) : the_post(); ?>

						<div class="solution">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="solution--info-img">
								<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' )[0]; ?>" alt="<?php the_title(); ?>">
							</a>
							<div class="solution--info-link">
								<div>
									<h4><?php the_title(); ?></h4>
									<?php the_excerpt(); ?>
									<a href="<?php the_permalink(); ?>" class="button" title="LEARN MORE">LEARN MORE</a>
								</div>
							</div>
						</div>

					<?php endwhile;
					wp_reset_query();
				?>
			</div>

			<div class="location">
				<div class="location--header">
					<h2><?php the_field('title_location'); ?></h3>
					<p><?php the_field('resume_location'); ?></p>
				</div>
				<div class="location--filter">
					<div class="location--filter--search">
						<div class="location--filter--search--form">
							<form action="">
								<fieldset>
									<label for="search-location">Where</label>
									<input type="search" name="search-location" id="search-location" placeholder="Enter Your Location">
								</fieldset>
								<fieldset class="search--form-select">
									<label for="search-miles">Search Radius</label>
									<select name="search-miles" id="search-miles">
										<option value="5">5 Miles</option>
										<option value="10">10 Miles</option>
										<option value="25">25 Miles</option>
										<option value="50">50 Miles</option>
									</select>
								</fieldset>
								<button class="button button--green">SEARCH</button>
							</form>
						</div>
						<div class="location--filter--search--map" id="map"></div>
					</div>
					<div class="location--filter--result">
						<div class="scrollbar-inner">
							<ul id="location-result">

								<?php
									$post = array(
											'post_type' => 'location'
										);
									query_posts( $post ); 

									while ( have_posts() ) : the_post(); ?>
										<li>
											<h4><?php the_title(); ?></h4>
											<span>
												<?php the_field('address-location'); ?>
												<br>
												<?php 
													the_field('city-location'); 
													if(get_field('state-location')){ 
														echo ', ' . get_field('state-location');
													} 
												?>
											</span>
											<span>
												0.0 Miles  |  <a href="#" title="Directions">Directions</a>
											</span>
										</li>
									<?php endwhile;
									wp_reset_query();
								?>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="box-content home--about">
		<div class="container">
			<h2><?php the_field('title_call_action_about'); ?>s</h3>
			<p class="title"><?php the_field('resume_call_action_about'); ?></p>

			<div class="about">

				<?php if( have_rows('item_call_action_about') ):
					while( have_rows('item_call_action_about') ) : the_row(); ?>

						<div class="about--item">
							<img src="<?php echo get_sub_field('image')['sizes']['thumbnail']; ?>" alt="<?php the_sub_field('title'); ?>">
							<div class="about--item--info">
								<h4><?php the_sub_field('title'); ?></h4>
								<p><?php the_sub_field('resume'); ?></p>
							</div>
							<a href="<?php the_permalink(get_sub_field('link')); ?>" title="Learn More">
									Learn More
							</a>
						</div>

					<?php endwhile;
				endif; ?>

			</div>
		</div>
	</section>

	<section class="box-content home--banner">
		<div class="container">
			<div class="banner">
				<h2><?php the_field('title_banner'); ?></h3>
				<div class="banner--link">
					<span><?php the_field('resume_banner'); ?></span>
					<a href="<?php the_permalink(get_field('link_banner')); ?>" class="button" title="<?php the_field('text_link__banner'); ?>"><?php the_field('text_link__banner'); ?></a>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>

<script async
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCM0TS2bUIzoyL_lCJVi6K0Yk3y-nFNUuo&callback=initMap">
</script>

<script type="text/javascript">
	let map;
	let marker;
	let geocoder;
	let widthWindow;
	let zoom

	function initMap() {
		widthWindow = $(window).width();
		if(widthWindow < 1024){
			zoom = 8;
		}
		map = new google.maps.Map(document.getElementById("map"), {
			zoom: zoom,
			center: { lat: 40.76739223722035, lng: -73.9728476938151 },
			mapTypeControl: false,
		});
		geocoder = new google.maps.Geocoder();

		marker = new google.maps.Marker({
			map,
		});

		<?php
			$post = array(
					'post_type' => 'location'
				);
			query_posts( $post ); 
			while ( have_posts() ) : the_post(); ?>
				geocode({ address: '<?php echo get_field('address-location') . ', ' . the_field('city-location'); ?>' });
			<?php endwhile;
			wp_reset_query();
		?>
	}

	function geocode(request) {
		geocoder
			.geocode(request)
			.then((result) => {
				const { results } = result;

				marker = new google.maps.Marker({
					map,
				});

				map.setCenter(results[0].geometry.location);
				marker.setPosition(results[0].geometry.location);
				marker.setMap(map);

				return results;
			})
			.catch((e) => {
				alert("Geocode was not successful for the following reason: " + e);
			});
	}

	window.initMap = initMap;
</script>

<script type="text/javascript">
	jQuery(document).ready(function(){
			jQuery('.scrollbar-inner').scrollbar();
	});
</script>
