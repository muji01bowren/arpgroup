<?php

	if( isset( $_POST['name'] ) ) {

		include('../classes/class.form.php');

		$form = new form;
		$form->do_validate();

	}

?>
