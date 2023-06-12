<?php
  /*
    Template Name: Home
  */

  get_header();

  global $post;
?>

<!--BEGIN: container-->
<div class="arp-home arp-container">

    <!--BEGIN: slider-->
    <div class="owl-carousel home-slider">
      <?php
      $slider = get_field('slider', $post->ID);
      foreach( $slider as $s ) {
?>
<div class="slide" style="background-image: url('<?php echo $s['image']['url']; ?>')">
    <div class="slide-mask"><!--<img src="https://arprojects.co.za/GA_ARP-Construct_logo.png" alt="" style="width: 300px; height: 66px;">--></div>
    <div class="slide-content">
        <?php echo apply_filters( 'the_content',$s['description']); ?>
        
    </div>
</div>
<?php

      }

      ?>
    </div>

   

     <!--BEGIN: groups & associations slider-->
    <div class="groups-associations">
        <h3>ARP GROUP & ASSOCIATES</h3>
		<hr size="5" width="90%" color="black">
        <div class="owl-carousel groups-associations-slider">
          <?php $groups = get_field( 'groups', $post->ID ); ?>
			<?php /*print_r($groups); */?>

            <?php foreach( $groups as $g ) { ?>
				<?php /*print_r($g['caption']); */?>
				<?php /*print_r($g['url']); */?><!--
				--><?php /*print_r($g); */?>

				<?php if( trim($g['url']) != '' && trim($g['url']) != '#' ) { ?>
                    <a href="<?php echo $g['url']; ?>" target="_blank" class="slide-img" style="background-image:url('<?php echo $g['logo']['url']; ?>')">
                        <!--<img src="<?php /*echo $g['logo']['url']; */?>" alt="">-->
                    <?php if( $g['logo']['caption'] != '') { ?>
                        <p><?php echo $g['logo']['caption']; ?></p>
                        </a>
					<?php } else { ?>
                        </a>
                    <?php } ?>

				<?php } else { ?>
			        <a href="<?php echo $g['url']; ?>" onclick="return false" class="slide-img" style="background-image:url('<?php echo $g['logo']['url']; ?>')"><!--<img src="<?php /*echo $g['logo']['url']; */?>" alt="">--></a>
			    <?php } ?>

          <?php } ?>
        </div>
       <!-- <a href="<?php echo get_bloginfo('url'); ?>/groups-associations/" class="btn primary">VIEW ALL</a>-->
    </div>

    <!--BEGIN: services section-->
    <div class="services">
        <div class="more-services">
            <div class="more-services-content-area">
                <?php echo apply_filters( 'the_content', get_field('service_description', $post->ID) ); ?>
                <a href="<?php echo get_bloginfo('url'); ?>/Group-Solutions/" class="btn secondary">Group Solutions</a>
            </div>
        </div>
        <div class="float right service-info">
          <?php

            $services = get_field('services', $post->ID);
            $n = 1;
            foreach( $services as $service ) {
?>
<div class="<?php echo $service['class']; ?>" style="background-image: url(<?php echo $service['logo']['url'] ?>)">
    <?php echo apply_filters( 'the_content', $service['description'] ); ?>
</div>
<?php if( $n%2 == 0 ) { echo '<div class="clear-fix"></div>'; } ?>
<?php
$n++;
            }

          ?>
        </div>
        <div class="clear-fix"></div>
    </div>

   
	<!--BEGIN: accreditations slider-->
    <div class="accreditations">
        <!--<h3>ACCREDITATIONS</h3>-->
        <div class="owl-carousel accreditations-slider">
          <?php $accreditations = get_field( 'accreditations', $post->ID ); ?>
          <?php
            foreach( $accreditations as $a ) {
?>
			<?php if( $a['link'] == '' || $a['link'] == '#' ) { ?>
			<a href="<?php echo $a['link']; ?>" onclick="return false" target="_blank" style="background-image: url('<?php echo $a['logo']['url']; ?>')"></a>
			<?php } else { ?>
			<a href="<?php echo $a['link']; ?>" target="_blank" style="background-image: url('<?php echo $a['logo']['url']; ?>')"></a>
			<?php } ?>

<?php
            }
          ?>
        </div>
        <!--<a href="<?php echo get_bloginfo('url'); ?>/accreditations/" class="btn primary">VIEW ALL</a>-->
    </div>
</div>

<!--To set amount of slides that is shown on slider on page load depending on how many is in the backend : need to be edited-->
<script type="text/javascript">
    var  thumbSlider = $('.thumb-nail-slider');
    var  homeSlider = $('.home-slider');
    var  accreditationSlider = $('.accreditations-slider');
    var  groupAssoSlider = $('.groups-associations-slider');

    //main slider
    homeSlider.owlCarousel({
     loop: true,
        margin: 0,
        items: 1,
        nav: true,
        dots: false,
        center: false,
        mouseDrag: true,
        responsive :{
             // breakpoint from 1200 up
            1200 : {
                margin: 33,
                items: 1
            },
        }
    });

    /*  thumbnail slider
  thumbSlider.owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        nav: true,
        dots: false,
        center: false,
        mouseDrag: true,
        responsive :{
            // breakpoint from 980 up
            980 : {
                items: 4,
                nav: true
            },
            // breakpoint from 700 up
            700 : {
                items: 3,
                nav: true
            },
            // breakpoint from 550 up
            550 : {
                items: 2,
                nav: true
            }
        }
    });
*/
    //accreditation slider
    accreditationSlider.owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        items: 1,//slides showing this will have to be edited if theres only 1,2 or 3
        responsive : {
            // breakpoint from 1200 up
            1200 : {
                margin: 33,
                items: 6
            },
            // breakpoint from 1000 up
            1000 : {
                margin: 20,
                items: 5
            },
            // breakpoint from 800 up
            800 : {
                items: 4
            },
            // breakpoint from 600 up
            600 : {
                items: 3,
                center: true
            }
        }
    });

    //groups associations slider
    groupAssoSlider.owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        items: 1,
        responsive :{
            // breakpoint from 1200 up
            1200 : {
                margin: 132,
                items: 4
            },
            // breakpoint from 700 up
            700 : {
                items: 3,
                margin: 50
            },
            // breakpoint from 700 up
            600 : {
                items: 2
            }
        }
    });

    $('.home-slider, .thumb-nail-slider, .accreditations-slider').trigger('refresh.owl.carousel');

</script>

<?php get_footer();  ?>
