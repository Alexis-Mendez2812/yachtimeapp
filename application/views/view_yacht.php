<?php //var_dump($gallery); ?>

   <style type="text/css">
       
        .yacht-modal {
          display: none;
          position: fixed;
          z-index: 1;
          padding-top: 100px;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: black;
          /*opacity: 0.5;*/
        }
        .yacht-modal-content {
          position: relative;
          margin: auto;
          padding: 0;
          width: 90%;
          max-width: 1200px;
        }
        .mySlides {
          display: none;
        flex-direction: column;
        align-items: center;          
        }
        /* Next & previous buttons */
        .prev,
        .next {
          cursor: pointer;
          position: absolute;
          top: 50%;
          width: auto;
          padding: 16px;
          margin-top: -50px;
          color: white;
          font-weight: bold;
          font-size: 20px;
          transition: 0.6s ease;
          border-radius: 0 3px 3px 0;
          user-select: none;
          -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
          right: 0;
          border-radius: 3px 0 0 3px;
        }
        .close {
          color: white;
          /*position: absolute;*/
          top: 10px;
          right: 25px;
          font-size: 35px;
          font-weight: bold;
          opacity: 1 !important;
        }

        .close:hover,
        .close:focus {
          color: #999;
          text-decoration: none;
          cursor: pointer;
        }
   </style>
 
<div id="yacht" class="yacht-main" style="opacity: 1;">
    <div class="yacht-main__background"></div>
    <span style="background-image: url(<?php echo base_url().'uploads/gallery/'.$yacht['featured']?>" class="yacht-main__image" role="img" aria-label="32' Wellcraft Martinique Wellcraft Martinique luxury charter yacht - Belmont Harbor South, North Lake Shore Drive, Chicago, IL, USA"></span>
        <div class="yacht-main__content">
            <div class="yacht-main__top">
                <a href="../" class="yacht-main__back">
                    <svg height="16" width="24.615384615384617" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 13">
                        <g stroke="#fff" fill="none" fill-rule="evenodd" stroke-linecap="round">
                            <path d="M.5 6.5h19M.5 6.5L6.2.8M.5 6.5l5.7 5.7"></path>
                        </g>
                    </svg>
                </a>
                <div class="yacht-actions-menu">
                    <div class="share">
                        <button class="share__action ant-dropdown-trigger" title="Share" aria-label="Share">
                            <svg height="24" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 24">
                                <g fill="none" fill-rule="evenodd">
                                    <path fill="#fff" d="M17 10h-2.714a.5.5 0 1 1 0-1H18v14.502H0V9h3.714a.5.5 0 1 1 0 1H1v12.502h16V10z" fill-rule="nonzero"></path>
                                    <path stroke="#fff" d="M9 14V1M5.959 4.041L9 1M12.041 4.041L9 1" stroke-linecap="round"></path>
                                </g>
                            </svg>
                            <span class="share__action-label">Share</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="yacht-main__middle">
                <p class="yacht-main__address">
                    <span class="yacht-main__id"><?php printf("ID %s",$yacht['id']) ?></span>
                </p>
            <div>
                <h1 class="yacht-main__name"><?php printf("%s' %s",$yacht['length'], $yacht['brand']) ?></h1>
                <small class="yacht-main__small-id">ID 1394</small>
            </div>
            <div class="yacht-main__details">
                
            </div>

            <?php  //var_dump( $profile);   //
            if($this->session->userdata('id_profile') == null):?>
            <div class="yacht-broker-contact">
                <div class="membership-join-button">
                    <a type="button" id="membership-join-button" href="<?php echo base_url()?>index.php/home/membership" class="ant-btn membership-join-button__button">
                        <span>Membership</span>
                    </a>
                </div>
            </div>
            <?php  elseif($this->session->userdata('id_profile') == $yacht['fid_owner']): ?>
            <div class="yacht-broker-contact">
                <div class="membership-join-button">
                    <a type="button" id="membership-join-button" href="<?php echo base_url()?>index.php/owner/dashboard" class="ant-btn membership-join-button__button">
                        <span>View Chats</span>
                    </a>
                </div>
            </div>
            <?php else: ?>
            <div class="yacht-broker-contact">
                <button id="chat" type="button" data-chat="<?php echo $yacht['fid_owner']?>" class="chat ant-btn yacht-broker-contact__button ant-btn-background-ghost chat">
                    <span>Send a message</span>
                </button>
            </div>
            <?php  endif; ?>

        </div>
    </div>
