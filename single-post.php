<?php

  get_header();

  global $post;

?>

<section class="resources_page single">

  <div class="resources_holder">

    <a class="back_resources" href="<?php echo get_bloginfo('url'); ?>/resources/">BACK TO RESOURCES</a>
    <a href="#" class="subscribeScroll">SUBSCRIBE TO OUR BLOG</a>
    <div class="featured featured_post_single">

      <?php

        setup_postdata( $post );

        $pid = get_post_thumbnail_id( $res_posts[0]->ID );
        $image = wp_get_attachment_image_src( $pid, 'full' );

        $cats = get_the_category();

      ?>

      <div class="image coverBackground" style="background: url('<?php echo $image[0]; ?>') left top no-repeat;">

          <div class="shadow">
            <h3><?php echo $post->post_title; ?></h3>
            <div class="detail_holder">
                <div class="detail_left">
                    <p>Posted <?php echo get_the_time('d F Y'); ?> | <?php echo $cats[0]->name; ?></p>
                </div>
                <div class="detail_right">
                    <span>Share</span>
                    <?php $twitter_share = 'Anomali.io | ' . $post->post_title . ' ' . get_permalink($post->ID); ?>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post->ID); ?>" target="_blank" class="facebook"></a>
                    <a href="https://twitter.com/home?status=<?php echo urlencode( $twitter_share ); ?>" target="_blank" class="twitter"></a>
                    <a href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink($post->ID) ); ?>" target="_blank" class="googleplus"></a>
                    <?php $linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url='.get_permalink($post->ID).'&title='.$post->post_title.'&summary=' . $post->post_excerpt; ?>
                    <a href="<?php echo $linkedin; ?>" target="_blank" class="instagram"></a>
                </div>
            </div>
          </div>
      </div>

    </div>
    <div class="clear"></div>

    <div class="post">

      <div class="mobile_title">
        <h3><?php echo $post->post_title; ?></h3>
        <div class="detail_holder">
            <div class="detail_left">
                <p>Posted <?php echo get_the_time('d F Y'); ?> | <?php echo $cats[0]->name; ?></p>
            </div>
            <div class="detail_right">
                <span>Share</span>
                <?php $twitter_share = 'Anomali.io | ' . $post->post_title . ' ' . get_permalink($post->ID); ?>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post->ID); ?>" target="_blank" class="facebook"></a>
                <a href="https://twitter.com/home?status=<?php echo urlencode( $twitter_share ); ?>" target="_blank" class="twitter"></a>
                <a href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink($post->ID) ); ?>" target="_blank" class="googleplus"></a>
                <?php $linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url='.get_permalink($post->ID).'&title='.$post->post_title.'&summary=' . $post->post_excerpt; ?>
                <a href="<?php echo $linkedin; ?>" target="_blank" class="instagram"></a>
            </div>
        </div>
      </div>

      <?php echo apply_filters( 'the_content', $post->post_content ); ?>

      <div class="share_single">
        <span>Share</span>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post->ID); ?>" target="_blank" class="facebook"></a>
        <a href="https://twitter.com/home?status=<?php echo urlencode( get_permalink($post->ID) ); ?>" target="_blank" class="twitter"></a>
        <a href="https://plus.google.com/share?url=<?php echo urlencode( $twitter_share ); ?>" target="_blank" class="googleplus"></a>
        <?php $linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url='.get_permalink($post->ID).'&title='.$post->post_title.'&summary=' . $post->post_excerpt; ?>
        <a href="<?php echo $linkedin; ?>" target="_blank" class="instagram"></a>

      </div>

      <div class="post_nav">
        <?php $posts = query_posts($query_string); if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php echo previous_post_link( '%link','PREVIOUS ARTICLE' ); ?><?php echo next_post_link( '%link','NEXT ARTICLE' ); ?>

<?php endwhile; endif; ?>
      </div>

    </div>

    <div class="clear"></div>

</div>

</section>

<?php get_footer();  ?>
