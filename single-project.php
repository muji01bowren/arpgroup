<?php get_header(); ?>
<?php
  $thumb = get_the_post_thumbnail_url( $post->ID, 'full' );
  $single_page = get_field('single_page', $post->ID);
  if( $single_page == 'no' ) {
    exit;
  }
?>

<div class="arp-individual-project arp-container">

    <!--BEGIN: popup-->
    <div class="image-slider-popup">
        <div class="popup-mask"><a href="" class="close-popup"></a></div>

        <!--BEGIN: slider-->
        <div class="owl-carousel project-popup-slider">
          <?php
            $project_gallery = get_field('project_gallery', $post->ID);
            if( !empty( $project_gallery ) ) {
              foreach( $project_gallery as $g ) { ?>
                <div class="slide">
                    <img src="<?php echo $g['image']['url']; ?>" alt="">
                </div>
              <?php }
            }
          ?>
        </div>
    </div>

    <!--BEGIN: page header-->
    <div class="arp-header-section" style="background-image: url('<?php echo $thumb; ?>')">
        <div class="content-container">
            <h1><?php echo strtoupper($post->post_title); ?></h1>
            <h5><?php echo get_field('project_street_address', $post->ID); ?></h5>
        </div>
    </div>

    <!--BEGIN: slider-->
    <div class="owl-carousel individual-project-slider">
      <?php
        $project_gallery = get_field('project_gallery', $post->ID);
        if( !empty( $project_gallery ) ) {
          foreach( $project_gallery as $g ) { ?>
            <div class="slide">
                <div class="slide-img" style="background-image: url('<?php echo $g['image']['url']; ?>')"></div>
            </div>
          <?php }
        }
      ?>
    </div>

    <div class="content-area">
        <div class="center-holder">
            <div class="aside-section">
                <div>
                  <?php if( get_field('client', $post->ID) != '' ) { ?>
                    <p style="background-image: url('<?php echo get_bloginfo('template_directory') ?>/assets/images/aside-1.png')">
                        <span>Client:</span> <?php echo get_field('client', $post->ID); ?>
                    </p>
                  <?php } ?>
                  <?php if( get_field('complete_date', $post->ID) != '' ) { ?>
                    <p style="background-image: url('<?php echo get_bloginfo('template_directory') ?>/assets/images/aside-2.png')">
                        <span>Complete:</span> <?php echo get_field('complete_date', $post->ID); ?>
                    </p>
                    <?php } ?>
                    
                    <p style="background-image: url('<?php echo get_bloginfo('template_directory') ?>/assets/images/aside-3.png')">
                      <?php $cats = wp_get_post_terms($post->ID, 'projcat'); ?>
                        <span>Category:</span> <a href="<?php echo get_bloginfo('url') ?>/projects?cat=<?php echo $cats[0]->term_id ?>"><?php echo $cats[0]->name; ?></a>
                    </p>

                    <?php if( get_field('sector', $post->ID) != '' ) { ?>
                    <p style="background-image: url('<?php echo get_bloginfo('template_directory') ?>/assets/images/aside-4.png')">
                        <span>Sector:</span> <?php echo get_field('sector', $post->ID); ?>
                    </p>
                    <?php } ?>
                    <div class="clear-fix"></div>
                </div>
                <a href="<?php echo get_bloginfo('url'); ?>/projects/" class="btn primary">MORE PROJECTS</a>
            </div>
            <div class="content-section">
                <?php echo apply_filters( 'the_content', $post->post_content ); ?>
                <?php
                  $associations = get_field('associations', $post->ID);
                  if( !empty( $associations ) ) { ?>
                        
                    <div class="associated-companies">
                        <p>In association with:</p>

                        <?php
                          foreach( $associations as $a ) {
                            echo '<div class="logo-container">';
							  	$link = $a['link'];
							  	if( $link == '' || $link == '#' ) {
									echo '<img src="'.$a['logo']['url'].'" />';
								} else {
									echo '<a href="'.$link.'" target="_blank"><img src="'.$a['logo']['url'].'" /></a>';
								}
                                
                            echo '</div>';
                          }
                        ?>
                    </div>

                  <?php } ?>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var  individualProjectSlider = $('.individual-project-slider');

    //individual projects page slider
    individualProjectSlider.owlCarousel({
        loop: false,
        margin: 0,
        nav: true,
        items: 3,
        dots: false,
        center: false,
        mouseDrag: false,
        responsive : {
            // breakpoint from 800 up
            800 : {
                items: 5
            },
            // breakpoint from 700 up
            700 : {
                items: 4
            }
        }
    });

    individualProjectSlider.trigger('refresh.owl.carousel');
</script>

<?php get_footer(); ?>
