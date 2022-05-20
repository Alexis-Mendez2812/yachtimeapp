<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<body class="home">
<head>
<link rel="stylesheet" href="<?php echo base_url()?>application/third_party/libs/css/bootstrap.min.css">
<script src="<?php echo base_url()?>application/third_party/libs/js/jquery-1.9.1.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/dashboard.css">
<script type="text/javascript">
	$(document).ready(function(){
	   $('[data-toggle="offcanvas"]').click(function(){
	       $("#navigation").toggleClass("hidden-xs");
	   });
	});
</script>
</head>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
            <div class="logo">
                <a hef="home.html"><img src="<?php echo base_url()?>assets/images/logo-yachtime-1.png" alt="" class="hidden-xs hidden-sm">
                    <img src="<?php echo base_url()?>assets/images/logo-yachtime-1.png" alt="" class="visible-xs visible-sm circle-logo">
                </a>
            </div>
            <div class="navi">
                <ul>
                    <li class="<?php echo $title == 'Home'?'active':''; ?>"><a href="<?php echo base_url()?>index.php/owner/dashboard"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                    <li class="<?php echo $title == 'Yacht/Add'?'active':''; ?>"><a href="<?php echo base_url()?>index.php/owner/yacht/create"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">New Yacht</span></a></li>
                    <li><a href="<?php echo base_url()?>index.php/owner/profile/password"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-10 col-sm-11 display-table-cell v-align">
            <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
            <div class="row">
                <header>
                    <div class="col-md-7">
                        <nav class="navbar-default pull-left">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                        </nav>
                    </div>
                    <div class="col-md-5">
                        <div class="header-rightside">
                            <ul class="list-inline header-top pull-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url()?>/assets/images/John-Doe.png" alt="user">
                                        <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="navbar-content">
                                                <span><?php echo $profile['name'] ?></span>
                                                <p class="text-muted small">
                                                    <?php echo $profile['email'] ?>
                                                </p>
                                                <div class="divider">
                                                </div>
                                                <a href="<?php echo base_url()?>index.php/owner/profile/edit/" class="view btn-sm active">View Profile</a>
                                                <a href="<?php echo base_url()?>index.php/owner/profile/password/" class="view btn-sm active">Setting</a>
                                                <a href="<?php echo base_url()?>index.php/owner/exitsession/" class="view btn-sm active">Logout</a>                                                
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>
            </div>
            <div class="user-dashboard">

               
                <div class="row">

                    <div class="col-md-5 col-sm-5 col-xs-12 gutter">

                        <div class="saless">
                            
                        </div>
                    </div>

                </div>
    