</div>

<div class="yacht__content">
    <div class="yacht-features" id="yachtFeatures">
<p class="yacht-features__description yacht-features__description--desktop"><?php printf("%s",$yacht['description']) ?></p>
<p
    class="yacht-features__description yacht-features__description--mobile">The Sea Ray 54 provides ample space for entertainment and fun! Amazing sound system, and full wet bar complete with ice ...<a role="button" class="yacht-features__read-more">read more</a></p>
        <div class="yacht-features__sections">
            <div class="yacht-features__section">
                <h2 class="yacht-section-title">Specs</h2>
                <ul class="yacht-features__list">
                    <li class="yacht-features__item">Builder: <?php printf("%s",$yacht['brand']) ?></li>
                    <li class="yacht-features__item">Year: <?php printf("%s",$yacht['year']) ?></li>
                    <li class="yacht-features__item">Length: <?php printf("%s",$yacht['length']) ?></li>
                    <li class="yacht-features__item">Beam: <?php printf("%s",$yacht['beam']) ?></li>
                    <li class="yacht-features__item">Guests: <?php printf("%s",$yacht['guest']) ?></li>
                    <li class="yacht-features__item">Cabins: <?php printf("%s",$yacht['cabins']) ?></li>
                    <li class="yacht-features__item">Toilets: <?php printf("%s",$yacht['toilets']) ?></li>
                    <li class="yacht-features__item">Draft: <?php printf("%s",$yacht['draft']) ?></li>
                    <li class="yacht-features__item">Speed: <?php printf("%s Knots",$yacht['speed']) ?></li>
                </ul>
            </div>
            <div class="yacht-features__section">
                <h2 class="yacht-section-title">Features</h2>
                <ul class="yacht-features__list">
                    <li class="yacht-features__item">Miscellaneous Floats</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="yacht-gallery">


        <div class="yacht-modal" id="yacht-modal">
                    
            <div class="yacht-modal-content">
                <span class="close cursor" onclick="closeModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </span>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>   
                <?php 
                $count = 0;
                $limit = 3;
                foreach ($gallery  as $key => $value):   
                ?>
                <div class="mySlides">
                    <img src="<?php echo base_url();?>/uploads/gallery/thumbs/<?php echo $value->image; ?>" style="width:50%">
                </div>
                <?php
                $count++;
                endforeach; ?>

                <!-- Next/previous controls -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        
            </div>
        </div>


        <h2 class="yacht-section-title">Photo Gallery</h2>
        <div class="yacht-gallery__content">

        <?php 
        $count = 0;
        $limit = 3;

        if(!empty($gallery)):

            foreach ($gallery as $key => $value):
                if($count<$limit):    
            ?>


               
            <div role="button" class="yacht-gallery__image-wrapper" onclick="openModal();currentSlide('<?php echo $count+1 ?>');">
                <div class="yacht-gallery__image" style="background-image: url('<?php echo base_url()?>/uploads/gallery/thumbs/<?php echo $value->image; ?>');"></div>
            </div>


            <?php
                $count++;
                endif;
            endforeach;
                if($count == 3):
                ?>





                <div role="button" class="yacht-gallery__image-wrapper">

                    <div class="yacht-gallery__image" style="background-image: url('<?php printf("%sassets/images/upload/%s",base_url(), $gallery[$count]['photo']) ?>');"></div>
                        
                        <span class="yacht-gallery__cover">
                            <div onclick="openModal();currentSlide('<?php echo $limit+1?>');">
                                <?php $label = ''; if($count > $limit-1){$labelcount = $count - $limit;printf("+ %s", $labelcount+1);}
                                ?>
                            </div>
                        </span>  
                </div>            
                <?php
                endif;
        endif;?>



        </div>
    </div>       
</div>

<div class="yacht__membership">
         
    <?php 
    $this->load->view('chat/view-chat-user');
    $this->load->view('banner-membership');
    ?>
</div>

</div>

<script type="text/javascript">
    
$(document).ready(function(){ });



    // Open the Modal
    function openModal() {
      document.getElementById("yacht-modal").style.display = "block";
      document.getElementById('body').style.overflow = 'hidden';
    }
    function closeModal() {
         document.getElementById('body').style.overflow = 'auto';
        document.getElementById("yacht-modal").style.display = "none";
    }    
  
    var slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        //var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        /*for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }*/

        slides[slideIndex-1].style.display = "flex";
        /*dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;*/
    }
</script>