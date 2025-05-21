<?php
if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {
	include '../res/x5engine.php';
	$form = new ImForm();
	$form->setField('Name', $_POST['imObjectForm_1_1'], '', false);
	$form->setField('Choose', $_POST['imObjectForm_1_2'], '', false);
	$form->setField('E-Mail ID', $_POST['imObjectForm_1_3'], '', false);
	$form->setField('Contact for', $_POST['imObjectForm_1_4'], '', false);
	$form->setField('If other Define your Issue', $_POST['imObjectForm_1_5'], '', false);

	if(@$_POST['action'] != 'check_answer') {
		if(!isset($_POST['imJsCheck']) || $_POST['imJsCheck'] != 'jsactive' || (isset($_POST['imSpProt']) && $_POST['imSpProt'] != ""))
			die(imPrintJsError());
		$form->mailToOwner($_POST['imObjectForm_1_3'] != "" ? $_POST['imObjectForm_1_3'] : 'cusms@chitkara.edu.in', 'cusms@chitkara.edu.in', 'New Email arrive from Website', '', true);
		$form->mailToCustomer('Admin@CUSMS.edu.in', $_POST['imObjectForm_1_3'], 'Welcome to CUSMS', 'Dear User,


Welcome to our Website, Kindly confirm your email by clicking on below Link:', true);
		@header('Location: ../home.html');
		exit();
	} else {
		echo $form->checkAnswer(@$_POST['id'], @$_POST['answer']) ? 1 : 0;
	}
}

// End of file