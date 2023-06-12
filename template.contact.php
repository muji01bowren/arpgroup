<?php
  /*
    Template Name: Contact
  */

  get_header();

  global $post;
  setup_postdata( $post );
?>

<style>
.error { border: 1px solid red; }
</style>

<!--maps scripts for contact page-->
<style type="text/css">
    .gm-control-active>img{box-sizing:content-box;display:none;left:50%;pointer-events:none;position:absolute;top:50%;transform:translate(-50%,-50%)}
    .gm-control-active>img:nth-child(1){display:block}
    .gm-control-active:hover>img:nth-child(1),.gm-control-active:active>img:nth-child(1){display:none}
    .gm-control-active:hover>img:nth-child(2),.gm-control-active:active>img:nth-child(3){display:block}
</style>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Google+Sans"><style type="text/css">.gm-ui-hover-effect{opacity:.6}.gm-ui-hover-effect:hover{opacity:1}</style>
<style type="text/css">
    .gm-style .gm-style-cc span,.gm-style .gm-style-cc a,.gm-style .gm-style-mtc div{font-size:10px;box-sizing:border-box}
</style>
<style type="text/css">
    @media print {  .gm-style .gmnoprint, .gmnoprint {    display:none  }}
    @media screen {  .gm-style .gmnoscreen, .gmnoscreen {    display:none  }}
