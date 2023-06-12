<?php
  /*
    Template Name: About
  */

  get_header();

  global $post;
  setup_postdata( $post );
?>

<!--BEGIN: container-->
<div class="arp-about-us arp-container">

    <!--BEGIN: page header-->
    <?php $top_image = get_field( 'top_image', $post->ID ); ?>

    <div class="arp-header-section" style="background-image: url('<?php echo $top_image['url']; ?>')">
        <div class="content-container">
            <!--<h1></h1>-->
            <?php the_content(); ?>
        </div>
    </div>

    <!--BEGIN: page write up-->
    <div class="about-us-write-up">
        <div class="content-container">
            <h1 class="h4-style"><?php echo strtoupper( $post->post_title); ?></h1>
            <h3><?php echo get_field( 'heading_under_title', $post->ID ) ?></h3>
        </div>
        <blockquote>
            <?php echo strip_tags(get_field( 'quote', $post->ID )); ?>
        </blockquote>
        <div class="write-up">
            <?php echo apply_filters('the_content', get_field( 'quote_description', $post->ID )); ?>
            <a href="<?php echo get_bloginfo('url'); ?>/contact/" class="btn primary">CONTACT US</a>
        </div>
    </div>

    <!--BEGIN: employees and information-->
    <div class="the-team-container">
        <div class="grey-container">
            <div class="content-container">
                <?php echo get_field( 'team_description', $post->ID ); ?>
            </div>
        </div>
        <?php $team = get_field( 'team_members', $post->ID ); ?>
        <!--<div class="arp-director">
            <img src="<?php echo $team[0]['image']['url']; ?>" alt="">
            <div class="write-up">
                <div class="write-up-center-holder">
                    <h2><?php echo $team[0]['name']; ?></h2>
                    <h4><?php echo $team[0]['position']; ?></h4>
                    <hr>
                    <?php echo apply_filters( 'the_content', $team[0]['desciption']); ?>
                </div>
            </div>
        </div>-->

        <!--new code-->
        <!--<div class="arp-director">
            <img src="<?php echo $team[1]['image']['url']; ?>" alt="">
            <div class="write-up">
                <div class="write-up-center-holder">
                    <h2><?php echo $team[1]['name']; ?></h2>
                    <h4><?php echo $team[1]['position']; ?></h4>
                    <hr>
					<?php echo apply_filters( 'the_content', $team[1]['desciption']); ?>
                </div>
            </div>
        </div>-->
        <!--new code-->

       <!--<div class="full-team">
            <div class="content-area">
              <?php
                $n = 0;
                foreach( $team as $t ) {
                  if( $n != 0 && $n != 1) {
                    ?>
                    <div class="employee flow-left-3-in-row">
                        <div class="slide-img" style="background-image:url('<?php echo $t['image']['url']; ?>')"></div>
                        <h6><?php echo strtoupper( $t['name'] ) ?></h6>
                        <p class="job-tittle"><?php echo $t['position']; ?></p>
                        <hr>
                        <p class="team-tittle"><?php echo $t['team']; ?></p>
                        <?php echo substr($t['desciption'],0,450); ?>
                    </div>
                    <?php
                  }
                  $n++;
                }
              ?>

            </div>
        </div>-->
    </div>
</div>

<?php get_footer();  ?>
