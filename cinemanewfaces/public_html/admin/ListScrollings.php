
 <?php 
       if (isset($_POST['deleteBtn'])) {
           $mysql->execute("delete from  _Scrollings where ScrollingID='".$_POST['photoid']."'");
           echo "<script>alert('deleted successfull');</script>";
       }
     $activemembsers= $mysql->select("select * from _Scrollings   "); 
 
     ?>
     
        <main id="main">
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>List of Scrollings</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-12" style="margin:0px auto;">
            <div class="well-middle">
            
<div class="row">
 <?php foreach($activemembsers as $mem) {?>
        <div class="col-sm-3" style="margin:15px;text-align:center;padding:10px">
            <div class="card-body"  style="text-align: center;border:1px solid #ccc;">
        <img src="../assets/profile/<?php echo $mem['ProfilePhoto'];?>" alt="" style="height:130px;width:100%">
        <br><br>
        <form action="" method="post">
        <input type="hidden" value="<?php echo $mem['ScrollingID'];?>" name="photoid"> 
        <input type="submit" value="Delete" name="deleteBtn" class="btn btn-danger btn-sm">
        </form>
        </div>
        </div>
 <?php } ?>
 </div>
 
 
     </div>
          </div>
        </div>
      </div>
    </div> 
     