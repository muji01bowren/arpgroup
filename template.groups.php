<?php
  /*
    Template Name: Groups
  */

  get_header();

  global $post;
  setup_postdata( $post );
?>

<!--BEGIN: container-->
<div class="arp-groups-associates arp-container">
    <div class="groups-associates-content-area">
        <div class="content-container">
          <?php the_content(); ?>
        </div>
        <?php
          $groups = get_field( 'groups__associations', $post->ID );

          if( !empty( $groups ) ) {
              foreach( $groups as $g ) {
                if( $g['link'] == '' || $g['link'] == '#' ) {?>
                  <a target="_blank" href="#" onclick="return false" style="background-image: url('<?php echo $g['logo']['url']; ?>')"></a>
                <?php } else { ?>
                  <a target="_blank" href="<?php echo $g['link']; ?>" style="background-image: url('<?php echo $g['logo']['url']; ?>')"></a>
                <?php } 

              }
          }
        ?>

        <div class="clear-fix"></div>
        <a href="<?php echo get_bloginfo('url'); ?>/contact/" class="btn primary">CONTACT US</a>
    </div>
</div>

<?php get_footer();  ?>
