<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(__DIR__.'/partials/header.php'); ?>
<?php //include(__DIR__.'/dashboard/navbar.php'); ?>




	<?php 
		if($title == 'Home') include(__DIR__.'/partials/view-home.php'); //if($title == 'Owner') include(__DIR__.'/owner/view-home.php');
		elseif($title == 'Yacht/Add') include(__DIR__.'/owner/yacht-form.php');
		elseif($title == 'Yacht/Edit') include(__DIR__.'/owner/yacht-form.php');		
		elseif($title == 'Profile/Edit') include(__DIR__.'/partials/view-profile.php');
		elseif($title == 'Profile/password') include(__DIR__.'/partials/view-setting.php');
	?>

<?php include(__DIR__.'/partials/footer.php'); ?>


