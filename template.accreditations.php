<?php
  /*
    Template Name: Accreditations
  */

  get_header();

  global $post;
  setup_postdata( $post );
?>

<!--BEGIN: container-->
<div class="arp-accreditations arp-container">

    <!--BEGIN: page header-->
    <div class="arp-header-section" style="background-image: url('<?php echo get_bloginfo('template_directory'); ?>/assets/images/accreditations-header.png')">
        <div class="content-container">
          <?php the_content() ?>
            <hr>
            <h5><?php echo strip_tags( get_field('download_text', $post->ID) ); ?></h5>
            <div class="download">
              <?php
                $certificate_zip = get_field('certificate_zip', $post->ID);
                $health_zip = get_field('health_zip', $post->ID);
              ?>
                <a href="<?php echo $certificate_zip['url']; ?>" download class="btn secondary">ALL CERTIFICATES</a>
                <a href="<?php echo $health_zip['url']; ?>" download class="btn secondary">ALL HEALTH & SAFETY</a>
            </div>
        </div>
    </div>

        <!--BEGIN: certificates-->
        <div class="certificates-container">
            <div class="content-area">
                <h3>CERTIFICATES</h3>
                <?php
                  $certificates = get_field('certificates', $post->ID);
                  foreach( $certificates as $c ) {
                    ?>
                    <div class="certificate flow-left-4-in-row">
                        <div class="slide-img" style="background-image:url('<?php echo $c['logo']['url']; ?>')"></div>
                        <?php if( $c['cerificate'] != '' ) { ?>
                          <div><a href="<?php echo $c['cerificate']; ?>" target="_blank"><?php echo $c['text']; ?></a></div>
                        <?php } else { ?>
                            <div><a href="#" class="disabled" onclick="return false"><?php echo $c['text']; ?></a></div>
                        <?php } ?>
                    </div>
                    <?php
                  }
                ?>
            </div>
        </div>

        <!--BEGIN: page header-->
        <div class="health-safety-container">
            <div class="content-area">
                <h3>HEALTH & SAFETY</h3>
                <?php
                  $health = get_field('health_&_safety', $post->ID);
                  foreach( $health as $h){
                  ?>
                  <div class="certificate flow-left-4-in-row">
                      <div class="slide-img" style="background-image:url('<?php echo $h['logo']['url']; ?>')"></div>
                      <?php if( $h['file'] != '' ) { ?>
                          <div><a href="<?php echo $h['file']; ?>" target="_blank"><?php echo $h['text']; ?></a></div>
                    <?php } else { ?>
                          <div><a href="#" class="disabled" onclick="return false"><?php echo $h['text']; ?></a></div>
                    <?php } ?>
                  </div>
                  <?php
                  }
                ?>
              </div>
        </div>
</div>

<?php get_footer();  ?>
