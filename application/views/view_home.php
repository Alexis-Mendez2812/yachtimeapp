<span class="charter-location-details" style="background-image: url('<?php echo base_url()?>assets/images/fondo_yacht_2.jpg');" role="img">
  <span class="charter-location-details__mask"></span>
  <div class="cover-section__content">
    <?php $this->load->view('search'); ?>
  </div>
</span>

<div class="yacht-list">
  <div class="search-results__wrapper">
    <?php 

    if( is_array($yachts) ): ?>
      
      <?php 

        foreach ($yachts as $item):
          if( !empty($item['featured']) ): 
      ?>
      <div class="image-card charter__product-card">
          <a id="1" role="button" href="<?php printf("%sindex.php/home/yacht/?id=%s",base_url() , $item['id']); ?>" class="image-card__item">
              <div class="image-card__background image-card__background--product"></div>
              <span class="image-card__image image-card__image--product image-card__image--loaded" title="" style="background-image: url('<?php echo base_url().'uploads/gallery/'.$item['featured']?>');"
                  role="img" aria-label=""></span>
              <div class="product-card">
                  <div class="product-card__details">
                      <span class="product-card__name"><?php printf("%s' %s", $item['length'], $item['brand']); ?></span>
                  </div>
              </div>
          </a>
      </div>
      <?php
          endif;
        endforeach ?>
      
    <?php endif; ?>    
  </div>
</div>



<div class="yacht__content">
  <div class="yacht__staff">
    <h2 class="yacht-section-title yacht-section-title--mobile-padding">Yachtimeapp's Crew
</h2>
    <?php $this->load->view('yacht-staff');?>
  </div>
</div>




<div class="yacht__content">

  <div class="yacht-location">
    <h2 class="yacht-section-title yacht-section-title--mobile-padding">Contact</h2>


      <div class="yacht__contact__wrapper">
      
        <div class="yacht__contact__item">
          <div>
            <a href="https://www.google.com/maps/place/Yachtime+Miami/@25.7956208,-80.2552454,15.58z/data=!4m5!3m4!1s0x0:0x6c3c779175916b87!8m2!3d25.7949961!4d-80.2501228">
              <img src="<?php echo base_url()?>assets/images/map_contact.jpg" style="float: left;padding: 3px;">
            </a>
            <div style="width: 400px;margin-top: 7px;">
              +1 7867212525 <br>
              3300 NW 21st St, Miami, FL 33142<br>
              Estados Unidos              
            </div>

          </div>
           <div>
             
           </div>
          
        </div>

      </div>

  </div>

  <div class="yacht__membership">
      <?php $this->load->view('banner-membership');?>
  </div>

</div>