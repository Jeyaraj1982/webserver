<?php 
    include_once("header.php");
    
    $Products=array();
    
    $p = (isset($_GET['p'])) ? $_GET['p'] : 1;
    $s = (isset($_GET['s'])) ?  $_GET['s'] : 1;
        
    if ($s==1) {
        $q = " order by trim(ProductName) ";
    }
    
    if ($s==2) {
        $q = " order by trim(ProductName) desc ";
    }
        
    if (isset($_GET['category'])) {
        $count = $mysql->select("select count(*) as c from _tbl_products where CategoryID='".$_GET['category']."' and IsActive='1'"); 
        $Products = $mysql->select("select * from _tbl_products where CategoryID='".$_GET['category']."' and IsActive='1' ".$q." limit ".(($p-1)*JApp::WEB_PRODUCTS_PER_PAGE).", ".JApp::WEB_PRODUCTS_PER_PAGE); 
        $SubCategories = $mysql->select("select * from _tbl_sub_category where CategoryID='".$_GET['category']."' and IsActive='1'  order by SubCategoryName"); 
          $CateogryInfo = $mysql->select("select * from _tbl_category where CategoryID='".$_GET['category']."'"); 
          //$SubCateogry = $mysql->select("select * from _tbl_sub_category where SubCategoryID='".$SubCategories[0]['SubCategoryID']."'"); 
    }
    
    if (isset($_GET['subcategory'])) {
        $count = $mysql->select("select count(*) as c from _tbl_products where SubCategoryID='".$_GET['subcategory']."' and IsActive='1'"); 
        $SubCateogry = $mysql->select("select * from _tbl_sub_category where SubCategoryID='".$_GET['subcategory']."'"); 
        $CateogryInfo = $mysql->select("select * from _tbl_category where CategoryID='".$SubCateogry[0]['CategoryID']."'"); 
        $Products = $mysql->select("select * from _tbl_products where SubCategoryID='".$_GET['subcategory']."' and IsActive='1' ".$q." limit ".(($p-1)*JApp::WEB_PRODUCTS_PER_PAGE).", ".JApp::WEB_PRODUCTS_PER_PAGE); 
        $SubCategories = $mysql->select("select * from _tbl_sub_category where CategoryID='".$SubCateogry[0]['CategoryID']."' and IsActive='1'  order by SubCategoryName"); 
    }
    
