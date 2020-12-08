<?php 
    include_once("header.php"); 
    
 if (!($_SESSION['USER']['userid']>0)) { 
        echo "Please login and continue post free ad";
 } else {
     
 if($_SESSION['USER']['isstaff']==0) {

    $emailverification_required=false;
    if ($_SESSION['USER']['userid']>3828) {
        $emailverification_required=true;
    }
    
    
   if ($emailverification_required)  {
   if($_SESSION['USER']['email']==""){
      echo " <script>location.href='https://www.klx.co.in/updateemail.php';</script>";   
      exit;
    } else if($_SESSION['USER']['isemailverified']==0) {
        echo " <script>location.href='https://www.klx.co.in/emailverification.php';</script>";  
        exit;
    }
    
   } 
    
 }   
?>
                                                                               
<div class="main-panel"  style="width: 100%;height:auto !important">                 
    <div class="container" style="margin-top:0px">  
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                <h3 style="text-align:center;">Post Ad</h3>                                        
                    <div class="card">
                        <div  class="card-body" id="ListDiv" style="padding:0px !important;">
                            <ul class="list-group list-group-bordered">
                            <?php foreach(JPostads::getCategory() as $category) { ?> 
                                <li class="list-group-item cursor-hand" style="display: block" onclick="subcategory('<?php echo $category['categid'];?>')">
                                <img src="<?php echo base_url;?><?php echo $category['imagepath'];?>" style="width:24px">&nbsp;&nbsp;
                                <?php echo $category['categname'];?> <!--<?php echo $category['categid'];?> -->
                                <i class="flaticon-right-arrow-4" style="float: right;"></i>  
                                </li>
                            <?php } ?> 
                            </ul>
                        </div>
                        <?php foreach(JPostads::getCategory() as $category) { ?> 
                        <div id="catid_<?php echo $category['categid'];?>" style="display: none;">
                            <ul class="list-group list-group-bordered">
                               <li class="list-group-item cursor-hand" style="display: block;color:blue" onclick="BackToMainCategory()">
                                     <i class="flaticon-left-arrow-4" style="float: left;"></i>&nbsp;  
                                     Back To Main Category
                                 </li>
                                <?php foreach(JPostads::getSubcategories($category['categid']) as $subcategory) { ?> 
                                     <li class="list-group-item cursor-hand" style="display: block" onclick="Postad('<?php echo $subcategory['subcateid'];?>')">
                                         <?php echo $subcategory['subcatename'];?><!--&nbsp;&nbsp; <?php echo $subcategory['subcateid'];?> -->
                                         <i class="flaticon-right-arrow-4" style="float: right;"></i>  
                                     </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                    
                </div>           
            </div>
        </div> 
    </div>
</div>   

   
<script>
var listdiv_content = document.getElementById("ListDiv").innerHTML;

function BackToMainCategory(){
    $("#ListDiv").html(listdiv_content);
}
function subcategory(category){
    $("#ListDiv").html($("#catid_"+category).html());
}
function Postad(subcategory){
    location.href="<?php echo country_url;?>postad/"+subcategory;
}
                                                                           
</script>
<?php  }   
 
 include_once("footer.php"); ?>