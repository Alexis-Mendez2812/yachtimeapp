<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include(__DIR__.'/partials/header.php'); ?>
<?php// include(__DIR__.'/dashboard/navbar.php'); ?>
<?php 

	//var_dump($message);
	
?>
<body>


	<?php 
		if($title == 'Home') include(__DIR__.'/partials/view-home.php'); 
		elseif($title == 'Profile/Edit') include(__DIR__.'/partials/view-profile.php');
		elseif($title == 'Profile/password') include(__DIR__.'/partials/view-setting.php');		
		//if($title == 'Albums') include(__DIR__.'/templates/album.php'); 
		//elseif($title == 'Add/Edit Album') include(__DIR__.'/templates/album_form.php'); 
		//elseif($title == 'View Album') include(__DIR__.'/templates/view_album.php');


	?>
</body>
<?php include(__DIR__.'/partials/footer.php'); ?>
</html>