?>
<style>
.active {color:#700f6a !important;font-weight:bold}
.page_navi {border:1px solid #ccc;padding:10px;text-align:center;margin-left:5px}
.page_nave_active {border:1px solid #444;padding:10px;text-align:center;margin-left:5px;background:#444;color:#fff}
</style>

<?php if (sizeof($Products)==0) { ?>
<div id="product-category" class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
               <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a><?php echo $CateogryInfo[0]['CategoryName'];?></a></li>
                <?php if (isset($SubCateogry[0]['SubCategoryName'])) {?>
                <li><a><?php echo $SubCateogry[0]['SubCategoryName'];?></a></li>
                <?php } ?>
            </ul>
            <div class="row">
                <div id="column-left" class="col-md-3 col-sm-4 col-xs-12">
                    <div class="list-group cateleft">
                        <?php foreach($SubCategories  as $subcategory) { ?>                                           
                            <a href="s<?php echo $subcategory['SubCategoryID']."_".parseStringForURL($subcategory['SubCategoryName']);?>" class="list-group-item <?php echo ($subcategory['SubCategoryID']==$_GET['sid']) ? 'active' :'';?>"><?php echo $subcategory['SubCategoryName'];?> (<?php echo sizeof($mysql->select("select CategoryID from _tbl_products where SubCategoryID='".$subcategory['SubCategoryID']."'  and IsActive='1'"));?>)</a> 
                        <?php } ?>
                    </div>
                </div>
                <div id="content" class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                      
             <div class="row cate-border" style="margin-top:0px;">
                        <div class="col-md-12" style="text-align: center;">
                             
                              No Products found.
                        </div>
                   
                     </div>
               </div>           
                </div>
            </div>
        </div>
    </div>
 
<?php } else { ?>
<?php
       $SubCategory = $mysql->select("select * from _tbl_sub_category where SubCategoryID='".$Products[0]['SubCategoryID']."'"); 
       $Category = $mysql->select("select * from _tbl_category where CategoryID='".$Products[0]['CategoryID']."'"); 
       $SubCategories = $mysql->select("select * from _tbl_sub_category where CategoryID='".$Products[0]['CategoryID']."' order by SubCategoryName");
       
       $total_page = 1;
       if ($count[0]['c']>JApp::WEB_PRODUCTS_PER_PAGE) {
           $total_page = intval($count[0]['c']/JApp::WEB_PRODUCTS_PER_PAGE);
           if (($count[0]['c']%JApp::WEB_PRODUCTS_PER_PAGE)>0) {
               $total_page++;
           }
       }
?>
<div id="product-category" class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a><?php echo $Category[0]['CategoryName'];?></a></li>
                <li><a><?php echo $SubCategory[0]['SubCategoryName'];?></a></li>
            </ul>
            <div class="row">
                <div id="column-left" class="col-md-3 col-sm-4 col-xs-12">
                    <div class="list-group cateleft">
                        <?php foreach($SubCategories  as $subcategory) { ?>                                           
                            <a href="s<?php echo $subcategory['SubCategoryID']."_".parseStringForURL($subcategory['SubCategoryName']);?>" class="list-group-item <?php echo ($subcategory['SubCategoryID']==$_GET['sid']) ? 'active' :'';?>"><?php echo $subcategory['SubCategoryName'];?> (<?php echo sizeof($mysql->select("select CategoryID from _tbl_products where SubCategoryID='".$subcategory['SubCategoryID']."'  and IsActive='1'"));?>)</a> 
                        <?php } ?>
                    </div>
                </div>
                <div id="content" class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                    <div class="row cate-border" style="margin-top:0px;">
                        <div class="col-md-8 col-sm-8 col-xs-3 catebt">
                            <div class="inspdes" style="border:none !important; padding:7px !important;padding-left:0px !important"> 
                                <h2 style="margin-bottom:0px;color:#700f6a;font-weight:bold;"><?php echo $SubCategory[0]['SubCategoryName'];?></h2>
                            </div>
                            <!--
                            <div class="btn-group-sm"> 
                                <button type="button" id="list-view" class="btn inslistgrid" data-toggle="tooltip" title="" data-original-title="List">
                                    <img src="image/catalog/category/list.png">
                                </button>
                                <button type="button" id="grid-view" class="btn inslistgrid active" data-toggle="tooltip" title="" data-original-title="Grid">
                                    <img src="image/catalog/category/grid.png">
                                </button> 
                            </div>
                            -->
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-5 col-sm-4 sorting">
                            <div class="input-group input-group-sm">
                                <label class="input-group-addon" for="input-sort" style="font-size:13px !important">Sort By:</label>
                                <select id="input-sort" class="form-control" onchange="location = '<?php echo WEB_URL.$_SERVER['REDIRECT_URL']."?s=";?>'+this.value;">
                                    <option value="0" >Default</option>
                                    <option value="1" <?php echo $s==1 ? 'selected=selected' : "";?>>Name (A - Z)</option>
                                    <option value="2" <?php echo $s==2 ? 'selected=selected' : "";?>>Name (Z - A)</option>
                                    <!--  
                                        <option value="price_asc">Price (Low &gt; High)</option>
                                        <option value="price_desc">Price (High &gt; Low)</option>
                                    -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row catebg">
                        <?php 
                            foreach($Products as $Product){  
                                include("include_product_widget.php")    ;
                            } 
                        ?>
                    </div>   
                    <div class="col-sm-12" style="text-align: right;padding-right: 4px;padding-top: 15px;">
                        <?php for($i=1;$i<=$total_page;$i++) { ?>
                            <a href="<?php echo WEB_URL.$_SERVER['REDIRECT_URL']."?p=".$i."&s=".$s;?>" class="<?php echo $i==$p ? 'page_nave_active' : 'page_navi' ;?>"><?php echo $i;?></a>
                        <?php } ?>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php include_once("footer.php");?>