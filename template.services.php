<?php
  /*
    Template Name: Services
  */

  get_header();

  global $post;
?>

<!--BEGIN: container-->
<div class="arp-services arp-container">

    <div class="content-area">
		<!--
        <h1 class="h2-style">SERVICES</h1>*
		-->
        <?php
          $services = get_field( 'services', $post->ID );
          $n = 1;

          foreach( $services as $s ) {
            $classone = 'left';
            $classtwo = 'right-float';
            if( $n%2 == 0 ) {
              $classone = 'right';
              $classtwo = 'left-float';
            }
            ?>
            <div class="service">
                <!--<img src="<?php /*echo $s['image']['url'];  */?>" class="float <?php /*echo $classone; */?>" alt="">-->
                <div style="background-image: url('<?php echo $s['image']['url'];  ?>')" class="slide-img float <?php echo $classone; ?>"></div>
                <div class="service-write-up <?php echo $classtwo; ?>">
                    <div class="write-up-center-holder">
                        <h4><?php echo strtoupper( $s['title'] ); ?></h4>
                        <?php echo $s['content']; ?>
                        <a href="<?php echo get_bloginfo('url'); ?>/contact?subject=<?php echo $s['title']; ?>" class="btn primary">ENQUIRE</a>
                    </div>
                </div>
            </div>
          <?php
          $n++;
        }

        ?>



    </div>
</div>


<?php get_footer();  ?>
