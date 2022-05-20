<link href="<?php echo base_url()?>assets/css/chat-user.css" rel="stylesheet">
<script src="<?php echo base_url()?>assets/js/chat-user.js"></script>
<br>
<?php //var_dump($message) ?>

<section>
	<h1>Chats</h1>
<?php if( !empty($message)){?>
	<?php foreach ($message as $key => $value) { ?>
		<div class="chat" id="chat" data-chat="<?php echo $value->id_user?>">
			<img src="<?php echo base_url() . "/uploads/gallery/" . $value->photo ?>">
			<div class="chat-content" >
				<div class="name"><?php echo $value->name ."\n";  ?></div>
				<div class=""><?php echo $value->message ."\n";  ?></div>
				<div class="time"><?php echo date('h:i:s d-m-Y ', $value->time) ."\n";  ?></div>	
			</div>
		</div>
		
	<?php } ?>

<?php } ?>
</section>
<div data-pop="pop-in" id="popup">
    <div class="popupcontrols">
        <span id="popupclose">&times;</span>
    </div>
    <div class="popupcontent">

    <section class="chatbox">

        <section class="chat-window" id="messagewindow" data-user="<?php echo $profile['id_user']?>">

        </section>
        <form class="chat-input" id="chatform" onsubmit="return false;">
            <input type="hidden" name="id">
            <input type="text" id="input_message" autocomplete="on" placeholder="Type a message" />
            <button>
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="rgba(0,0,0,.38)" d="M17,12L12,17V14H8V10H12V7L17,12M21,16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V7.5C3,7.12 3.21,6.79 3.53,6.62L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.79,6.79 21,7.12 21,7.5V16.5M12,4.15L5,8.09V15.91L12,19.85L19,15.91V8.09L12,4.15Z" /></svg>
                </button>
        </form>
    </section>

    </div>
</div>
<div id="overlay"></div>