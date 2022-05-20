<?php 
  $currentURL = current_url();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

    <link href="<?php echo base_url()?>assets/css/menu.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>    
    <script src="<?php echo base_url()?>assets/js/app.js"></script>    
  </head>
  <body class="yachtimeapp" id="body">
    <header class="header-mobile" id="header">


        <div class="header-container">
            <div class="header-mobile__options header-mobile__options--left">
              <a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>assets/images/logo-yachtime-1.png" alt="Yachtlife" class="header__logo"></a>
          </div>

          <div class="header-mobile__options header-mobile__options--rigth">
            <div class="burger">
              <span></span>
            </div>
            <nav>

              <ul class="main header-public-sidebar__options">
                <li>
                  <a role="button" class="close header-public-sidebar__option header-public-sidebar__option--close">
                    <svg class="" height="24" width="24" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                      <path d="M0 0h24v24H0z" fill="none"></path>
                    </svg>
                  </a>           

                </li>
                <li class="login-li"><a class="header-public-sidebar__option" href="<?php echo base_url()?>index.php/home/login">
                Login
              </a></li>
                <li><a href="<?php echo base_url()?>" class="header-public-sidebar__option">Home</a></li>
                <li><a href="<?php echo base_url()?>index.php/home/membership" class="header-public-sidebar__option">Membership</a></li>
                <li><a href="https://www.facebook.com/Yatchtimeapp-104930065485155/" class="header-public-sidebar__option">Facebook</a></li>
                <li><a href="https://instagram.com/yatchtimeapp?igshid=YmMyMTA2M2Y=" class="header-public-sidebar__option">Instagram</a></li>
              </ul>
              <ul class="main header-public-sidebar__options">
                <li><a class="header-public-sidebar__option" href="#0">About Us</a></li>
                <li><a href="<?php echo base_url()?>index.php/home/contact" class="header-public-sidebar__option">Contact Us</a></li>
                <li><a href="<?php echo base_url()?>index.php/home/terms" class="header-public-sidebar__option">Terms of Service</a></li>
                <li><a href="#" class="header-public-sidebar__option">Privacy Policy</a></li>
              </ul>



            <div class="header-public-sidebar__bottom">
                <div class="header-public-sidebar__applinks"><a href="#" target="_blank" rel="noopener noreferrer" class="header-public-sidebar__applink"><img src="https://d27a8uzrgi1f0a.cloudfront.net/images/badges/badge_appstore.svg" alt="downloadOnTheAppStore" class="header-public-sidebar__applink-badge"></a>
                    <a
                        href="#" target="_blank" rel="noopener noreferrer" class="header-public-sidebar__applink"><img src="https://d27a8uzrgi1f0a.cloudfront.net/images/badges/badge_playstore.svg" alt="getItOnGooglePlay" class="header-public-sidebar__applink-badge"></a>
                </div>
            </div>

            </nav>            
          </div>          
        </div>
    </header>

    <header class="header" id="header">
        <div class="header-container">
          <a role="button" href="<?php echo base_url()?>" rel="noopener noreferrer" class="header__logo-link">
            <img src="<?php echo base_url()?>assets/images/logo-yachtime-1.png" alt="Yachtlife" class="header__logo">
          </a>
            <div class="header__options">
              <a role="button" href="<?php echo base_url()?>" title="Yacht" class="header__link header__link--selected">Home</a>
              <a role="button" href="<?php echo base_url()?>index.php/home/membership" title="Membership" class="header__link">Membership</a>
              <a role="button" href="<?php echo base_url()?>index.php/home/contact" title="Contact Us" class="header__link">Contact Us</a>              
              <!-- <a role="button" href="/" title="Download the App" class="header__link">Download App</a> --> 
              <a role="button" href="https://www.facebook.com/Yatchtimeapp-104930065485155/" title="Facebook" class="header__link">Facebook</a>
              <a role="button" href="https://instagram.com/yatchtimeapp?igshid=YmMyMTA2M2Y=" title="Instagram" class="header__link">Instagram</a>
              <?php  

              if($this->session->userdata('id_profile') != null){

                if($this->user_model->type_user($this->session->userdata('id_profile'),'Member')){
                   printf('<a role="button" href="%sindex.php/member/" title="Login" class="header__link">Member</a>', base_url());
                }elseif($this->user_model->type_user($this->session->userdata('id_profile'),'Owner')){
                    printf('<a role="button" href="%sindex.php/owner/dashboard/" title="Login" class="header__link">Owner</a>', base_url());
                }
                
              }else{
                printf('<a role="button" href="%sindex.php/home/login/" title="Login" class="header__link">Login</a>', base_url());
              }


              ?>
              
                

            </div>
        </div>
    </header>

    
  <div class="charter">