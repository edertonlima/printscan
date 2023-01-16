<footer class="footer">
	<div class="container">
		<div class="content--footer">
			<div class="copy">
				<a href="#" title="printscan">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/printscan-logo-footer.svg" alt="printscan"/>
				</a>
				<span>© 2022  PrintScan</span>
				<div class="nav-footer">
					<ul>
						<?php 
							$array_menu = wp_get_nav_menu_items('footer');
							$menu = array();
							foreach ($array_menu as $item) { ?>

								<li>
									<a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>">
										<?php echo $item->title; ?>
									</a>
								</li>							

							<?php }
						?>
					</ul>
				</div>
			</div>

			<div class="nav-footer">
				<ul>
					<?php 
						$array_menu = wp_get_nav_menu_items('services');
						$menu = array();
						foreach ($array_menu as $item) {

							$nextItem = next($array_menu);
							if(!$item->menu_item_parent){ $subnav = 'title'; }else{ $subnav = ''; } ?>

							<li class="<?php echo $subnav; ?>">
								<a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>">
									<?php echo $item->title; ?>
								</a>
							</li>							

						<?php }
					?>
				</ul>

				<ul>
					<?php 
						$array_menu = wp_get_nav_menu_items('solutions');
						$menu = array();
						foreach ($array_menu as $item) {

							$nextItem = next($array_menu);
							if(!$item->menu_item_parent){ $subnav = 'title'; }else{ $subnav = ''; } ?>

							<li class="<?php echo $subnav; ?>">
								<a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>">
									<?php echo $item->title; ?>
								</a>
							</li>							

						<?php }
					?>
				</ul>

				<ul>
					<?php 
						$array_menu = wp_get_nav_menu_items('about');
						$menu = array();
						foreach ($array_menu as $item) {

							$nextItem = next($array_menu);
							if(!$item->menu_item_parent){ $subnav = 'title'; }else{ $subnav = ''; } ?>

							<li class="<?php echo $subnav; ?>">
								<a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>">
									<?php echo $item->title; ?>
								</a>
							</li>							

						<?php }
					?>

					<li class="social">
						<a href="#" title="linkedin">
							<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.5793 9.9083C11.5793 10.8271 10.9946 11.5788 9.90879 11.5788C8.90649 11.5788 8.23828 10.8271 8.23828 9.99183C8.23828 9.07305 8.90649 8.23779 9.90879 8.23779C10.9111 8.23779 11.5793 8.98952 11.5793 9.9083Z" fill="#091F40"/><path d="M11.579 12.4104H8.24234V23.2555H11.579V12.4104Z" fill="#091F40"/><path d="M19.5848 12.5776C17.8307 12.5776 16.8328 13.5799 16.4152 14.2481H16.3317L16.1646 12.8282H13.1621C13.1621 13.747 13.2456 14.8284 13.2456 16.0813V23.2557H16.5823V17.3342C16.5823 17.0001 16.5823 16.7495 16.6658 16.4989C16.9164 15.9143 17.334 15.1625 18.2528 15.1625C19.4221 15.1625 19.9233 16.1648 19.9233 17.4968V23.2513H23.2599V17.0792C23.2599 13.9932 21.6729 12.5732 19.5892 12.5732L19.5848 12.5776Z" fill="#091F40"/><path d="M25.0752 31.4979H6.42267C2.87943 31.4979 0 28.6141 0 25.0752V6.42267C0 2.88383 2.88383 0 6.42267 0H25.0752C28.6185 0 31.4979 2.88383 31.4979 6.42267V25.0752C31.4979 28.6185 28.6141 31.4979 25.0752 31.4979ZM6.42267 1.75843C3.85096 1.75843 1.75843 3.85096 1.75843 6.42267V25.0752C1.75843 27.6469 3.85096 29.7395 6.42267 29.7395H25.0752C27.6469 29.7395 29.7395 27.6469 29.7395 25.0752V6.42267C29.7395 3.85096 27.6469 1.75843 25.0752 1.75843H6.42267Z" fill="#091F40"/></svg>
						</a>
						<a href="#" title="facebook">
							<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M25.0752 31.4979H6.42267C2.87943 31.4979 0 28.6141 0 25.0752V6.42267C0 2.88383 2.88383 0 6.42267 0H25.0752C28.6185 0 31.4979 2.88383 31.4979 6.42267V25.0752C31.4979 28.6185 28.6185 31.4979 25.0752 31.4979ZM6.42267 1.75843C3.85096 1.75843 1.75843 3.85096 1.75843 6.42267V25.0752C1.75843 27.6469 3.85096 29.7395 6.42267 29.7395H25.0752C27.6469 29.7395 29.7395 27.6469 29.7395 25.0752V6.42267C29.7395 3.85096 27.6469 1.75843 25.0752 1.75843H6.42267Z" fill="#091F40"/><path d="M19.0617 9.32451H20.719V5.71973H18.2264C14.692 5.71973 13.0171 7.82105 13.0171 10.8148V13.6502H10.252V17.0748H13.0171V25.7834H17.167V17.0748H19.9321L20.719 13.6502H17.167V11.3115C17.167 10.3532 17.6901 9.32011 19.0661 9.32011L19.0617 9.32451Z" fill="#091F40"/></svg>
						</a>
					</li>
				</ul>

			</div>

			<div class="copy copy--mobile">
				<span>© 2022  PrintScan</span>
				<div class="nav-footer">
					<ul>
						<?php 
							$array_menu = wp_get_nav_menu_items('footer');
							$menu = array();
							foreach ($array_menu as $item) { ?>

								<li>
									<a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>">
										<?php echo $item->title; ?>
									</a>
								</li>							

							<?php }
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/scrollbar/jquery.scrollbar.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.menu-mobile').click(function(){
			jQuery('.header').toggleClass('open-mobile');
		});
	});
</script>

<?php wp_footer(); ?>