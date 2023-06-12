<div class="arp-footer">
    <div class="content-area">
        <ul class="footer-section">
            <h5>IMPORTANT LINKS</h5>
				
            <?php
                $menu_items = wp_get_nav_menu_items(3);

                if( !empty( $menu_items ) ) {
                  echo '<ul>';
                    foreach( $menu_items as $menu ) {
                        echo '<li><a href="'.$menu->url.'">'.strtoupper($menu->title).'</a></li>';
                    }
                  echo '</ul>';
                }
            ?>
			<br/>
			<div align="left" class="socialbtns">
				<ul>
					<li><a href="https://www.facebook.com/profile.php?viewas=100000686899395&id=100086565127676" class="fa fa-lg fa-facebook">	
						<img alt="facebook"src="https://arpgroup.africa/wp-content/uploads/2022/12/Facebook.png">
						</a></li>
					<li><a href="https://www.linkedin.com/company/ar-projects-and-developments/" class="fa fa-lg fa-linkedin">
							<img alt="linkedin" src="https://arpgroup.africa/wp-content/uploads/2022/12/Linkdin.png">
						</a></li>
					
				</ul>
			</div>

        </ul>
        <div class="footer-section">
            <h5>GET IN TOUCH</h5>
            <?php
              $telephone = get_field('telephone', 'option');
              $email = get_field('email', 'option');
              $cellphone = get_field('cellphone', 'option');
            ?>
            <a target="_blank" href="tel:<?php echo $telephone; ?>" style="background-image: url('<?php echo get_bloginfo('template_directory'); ?>/assets/images/footer-phone.png')"><?php echo $telephone; ?></a>
            <a target="_blank" href="mailto:<?php echo $email; ?>" style="background-image: url('<?php echo get_bloginfo('template_directory'); ?>/assets/images/footer-email.png')"><?php echo $email; ?></a>
            <a target="_blank" href="tel:<?php echo $cellphone; ?>" style="background-image: url('<?php echo get_bloginfo('template_directory'); ?>/assets/images/footer-fax.png')"><?php echo $cellphone; ?></a>
        </div>
        <div class="footer-section padding-top">
          <?php
            $address = get_field('address', 'option');
            $google_map = get_field('google_map', 'option');
          ?>
            <a target="_blank" href="<?php echo $google_map; ?>" style="background-image: url('<?php echo get_bloginfo('template_directory'); ?>/assets/images/footer-home.png')">
                <?php echo strip_tags($address); ?>
            </a>
        </div>
        <div class="footer-section padding-top">
          <?php $enquire_text = get_field('enquire_text', 'option'); ?>
            <a href="<?php echo get_bloginfo('url'); ?>/contact/?subject=" class="btn secondary">
                ENQUIRE TODAY
            </a>
        </div>
    </div>
</div>

<script>

</script>
<?php wp_footer(); ?>

