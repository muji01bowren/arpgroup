<?php get_header(); ?>

<?php

		$logo = get_field( 'logo', 'option' );
		$background = get_field( 'header_background_image', 'option' );
		$header_title = get_field( 'header_title', 'option' );
		$header_copy = get_field( 'header_copy', 'option' );
		$header_button_text = get_field( 'header_button_text', 'option' );
		$more_image = get_field( 'more_image', 'option' );

?>

<header style="background: url('<?php echo $background['url'] ?>') left top no-repeat;">

		<div class="row">

				<h1><?php echo $header_title; ?></h1>
				<?php echo apply_filters( 'the_content', $header_copy ); ?>

				<a class="demo" href="#"><?php echo $header_button_text; ?></a>

				<a href="#" id="go_to_stats" onclick="ga('send', 'event', 'demo', 'request', 'home page');" class="more"><img width="50" src="<?php echo $more_image['url']; ?>" /></a>

		</div>
</header>

<?php

	$stats_background = get_field( 'stats_background', 'option' );
	$stats_description = get_field( 'stats_description', 'option' );
	$stats = get_field( 'stats', 'option' );
	$stats_more = get_field( 'stats_more', 'option' );

?>

<section class="stats" style="background: #262626 url('<?php echo $stats_background['url']; ?>') left top no-repeat;">

    <div class="row">

        <h3><?php echo $stats_description; ?></h3>

        <?php

            $n = 1;

            foreach( $stats as $stat ) {

                if( $n % 2 == 0 ) {
                    $class = 'floatleft';
                } else {
                    $class = 'floatright';
                }

                ?>

                    <div class="stat" style="background-color: <?php echo $stat['background_color'] ?>">

                        <?php if( $stat['pink_dot_text'] != '' ) { ?>

                            <div class="pinkdot <?php echo $class; ?>">
                                <h5><?php echo apply_filters( 'the_content', $stat['pink_dot_text'] ) ?></h5>
																<?php echo apply_filters( 'the_content', $stat['pink_dot_text_bottom'] ) ?>
                            </div>

                        <?php } else { ?>

                            <div class="stat_copy <?php echo $class; ?>">
                                <div class="left_text">
									<?php echo apply_filters( 'the_content', $stat['left_text'] ) ?>
                                </div>
                                <div class="right_text">
									<?php echo apply_filters( 'the_content', $stat['right_top_text'] ) ?>
									<?php echo apply_filters( 'the_content', $stat['right_bottom_text'] ) ?>
                                </div>
                            </div>

                        <?php } ?>

                    </div>

                <?php

                $n++;

            }

        ?>

        <div class="clear"></div>

        <?php /* <a href="#" class="stats_more"><img width="30" src="<?php echo $stats_more['url']; ?>" /></a> */ ?>

    </div>

</section>

<?php

	$service_background = get_field( 'service_background', 'option' );
	$services_title = get_field( 'services_title', 'option' );
	$services = get_field( 'services', 'option' );
	$header_button_text = get_field( 'header_button_text', 'option' );

?>

<section class="services" style="background: #03475D url('<?php echo $service_background['url']; ?>') left top no-repeat;">

	<div class="row">

		<h3><?php echo $services_title; ?></h3>

		<div class="services_holder">

			<?php

				foreach( $services as $service ) {

					?>

						<div class="service">
							<div class="s_logo"><img src="<?php echo $service['icon']['url']; ?>" /></div>
							<div class="s_desc">
								<h4><?php echo $service['title']; ?></h4>
								<?php echo apply_filters( 'the_content', $service['description'] ); ?>
							</div>
						</div>

					<?php

				}

			?>

			<div class="clear"></div>

		</div>

		<a class="demo" onclick="ga('send', 'event', 'demo', 'request', 'speciality');" href="#"><?php echo $header_button_text; ?></a>

		<div class="clear"></div>

	</div>

</section>

<?php

	$contact_background = get_field( 'contact_background', 'option' );
	$contact_description = get_field( 'contact_description', 'option' );

?>

<section class="contact" style="background: url(<?php echo $contact_background['url']; ?>) left top no-repeat;">

	<div class="row">

		<div class="left">
			<?php echo apply_filters('the_content', $contact_description); ?>
		</div>

		<div class="right">
			<form id="contact_form">
				<div class="form_row">
					<label>Name*</label>
					<input type="text" name="ano_name" id="ano_name" />
				</div>
				<div class="form_row">
					<label>Company*</label>
					<input type="text" name="ano_company" id="ano_company" />
				</div>
				<div class="form_row">
					<label>Email*</label>
					<input type="text" name="ano_email" id="ano_email" />
				</div>
				<div class="form_row">
					<label>Contact Number*</label>
					<input type="text" name="ano_contact_number" id="ano_contact_number" />
				</div>
				<div class="form_row">
					<label>Message*</label>
					<textarea rows="7" name="ano_message" id="ano_message"></textarea>
				</div>
                <div class="form_row">
                    <input onclick="ga('send', 'event', 'demo', 'request', 'submit');" type="submit" value="SUBMIT" />
                </div>
			</form>
		</div>

		<div class="clear"></div>

	</div>

</section>

<?php get_footer(); ?>
