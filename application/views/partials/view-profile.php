
    <div><?php printf("<h1>Profile</h1>"); ?></div> 
    <form class="form" style="/*padding-left: 10%;  padding-right: 10%*/" enctype="multipart/form-data" action="" method="POST">
        <div class="col-sm-3">
            <!--left col-->

            <div class="text-center">
                <div class="clearfix"></div> 
                <img id="profile_img" <?=isset($profile['photo']) ? 'src="'.base_url().'uploads/gallery/'.$profile['photo'].'"' :'' ?> style="width:192px; height: 192px;" class="featured avatar img-circle img-thumbnail" alt="avatar" />
                <h6>Upload a different photo...</h6>
                <div class="form-group">

                  <label>Upload Featured Images</label>
                  <input type="file" name="input_profile" id="photo-profile" onchange="loadProfile(event)">
                  <input type="hidden" class="form-control" name="featured_file" id="old_document" value="<?php echo isset($record->featured) ? $record->featured : ''; ?>" />
                </div> 
            </div>
        </div>
        <!--/col-3-->
        <div class="col-md-8">

            <div class="col-md-6">

                <div class="form-group">
                        <label for="first_name"><h4>First Name</h4></label>
                        <input type="text" value="<?php echo $profile['name'] ?>" class="form-control" name="input_name" placeholder="first name" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name"><h4>Last Name</h4></label>
                    <input type="text" value="<?php echo $profile['last_name'] ?>" class="form-control" name="input_last" placeholder="last name"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name"><h4>Birthdate</h4></label>
                    <input type="text" value="<?php echo $profile['birthdate'] ?>" class="form-control" name="input_birthdate" placeholder="Birthdate"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name"><h4>Phone</h4></label>
                    <input type="text" value="<?php echo $profile['phone'] ?>" class="form-control" name="input_phone" placeholder="phone"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name"><h4>Email</h4></label>
                    <input type="text" value="<?php echo $profile['email'] ?>" class="form-control" name="input_email" placeholder="email"/>
                </div>
            </div>

        </div>
           <div class="form-group">
                <div class="col-xs-12">
                    <br />
                    <input type="hidden" name="process" value="true">
                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                </div>
            </div>        
        <!--/tab-content-->
    </form>
    <script type="text/javascript">
        var loadProfile = function(event) {
            var output = document.getElementById('profile_img');
            output.src = URL.createObjectURL(event.target.files[0]);
        };        
    </script>

