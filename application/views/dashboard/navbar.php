<?php $home_active = $title == 'Albums'? 'class="active"': ''; ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url()?>">CI Gallery</a>
    </div>
    <ul class="nav navbar-nav">
      <li <?=$home_active?> ><a href="<?php echo base_url() . "index.php/owner/"?>">Home</a></li>
    </ul>
  </div>
</nav>