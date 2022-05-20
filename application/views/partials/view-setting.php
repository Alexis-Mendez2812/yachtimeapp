    <div><?php printf("<h1>Profile</h1>"); ?></div> 
    <form class="form" style="/*padding-left: 10%;  padding-right: 10%*/" enctype="multipart/form-data" action="" method="POST">
        <!--/col-3-->
        <div class="col-md-8">

            <div class="col-md-8">

                <div class="form-group">
                        <label for="first_name"><h4>Old Password</h4></label>
                        <input type="text" value="" class="form-control" name="input_old" placeholder="Password" />
                        <?php echo form_error('input_old'); ?>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="first_name"><h4>New Password</h4></label>
                    <input type="text" value="" class="form-control" name="input_password" placeholder="New Password"/>
                     <?php echo form_error('input_password'); ?>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="first_name"><h4>Repeate Password</h4></label>
                    <input type="text" value="" class="form-control" name="input_repeat" placeholder="Repeat password"/>
                     <?php echo form_error('input_repeat'); ?>
                </div>
            </div>


        </div>
           <div class="form-group">
                <div class="col-xs-12">
                    <br />
                    <input type="hidden" name="password" value="true">
                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                </div>
            </div>        
        <!--/tab-content-->
    </form>

