<?php

	class form {

		public function __construct(){
		}

		public function do_validate() {


			$arr_errors = array();

			foreach( $_POST as $key => $val ) {
				if( trim( $val ) == '' ) {
					$arr_errors[] = $key;
				}
			}

			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$arr_errors[] = 'email';
			}

			if( empty( $arr_errors ) ) {

				// send email
				$this->send_mail();

			} else {

				echo json_encode($arr_errors);
				exit;

			}

		}

		public function send_mail() {


			$to = $_POST['cEmail'];
			$subject = 'ARP Contact Form';
			$from = 'noreply@arp.co.za';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


			// get the email html for this specific event
			$message = '
            <table style="background: #fff" width="75%" cellpadding="0">
                <tr>
                    <td><img width="200" src="http://lightwell.co.za/arp/wp-content/themes/arp/assets/images/arp-logo.png" /></td>
                </tr>
            </table>

            <p>Hi,</p>

            <p>There has been a new contact request.</p>

            <p><strong>Details:</strong></p>

            <p>
                Name: '.$_POST['name'].'<br />
                Email: '.$_POST['email'].'<br />
                Contact Number: '.$_POST['contact'].'<br />
								Subject: '.$_POST['subject'].'<br />
                Message: '.$_POST['message'].'

            </p>

            <p>Kind Regards,<br />Website</p>
            ';

			mail($to, $subject, $message, $headers);

			echo json_encode( true );
			exit;

		}

	}
