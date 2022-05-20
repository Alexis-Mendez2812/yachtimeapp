<section class="row">


<div class="col-xs-12">

        <!-- User profile -->
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="profile__avatar">
              <img src="<?php echo base_url()?>uploads\gallery/<?php echo isset($profile['photo']) ?$profile['photo']:'John-Doe.png'; ?>" alt="...">
            </div>

            <div class="profile__header">
                <h4><?php  printf("%s %s", $profile['name'], $profile['last_name']);?>
                    <small>
                        <?php echo "ID " . $profile['id_user']; ?>
                        <?php echo $profile['active'] == '1'? 'Member Active':' Member Inactive' ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill <?php echo $profile['active'] == '1'? 'account-active':' Member Inactive' ?>" viewBox="0 0 16 16">
                          <circle cx="8" cy="8" r="8"/>
                        </svg>                        
                    </small>
                </h4>
              <p class="text-muted"><?php printf("Birthdate: %s ", $profile['birthdate']) ?></p>
              <p class="text-muted"><?php printf("Phone: %s ", $profile['phone']) ?></p>
              <p class="text-muted"><?php printf("Email: %s ", $profile['email']) ?></p>
            </div>
          </div>
        </div>

</div>

    <?php if($type == 'Owner'){ ?>    
    <h1> My Yacht's</h1>
    <?php
    
    if (isset($yachts) && !empty($yachts)) {
        foreach($yachts as $key => $value) { ?>

            <article class="col-xs-12 col-sm-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="<?php echo base_url().'index.php/home/yacht/?id='.$value->id?>" title="<?php echo $value->brand?>" class="zoom">
                            <img class="thumb" src="<?php echo base_url().'uploads/gallery/'.$value->featured?>" alt="<?php echo $value->brand?>" />
                            <span class="overlay">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </div>
                    <div class="panel-footer" style=" position: absolute;background-color: transparent !important;">
                        <h4>
                            <a href="<?php echo base_url().'index.php/owner/yacht/edit/'.$value->id?>" title="<?php echo $value->brand?>">
                            <?php printf("%s %s",  $value->length,  $value->brand)/*echo $value->brand*/;?></a>
                        </h4>
                        <span style="float: right">
                            <a class="btn btn-default btn-xs" href="<?php echo base_url().'index.php/owner/yacht/edit/'.$value->id?>" aria-label="Edit">
                                <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
                            </a>
                            <a class="btn btn-danger btn-xs" href="<?php echo base_url().'index.php/owner/yacht/deactivate/'.$value->id?>" aria-label="Delete">
                                <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </article>
        <?php } 
    } else { ?>   
        <h2 class="page-title">No Yacht Found!</h2>
    <?php }
    }?>                                         

</section>

<?php 
    $this->load->view('chat/view-chat-dashboard');
?>
