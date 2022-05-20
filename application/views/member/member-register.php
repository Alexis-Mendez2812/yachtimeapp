<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link href="<?php echo base_url()?>assets/css/member.css" rel="stylesheet">
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.maskedinput.js"></script>
<script src="<?php echo base_url()?>assets/js/member.js"></script>
<div class="container">
  
  <div class="row dashboard" style="display: flex !important; flex-direction: column !important;width: 100%;">


    
    <link href="<?php echo base_url()?>assets/css/subscription.css" rel="stylesheet">

        <div class="content-form">
          <h3>Create Account</h3>
          <div class="col-md-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <form action="" method="post">
                  <input type="hidden" name="register" value="1"/>
                  <div class="form-outline mb-4">

                    <input type="text" name="input_name" placeholder="Name" value="<?php echo set_value('input_name');?>" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example1cg">Your Name <?php echo form_error('input_name'); ?></label>

                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" name="input_last" placeholder="Last Name" value="<?php echo set_value('input_last');?>" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example1cg">Your Last Name <?php echo form_error('input_last'); ?></label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" name="input_birthdate" id="datepicker" value="<?php echo set_value('input_birthdate');?>" placeholder="YYYY/MM/DD" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example1cg">Your Birthdate <?php echo form_error('input_birthdate'); ?></label>
                  </div>                  
                  <div class="form-outline mb-4">
                    <input type="text" name="input_phone" id="phone" value="<?php echo set_value('input_phone');?>" placeholder="Phone Number" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example1cg">Your Phone Number <?php echo form_error('input_phone')?></label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" name="input_email" placeholder="Email" value="<?php echo set_value('input_email');?>" class="form-control form-control-lg alpha-no-spaces" />
                    <label class="form-label" for="form3Example3cg">Your Email <?php echo form_error('input_email'); ?></label>
                  </div>

                  <div class="form-outline mb-4"> 
                    <input type="password" name="input_password" placeholder="Password" value="<?php echo set_value('input_password');?>" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example4cg">Password</label>
                    <?php echo form_error('input_password'); ?>
                  </div>
                  <div class="form-outline mb-4"> 
                    <input type="password" name="input_repeat" placeholder="Repeat password" value="" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                    <?php echo form_error('input_repeat'); ?>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="" name="checkbox_terms" type="checkbox" value="1" id="form2Example3cg" />
                    <label class="form-check-label" for="form2Example3g">
                      I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center">
                    <button type="submit"
                      class="btn btn-primary btn-block btn-lg gradient-custom-4 text-body">Register</button>
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="<?php echo base_url()?>index.php/home/login/"
                      class="fw-bold text-body"><u>Login here</u></a></p>

                </form>

              </div>
            </div>
          </div>

        </div>




  </div>
</div>    