</style>
<style type="text/css">
    .dismissButton{background-color:#fff;border:1px solid #dadce0;color:#1a73e8;border-radius:4px;font-family:Roboto,sans-serif;font-size:14px;height:36px;cursor:pointer;padding:0 24px}
    .dismissButton:hover{background-color:rgba(66,133,244,0.04);border:1px solid #d2e3fc}
    .dismissButton:focus{background-color:rgba(66,133,244,0.12);border:1px solid #d2e3fc;outline:0}
    .dismissButton:hover:focus{background-color:rgba(66,133,244,0.16);border:1px solid #d2e2fd}
    .dismissButton:active{background-color:rgba(66,133,244,0.16);border:1px solid #d2e2fd;box-shadow:0 1px 2px 0 rgba(60,64,67,0.3),0 1px 3px 1px rgba(60,64,67,0.15)}
    .dismissButton:disabled{background-color:#fff;border:1px solid #f1f3f4;color:#3c4043}</style>
<style type="text/css">
    .gm-style-pbc{transition:opacity ease-in-out;background-color:rgba(0,0,0,0.45);text-align:center}
    .gm-style-pbt{font-size:22px;color:white;font-family:Roboto,Arial,sans-serif;position:relative;margin:0;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}
</style>

<!--
	You need to include this script tag on any page that has a Google Map.

	The following script tag will work when opening this example locally on your computer.
	But if you use this on a localhost server or a live website you will need to include an API key.
	Sign up for one here (it's free for small usage):
		https://developers.google.com/maps/documentation/javascript/tutorial#api_key

	After you sign up, use the following script tag with YOUR_GOOGLE_API_KEY replaced with your actual key.
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_API_KEY"></script>
-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.34&key=AIzaSyDfhWogp81qS8zQnVquj0K1qrYJIkbenIE"></script>

<script type="text/javascript">
    // When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 16,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(<?php echo get_field('longitude', 'option'); ?>, <?php echo get_field('lattitude', 'option'); ?>), // New York

            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#006d99"},{"visibility":"on"}]}]
        };

        // Get the HTML DOM element that will contain your map
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(<?php echo get_field('longitude', 'option'); ?>, <?php echo get_field('lattitude', 'option'); ?>),

            map: map,
            title: 'Snazzy!'
        });
    }
</script>
<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/35/8/intl/en_au/common.js"></script>
<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/35/8/intl/en_au/util.js"></script>
<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/35/8/intl/en_au/map.js"></script>
<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/35/8/intl/en_au/marker.js"></script>
<style type="text/css">
    .gm-style {
        font: 400 11px Roboto, Arial, sans-serif;
        text-decoration: none;
    }
    .gm-style img { max-width: none; }
</style>
<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/35/8/intl/en_au/onion.js"></script>
<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/35/8/intl/en_au/stats.js"></script>
<script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/35/8/intl/en_au/controls.js"></script>
<!--maps scripts for contact page end-->

<!--BEGIN: container-->
<div class="arp-contact arp-container">
    <div class="details-container">
        <div class="contact-details-container">
            <div class="contact-details">
                <?php the_content(); ?>
                <?php
                  $telephone_number = get_field( 'telephone', 'option' );
                  $email_address = get_field( 'email', 'option' );
                  $cellphone_number = get_field( 'cellphone', 'option' );
                  $address = get_field( 'address', 'option' );
                ?>
                <div class="float left">
                    <?php if( $telephone_number != '' ) { ?><a target="_blank" href="tel:<?php echo get_field( 'telephone', 'option' ); ?>" style="background-image: url('<?php echo get_bloginfo('template_directory'); ?>/assets/images/phone-blue.png')"><?php echo get_field( 'telephone', 'option' ); ?></a><?php } ?>
                    <?php if( $email_address != '') { ?><a target="_blank" href="mailto:<?php echo get_field( 'email', 'option' ); ?>" style="background-image: url('<?php echo get_bloginfo('template_directory'); ?>/assets/images/email-blue.png')"><?php echo get_field( 'email', 'option' ); ?></a><?php } ?>
                    <?php if( $cellphone_number != '') { ?><a target="_blank" href="tel:<?php echo get_field( 'cellphone', 'option' ); ?>" style="background-image: url('<?php echo get_bloginfo('template_directory'); ?>/assets/images/fax-blue.png')"><?php echo get_field( 'cellphone', 'option' ); ?></a><?php } ?>
                </div>
                <div class="float right">
                    <?php if($address != '') { ?><a target="_blank" href="<?php echo get_field( 'google_map', 'option' ); ?>"" style="background-image: url('<?php echo get_bloginfo('template_directory'); ?>/assets/images/home-blue.png')">
                        <?php echo get_field( 'address', 'option'); ?>
                    </a><?php } ?>
                </div>
            </div>
            <div class="clear-fix"></div>
        </div>
        <!--<a href="" class="map-container">
            <img src="<?php /*echo get_bloginfo('template_directory'); */?>/assets/images/map.png" alt="">
            <img class="mobile-map" src="<?php /*echo get_bloginfo('template_directory'); */?>/assets/images/mobile-map.png" alt="">
        </a>-->
        <div class="map-container"><?php echo get_field( 'map_embed', 'option' ); ?></div>
    </div>
    <div class="clear-fix"></div>
    <?php
      $subject = '';
      if( $_GET['subject'] != '' ) {
        $subject = $_GET['subject'];
        $subject = str_replace( '%20', ' ', $subject );
        $subject = ucwords(strtolower($subject));
      }
    ?>
    <form action="" method="" id="contactform">
        <div class="content-area">
            <h1 class="h2-style">NEED A QUOTE FOR A PROJECT</h1>
            <p>Fill out the form and we will contact you.</p>
            <div class="float left">
                <label for="name">Name & Surname</label>
                <input name="name" id="name" type="text">
                <label for="contact">Contact Number</label>
                <input name="contact" id="contact" type="text">
                <label for="email">Email Address</label>
                <input name="email" id="email" type="text">
            </div>
            <div class="float right">
                <label for="subject">Subject</label>
                <input name="subject" id="subject"  type="text" value="<?php echo $subject; ?>" >
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
                <input type="hidden" name="cEmail" value="<?php echo get_field( 'contact_form_email_address', $post->ID ); ?>" />
                <button name="submit" id="submit" type="submit" class="btn secondary">SEND MESSAGE</button>
            </div>
        </div>
    </form>
</div>

<?php get_footer();  ?>
