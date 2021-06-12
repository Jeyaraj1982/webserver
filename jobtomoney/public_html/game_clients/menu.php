<?php if (isset($_SESSION['USER']['userid'])) { ?>
<div class="line">

    

    <div class="box margin-bottom" style="padding:15px;">
    
    <div class="row">
        <div class="col-sm-9" style="margin-bottom:5px;text-align:center">
            <a href="S2W_PlayGame" class="btn btn-danger btn-sm" style="color:#fff">Scratch 2 Win</a> 
            <a href="S2Win_PlayGame" class="btn btn-primary btn-sm" style="color:#fff">How To Play</a> 
            <a href="TBA_PlayGame" class="btn btn-danger btn-sm" style="color:#fff">Time Based</a> 
            <a href="M2W_PlayGame" class="btn btn-danger btn-sm" style="color:#fff">Match 2 Win</a> 
        </div>
        <div class="col-sm-3" style="text-align: right;margin-bottom:5px;">
        
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle btn-sm"   type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Menu
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" style="color:blue" href="usr_mypage">My Page</a>
    <a class="dropdown-item" style="color:blue" href="usr_accountsumary">Account Summary</a>
    <a class="dropdown-item" style="color:blue" href="usr_bidhistory">Bid History</a>
    <a class="dropdown-item" style="color:blue" href="AdMoney">Wallet Update</a>
    <a class="dropdown-item" style="color:blue"  href="Withdraw">Withdraw</a>
    <a class="dropdown-item" style="color:blue" href="usr_logout">Logout</a>
  </div>
</div>
        </div>
    </div>
    
     
         
 


    </div>
</div>  
<?php } ?>