    <style>
        *, *:before, *:after {
            box-sizing: border-box;
        }

        .g-sign-in-button {
            /*margin: 10px;*/
            display: inline-block;
            width: 100%;
            height: 50px;
            background-color: #4285f4;
            color: #fff;
            border-radius: 1px;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
            transition: background-color .218s, border-color .218s, box-shadow .218s;
        }

        .g-sign-in-button:hover {
            cursor: pointer;
            -webkit-box-shadow: 0 0 3px 3px rgba(66, 133, 244, 0.3);
            box-shadow: 0 0 3px 3px rgba(66, 133, 244, 0.3);
        }

        .g-sign-in-button:active {
            background-color: #3367D6;
            transition: background-color 0.2s;
        }

        .g-sign-in-button .content-wrapper {
            height: 100%;
            width: 100%;
            border: 1px solid transparent;
        }

        .g-sign-in-button img {
            width: 18px;
            height: 18px;
        }

        .g-sign-in-button .logo-wrapper {
            padding: 15px;
            background: #fff;
            width: 48px;
            height: 100%;
            border-radius: 1px;
            display: inline-block;
        }

        .g-sign-in-button .text-container {
            font-family: Roboto,arial,sans-serif;
            font-weight: 500;
            letter-spacing: .21px;
            font-size: 16px;
            line-height: 48px;
            vertical-align: top;
            border: none;
            display: inline-block;
            text-align: center;
            width: 180px;
        }

</style>


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/login.css">
    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?php echo base_url()?>assets/images/backgroun_login.jpg');">
            <div class="wrap-login100 p-t-190 p-b-30">
                <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" class="login100-form validate-form">
                    
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                        <div class='g-sign-in-button'>
                            <div class=content-wrapper>
                                <div class='logo-wrapper'>
                                    <img src='https://developers.google.com/identity/images/g-logo.png'>
                                </div>
                                <span class='text-container'>
                              <span>Sign in with Google</span>
                            </span>
                            </div>
                        </div>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"> </span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-10" style="text-align: center;">                   
                        OR
                    </div>
                    <?php if(isset($error)):?>
                         <div style="display: flex;align-content: center;align-items: center;flex-direction: column;width: 100%;color: red;">Email or Password Incorrect</div>

                    <?php endif;?>
                    
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                        <input class="input100" type="text" name="input_email" placeholder="Email" value="<?php echo set_value('input_email') ?>">
                        <?php echo form_error('input_email'); ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"><i class="fa fa-user"></i></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                        <input class="input100" type="password" name="input_password" placeholder="Password">
                        <?php echo form_error('input_password'); ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"><i class="fa fa-lock"></i></span>
                    </div>                 
                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn">Login</button>
                    </div>

                    <div class="text-center w-full p-t-25">
                        <a href="#" class="txt1">Forgot Username / Password?</a>
                    </div>
                    <div class="text-center w-full">
    
                        <a class="txt1" href="<?php echo base_url()?>index.php/home/membership">Create new account<i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
