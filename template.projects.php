<?php
  /*
    Template Name: Projects
  */

  get_header();

  global $post;
?>

<style>
.hideMe { display: none; }
</style>

<!--BEGIN: container-->
<div class="arp-projects arp-container">

  <?php
  $args = array(
    'posts_per_page'   => -1,
    'post_type'        => 'project',
    'post_status'      => 'publish'
    );
    $projects = get_posts( $args );
  ?>

  <!--BEGIN: popup-->
  <div class="image-slider-popup">
      <div class="popup-mask"><a href="" class="close-popup"></a></div>
      <!--BEGIN: slider-->
      <div class="owl-carousel project-popup-slider">
      </div>
  </div>

    <!--BEGIN: page header-->
    <?php $top_image = get_field('top_image', $post->ID); ?>

    <div class="arp-header-section" style="background-image: url('<?php echo $top_image['url']; ?>')">
        <div class="content-container">
            <?php echo apply_filters( 'the_content', get_field('top_content', $post->ID) ); ?>
        </div>
    </div>

    <!--BEGIN: featured projects-->
    <div class="featured-projects">
        <div class="content-area">
            <div class="tab-container">
                <a data-type="highlights" class="active switch" href="">PROJECT HIGHLIGHTS</a>
                <a data-type="progress" class="switch" href="">PROJECTS IN PROGRESS</a>
            </div>
            <div class="highlights">
              <?php
              $args = array(
                'posts_per_page'   => -1,
                'post_type'        => 'project',
                'post_status'      => 'publish'
                );
                $projects = get_posts( $args );

                foreach( $projects as $p ) {
                    $type = get_field('project_type',$p->ID);
                    $thumb = get_field( 'project_list_image', $p->ID );
                      $single_page = get_field('single_page', $p->ID);
                      $url = '#';
                      if( $single_page == 'yes' ) {
                        $url = get_permalink( $p );
                      }

                      if( get_field( 'project_type', $p->ID) != 'none' && get_field( 'project_type', $p->ID) == 'highlights' ) {
                    ?>
                      <div data-type="<?php echo $type; ?>" class="<?php // if( $type == 'progress' ) { echo 'hideMe'; } ?> individual-project">
                          <a href="<?php echo $url; ?>" class="mask"><div class="slide-img" style="background-image: url('<?php echo $thumb['url']; ?>')"></div><!--<img src="<?php /*echo $thumb['url']; */?>" alt="">--></a>
                          <div class="details">
                              <h6><?php echo strtoupper( $p->post_title ); ?></h6>
                              <p><?php echo get_field( 'project_area', $p->ID ); ?></p>
                              <div class="state-category">
                                <?php if( get_field( 'status', $p->ID ) == 'under_construction' ) { ?>
                                    <a href="" class="state under-construction"><?php echo ucwords(strtolower(str_replace('_',' ',get_field( 'status', $p->ID )))); ?></a>
                              <?php } else { ?>
                                    <a href="" class="state"><?php echo ucwords(strtolower(str_replace('_',' ',get_field( 'status', $p->ID )))); ?></a>
                              <?php } ?>

                                  <?php $cats = wp_get_post_terms($p->ID, 'projcat'); ?>
                                  <a href="<?php echo get_bloginfo('url'); ?>/projects" class="category catClick" data-id="<?php echo $cats[0]->term_id ?>"><?php echo $cats[0]->name; ?></a>
                              </div>
                          </div>
                      </div>
                    <?php
                  }
                }

              ?>
                <div class="clear-fix"></div>
                <a href="" class="btn primary">LOAD MORE</a>
            </div>
            <div class="progress hideMe">
              <?php
              $args = array(
                'posts_per_page'   => -1,
                'post_type'        => 'project',
                'post_status'      => 'publish'
                );
                $projects = get_posts( $args );

                foreach( $projects as $p ) {
                    $type = get_field('project_type',$p->ID);
                    $thumb = get_field( 'project_list_image', $p->ID );
                      $single_page = get_field('single_page', $p->ID);
                      $url = '#';
                      if( $single_page == 'yes' ) {
                        $url = get_permalink( $p );
                      }

                      if( get_field( 'project_type', $p->ID) != 'none' && get_field( 'project_type', $p->ID) == 'progress' ) {
                    ?>
                      <div data-type="<?php echo $type; ?>" class="<?php // if( $type == 'progress' ) { echo 'hideMe'; } ?> individual-project">
                          <a href="<?php echo $url; ?>" class="mask"><div class="slide-img" style="background-image: url('<?php echo $thumb['url']; ?>')"></div><!--<img src="<?php /*echo $thumb['url']; */?>" alt="">--></a>
                          <div class="details">
                              <h6><?php echo strtoupper( $p->post_title ); ?></h6>
                              <p><?php echo get_field( 'project_area', $p->ID ); ?></p>
                              <div class="state-category">
                                <?php if( get_field( 'status', $p->ID ) == 'under_construction' ) { ?>
                                    <a href="" class="state under-construction"><?php echo ucwords(strtolower(str_replace('_',' ',get_field( 'status', $p->ID )))); ?></a>
                              <?php } else { ?>
                                    <a href="" class="state"><?php echo ucwords(strtolower(str_replace('_',' ',get_field( 'status', $p->ID )))); ?></a>
                              <?php } ?>

                                  <?php $cats = wp_get_post_terms($p->ID, 'projcat'); ?>
                                  <a href="<?php echo get_bloginfo('url'); ?>/projects" class="category catClick" data-id="<?php echo $cats[0]->term_id ?>"><?php echo $cats[0]->name; ?></a>
                              </div>
                          </div>
                      </div>
                    <?php
                  }
                }

              ?>
                <div class="clear-fix"></div>
                <a href="" class="btn primary">LOAD MORE</a>
            </div>
        </div>
    </div>

    <!--BEGIN: portfolio projects-->
    <!--<div class="portfolio">
        <div class="content-area">
            <form action="" method="">
                <h3>PORTFOLIO</h3>
                <div class="custom-select-box">
                    <label for="portfolio-category">Sort by:</label>
                    <select name="portfolio-category" id="portiChange" id="portfolio-category">
                        <option value="" selected>All categories</option>
                        <?php
                        $terms = get_terms( array(
                            'taxonomy' => 'projcat',
                            'hide_empty' => true,
                        ) );

                        foreach( $terms as $t ) {
                          echo '<option value="'.$t->term_id.'">'.$t->name.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="clear-fix"></div>
            </form>
            <?php foreach( $projects as $p ) {  ?>
              <?php $cats = wp_get_post_terms($p->ID, 'projcat'); ?>
              <?php
                $type = get_field('project_type',$p->ID);
                $single_page = get_field('single_page',$p->ID);
                $thumb = get_field( 'project_list_image', $p->ID );
                $single_page = get_field('single_page', $p->ID);
                $url = '#';
                if( $single_page == 'no' ) {
                  $url = get_permalink( $p );
                }
              ?>
              <div data-id="<?php echo $cats[0]->term_id; ?>" class="individual-project porti <?php echo $type; ?>">
                <?php if( $single_page == 'gallery' ) { ?>
                  <div class="mask galleryOption">
                      <div class="slide-img" style="background-image: url('<?php echo $thumb['url']; ?>')"></div>
                      <div data-id="<?php echo $p->ID; ?>" class="btn secondary slide">VIEW GALLERY</div>
                  </div>
                  <div class="details">
                      <h6><?php echo strtoupper( $p->post_title ); ?></h6>
                      <p><?php echo get_field( 'project_area', $p->ID ); ?></p>
                      <div class="state-category">
                          <a href="#" data-id="<?php echo $cats[0]->term_id ?>" class="catClick category"><?php echo $cats[0]->name ?></a>
                      </div>
                  </div>
                <?php } else { ?>
                  <div class="mask">
                      <div class="slide-img" style="background-image: url('<?php echo $thumb['url']; ?>')"></div>
                  </div>
                  <div class="details">
                      <h6><?php echo strtoupper( $p->post_title ); ?></h6>
                      <p><?php echo get_field( 'project_area', $p->ID ); ?></p>
                      <div class="state-category">
                          <a href="#" data-id="<?php echo $cats[0]->term_id ?>" class="catClick category"><?php echo $cats[0]->name ?></a>
                      </div>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>

            <div class="clear-fix"></div>
            <a href="" class="btn primary">LOAD MORE</a>
        </div>
    </div>-->
</div>

<script type="text/javascript">

    $(document).ready(function(){

      $('.galleryOption .btn').on('click', function(){

          var dataid = $(this).data('id');
          var imgCount = 0;

          $('.project-popup-slider .displaySlide').each(function(){
              $(this).remove();
          })

          var allImages = [];
          <?php
          foreach( $projects as $p ) {
            $project_gallery = get_field('project_gallery', $p->ID);
            $is_gallery = get_field('single_page', $p->ID);
            if( !empty( $project_gallery ) && $is_gallery == 'gallery' ) {
              foreach( $project_gallery as $g ) { ?>
                allImages.push({id: <?php echo $p->ID ?>, url: '<?php echo $g['image']['url']; ?>' });

              <?php }
            }
          }
          ?>

          for( var x in allImages ) {
            if( allImages[x].id == dataid ) {
                $('.project-popup-slider').append('<div class="slide displaySlide" data-id="'+allImages[x].id+'"><img src="'+allImages[x].url+'" alt=""></div>');
            }
          }


              var popupSlider = jQuery('.project-popup-slider');

              popupSlider.owlCarousel({
                  items: 1,
                  loop: true,
                  margin: 0,
                  autoHeight: false,
                  nav: true,
                  dots: false,
                  startPosition: 0
              });
              popupSlider.trigger('refresh.owl.carousel');

              jQuery('.image-slider-popup').fadeIn(500);


      })
    })


</script>
<?php get_footer();  ?>
