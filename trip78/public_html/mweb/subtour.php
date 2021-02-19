<?php include_once("header.php");?>
<div class="page">
    <form class="searchcontrol" action="search.php" method="get">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text close-search"><i class="material-icons">keyboard_backspace</i></button>
                    </div>
                    <input type="text" class="form-control border-0" name="s" id="s"  placeholder="Search..." aria-label="Username">
                </div>
            </form>
    <header class="row m-0 fixed-header">
                <div class="left">
                <?php
                     $tours = $mysql->select("select * from _tbl_tour   where TourTypeID='".$_GET['tour']."' and IsPublish='1' ");
                ?>
                    <a href="index.php"><i class="material-icons">keyboard_backspace</i></a>
                   <!-- <a href="javascript:void(0)" class="menu-left"><i class="material-icons">menu</i></a>-->                                                                                                          
                </div>
                <div class="col center">
                    <a href="" class="logo">
                        <!--<figure><img src="https://trip78.in/images/logo_footer.png" alt=""></figure>--><?php echo $tours[0]['TourTypeName'];?></a>
                </div>
                <div class="right">
                    <a href="javascript:void(0)" class="searchbtn"><i class="material-icons">search</i></a>
                    <!--<a href="javascript:void(0)" class="menu-right"><i class="material-icons">person</i></a>-->
                </div>
                <div class="scrollmenu">
                  <?php
                       $tours = $mysql->select("select * from _tbl_tour  where IsPublish='1' order by ListOrder");
                       $i=0;
                       foreach($tours as $tour) {
                           $i++;
                  ?>
  <a id="tab<?php echo $tour['TourTypeID'];?>" href="subtour.php?tour=<?php echo $tour['TourTypeID'];?>" <?php echo ($_GET['tour']==$tour['TourTypeID']) ? " class='divactive' " : "";?>><?php echo $tour['TourTypeName'];?></a>
  <?php } ?>
  <!--<a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>-->
 
</div>
            </header>
    <div class="page-content" style="overflow:hidden;height:70vh !important; overflow: auto;">
        <div class="content-sticky-footer" style="padding-bottom: 0px !important;margin-top:60px;padding-top:0px;">            
            <div class="row" style="padding:0px;padding-right:0px;margin-left:0px;margin-right:0px">
                    <?php
                        $stours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and TourTypeID='".$_GET['tour']."' order by SubTourTypeName");
                        foreach($stours as $stour) {
                            ?>
                                <div class="col-6" style="padding-right:0px;padding-left:0px;margin-bottom:5px;">
                                    <!--<a href="tourpackage.php?subtour=<?php echo $stour['SubTourTypeID'];?>"><div style="background: #fff;padding:5px;border: 0px solid #222;">-->
                                    <a href="tourpackage.php?subtour=<?php echo $stour['SubTourTypeID'];?>"><div style="background: #000;padding:5px;border: 0px solid #222;">
                                    <!--<div style="border-radius:5px 5px 0px 0px;position:absolute;top:0px;margin-right:5px;color:#fff;background:rgba(45, 156, 210, 0.8);width:-moz-available;font-size:14px;padding:3px 5px"><?php echo $stour['SubTourTypeName'];?></div>-->
                                    <div style="border-radius:5px 5px 0px 0px;position:absolute;margin-right:5px;color:yellow;background:rgba(45, 156, 210, 0.8);width:-moz-available;font-size:14px;padding:3px 5px"><?php echo $stour['SubTourTypeName'];?></div>
                                     <img src="https://www.trip78.in/uploads/<?php echo $stour['Image'];?>" style="width:100%;margin:0px auto;border-radius:5px;">
                                     </div>
                                     </a>
                                </div>
                            <?php
                        }
                    ?>
                </div>
        </div>
    </div>
<?php include_once("footer.php"); ?> 