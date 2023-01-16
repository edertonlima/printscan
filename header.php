<!DOCTYPE html>
<html lang="pt-br">
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="" type="image/x-icon" />
	<link rel="icon" href="" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="pt" />
	<meta name="rating" content="General" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index,follow" />
	<meta name="author" content="" />
	<meta name="language" content="pt-br" />
	<meta name="title" content="" />

	<title></title>

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.min.css" media="screen" />

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

	<header class="header">
		<div class="container">
			<a href="<?php echo get_home_url(); ?>" title="Print Scan" class="header--logo">
				<img class="logo-white" src="<?php echo get_template_directory_uri(); ?>/assets/images/printscan-logo.svg"
					alt="Print Scan" />
				<img class="logo-black" src="<?php echo get_template_directory_uri(); ?>/assets/images/printscan-logo-black.svg"
					alt="Print Scan" />
			</a>

			<span class="menu-mobile"></span>

			<nav class="nav">
				<ul>

					<?php 
						$array_menu = wp_get_nav_menu_items('header');
						$menu = array();
						foreach ($array_menu as $item) {
							if(!$item->menu_item_parent){ 
								$nextItem = next($array_menu);
								if($nextItem->menu_item_parent){ $subnav = 'subnav'; }else{ $subnav = ''; } ?>

								<li class="<?php echo $subnav; ?>">
									<a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>">
										<?php echo $item->title; ?>
									</a>
								</li>							

							<?php }
						}

						$array_menu = wp_get_nav_menu_items('header_button');
						$menu = array();
						foreach ($array_menu as $item) { ?>

								<li class="btn-nav"><a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>"><?php echo $item->title; ?></a></li>

						<?php }
					?>

				</ul>
			</nav>
		</div>
	</header>