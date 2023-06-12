<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title() ?></title>
    <link rel="shortcut icon" type="image" href="<?php echo get_bloginfo('template_directory'); ?>/assets/images/favicon.png">
    <?php wp_head(); ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    
    <!-- End Google Tag Manager -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5J279JV');</script>
<!-- End Google Tag Manager -->
</head>
<body>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J279JV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>

<!-- Google Tag Manager (noscript) -->

<!-- End Google Tag Manager (noscript) -->
<div class="arp-header">
    <div class="content-area">
        <div class="mobile-btn"></div>
        <a href="<?php echo get_bloginfo('url'); ?>" class="arp-logo"></a>
        <ul class="navigation">
			
			
			
			<!--<li><a href="#">Home</a></li>
          <li><a href="#">Group Solutions</a>
            <ul>
                <li><a href="#">Biluding & Construction</a>
                    <ul>
                        <li><a href="#">ARP Construct</a></li>
                        <li><a href="#">Jacalum</a>
                        <li><a href="#">Sugarplum</a>
                        <li><a href="#">ARP Electrical</a>
                    </ul>
                            <li><a href="#">Real Estate</a>
                                <ul>
                                    <li><a href="#">ARP Property</a></li>
                                    <li><a href="#">ARP Design</a>
                                </ul>
                            <li><a href="#">Technology</a>
                                <ul>
                                    <li><a href="#">Ifinteate</a></li>
                                </ul>
                            <li><a href="#">Finacial Solutions</a>
                                <ul>
                                    <li><a href="#">ARP Finance</a>
                                </ul>
            
              </li>
            </ul>
          </li>
          <li><a href="#">About Us</a>
            <!--<ul>
              <li><a href="#">Overview</a></li>
              <li><a href="#">Careers </a></li>
              <li><a href="#">Team</a></li>
            </ul>
          </li>
          <li><a href="#">Contact Us</a></li>
        -->
			
		
					<?php
						$menu_items = wp_get_nav_menu_items(2);
						global $post;
						if( !empty( $menu_items ) ) {
								foreach( $menu_items as $menu ) {
									if( get_permalink( $post->ID ) == $menu->url ) {
										echo '<li><a class="active" href="'.$menu->url.'">'.$menu->title.'</a></li>';
									} else {
											echo '<li><a href="'.$menu->url.'">'.$menu->title.'</a></li>';
									}
								}
						}
					?>
        </ul>
		</div>
    </div>
<?php /* <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Anomali | The Ad Fraud Experts</title>
    <link rel="icon" href="<?php echo get_bloginfo('url'); ?>/fav.ico" type="image/x-icon" />
	<?php wp_head(); ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116492429-1"></script>
    <script>

        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-116492429-1');

    </script>

		<?php
		$pid = get_post_thumbnail_id( $post->ID );
		$image = wp_get_attachment_image_src( $pid, 'full' );
		?>

		<meta property="og:title" content="<?php echo $post->post_title; ?>"/>
		<meta property="og:url" content="<?php echo get_permalink($post->ID); ?>"/>
		<meta property="og:image" content="<?php echo $image[0]; ?>" />
		<meta property="og:description" content="<?php echo $post->post_excerpt; ?>"/>

</head>
<body>

<nav>

	<section class="nav_holder">

		<?php $logo = get_field( 'logo', 'option' ); ?>
		<div class="logo"><a href="<?php echo get_bloginfo('url'); ?>"><img width="220" src="<?php echo $logo['url']; ?>"></a></div>

		<div class="menu hideHamburger">
				<?php
						$menu_items = wp_get_nav_menu_items(2);

						global $post;

						if( !empty( $menu_items ) ) {
							echo '<ul>';
							foreach( $menu_items as $menu ) {
								if( get_permalink( $post->ID ) == $menu->url ) {
									echo '<li><a class="active" href="'.$menu->url.'">'.$menu->title.'</a></li>';
								} else {
									if( is_single() && $menu->title == 'Resources' ) {
										echo '<li><a class="active" href="'.$menu->url.'">'.$menu->title.'</a></li>';
									} else {
										echo '<li><a href="'.$menu->url.'">'.$menu->title.'</a></li>';
									}

								}

							}
							echo '</ul>';
						}
				?>
		</div>

		<a href="#" class="hamburger"></a>

	</section>

</nav> */ ?>
