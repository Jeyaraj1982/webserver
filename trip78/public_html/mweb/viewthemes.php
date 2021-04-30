<?php include_once("header.php");?>

        <!-- fullscreen menu ends -->

        <!-- page main start -->
        <style>
                 
                 div.scrollmenu {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
  min-width:100%;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}
.divactive {
     background-color: #777;
}

         
 
                 </style>
                 
        <div class="page" >
            <form class="searchcontrol">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="input-group-text close-search"><i class="material-icons">keyboard_backspace</i></button>
                    </div>
                    <input type="email" class="form-control border-0" placeholder="Search..." aria-label="Username">
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
                        Popular Packages
                </div>
                <div class="right">
                    <a href="javascript:void(0)" class="searchbtn"><i class="material-icons">search</i></a>
                    <!--<a href="javascript:void(0)" class="menu-right"><i class="material-icons">person</i></a>-->
                </div>
                 
            </header>
            <?php if ($i>2) {?>
           <script>
            var element = document.getElementById("tab<?php echo $_GET['tour'];?>");

//element.scrollIntoView();
//element.scrollIntoView(false);
//element.scrollIntoView({block: "end"});
//element.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
element.scrollIntoView({behavior: "smooth"});
           </script>
           <?php } ?>
            <div class="page-content" style="overflow:hidden">
                 
                 
                
                   
 

                  <div class="content-sticky-footer" style="padding-bottom: 0px !important;margin-top:10px">            
 
 
    
      <div class="row" style="padding:18px;padding-right: 18px;padding-top:0px;height:80vh; overflow: auto;">
             
             
                             
                
                <?php
$MostPopularTourPackages=array();
    $MostPopularTourPackages[] = array("TourThemeID"=>1,"PackageName"=>"Honeymoon","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/honeymoon_romantic.png?tr=w-365,h-260");
    $MostPopularTourPackages[] = array("TourThemeID"=>2,"PackageName"=>"Family","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/family.png?tr=w-365,h-260");
    $MostPopularTourPackages[] = array("TourThemeID"=>3,"PackageName"=>"Friends/Group","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/friends_group.png?tr=w-365,h-260");
    
    
    $MostPopularTourPackages[] = array("TourThemeID"=>4,"PackageName"=>"Solo","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/solo.png?tr=w-365,h-260");
    $MostPopularTourPackages[] = array("TourThemeID"=>5,"PackageName"=>"Adventure","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/adventure.png?tr=w-365,h-260");
    
    $MostPopularTourPackages[] = array("TourThemeID"=>6,"PackageName"=>"Nature","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/nature.png?tr=w-365,h-260");
    $MostPopularTourPackages[] = array("TourThemeID"=>7,"PackageName"=>"Religious","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/religious.png?tr=w-365,h-260");
    
    $MostPopularTourPackages[] = array("TourThemeID"=>7,"PackageName"=>"Wildlife","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/wildlife.png?tr=w-365,h-260");
    $MostPopularTourPackages[] = array("TourThemeID"=>7,"PackageName"=>"Water Activities","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/water+activities.png?tr=w-365,h-260");
?>
    <div class="row" style="padding:18px;padding-right: 18px;padding-top:0px">
        <?php foreach($MostPopularTourPackages as $TourPackage) {?>
        <div  class="col-6" style="margin-bottom:13px;padding-left: 5px;padding-right: 5px;" >
        <!--<a href="subtour.php?tour=<?php echo $tour['TourTypeID'];?>"><div style="background: #fff;padding:5px;border: 0px solid #222;">-->
            <a href="viewthemepackages.php?theme=<?php echo $TourPackage['TourThemeID'];?>&from=allthemes.php">
            <div style="background: #000;border: 0px solid #222;">
            <!--<div style="border-radius:5px 5px 0px 0px;position:absolute;top:0px;margin-right:5px;color:#fff;background:rgba(45, 156, 210, 0.8);width:-moz-available;font-size:14px;padding:3px 5px"><?php echo $tour['TourTypeName'];?></div>-->
            <div style="border-radius:5px 5px 0px 0px;position:absolute;top:0px;margin-right:5px;color:yellow;background:rgba(45, 156, 210, 0.8);width:-moz-available;font-size:14px;padding:3px 5px"><?php echo (($TourPackage['PackageName']));?></div>
                <img src="<?php echo $TourPackage['Image1'];?>" style="width:100%;margin:0px auto;border-radius:5px;">
            </div>
            </a>
            <!--<p><?php echo sizeof($mysql->select("select * from _tbl_tours_package where IsPublish='1' and TourThemeID='".$TourPackage['TourThemeID']."'"));?> Destinations</p>-->
        </div>
    <?php } ?>
            </div>
    
    
                </div>
   
   
 
</div>
      
                
                 
            </div>
         <?php include_once("footer.php"); ?> 