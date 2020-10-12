<?php $isLiveAccount = true; ?>
<?php  include('file/header.php');?>
<?php  include('file/menus.php');?>
        <h4 style="text-align:center">Open instaforex insurance Live Account:</h4>

      <iframe id="frame" style='width: 100%;margin:0px auto;border:0px solid silver;'
src="https://secure.instaforex.com/en/partner_open_account.aspx?x=BEPI&width=580&showlogo=true&color=red&host=http://instaindia.in/liveaccount.php" style="padding:0; margin:0" scrolling="no" onload="var th=this; setTimeout(function() {var h=null;if (!h) if (location.hash.match(/^#h(\d+)/)) h=RegExp.$1;if (h) th.style.height=parseInt(h)+70+'px';}, 10);"
></iframe>

<script>
function H() {
$('#frame').contents().find('#LogoImageLink').hide();    
}
setTimeout("H()",1000);

</script>
         <!-- end section-white -->

<?php  include('file/footer.php');?>