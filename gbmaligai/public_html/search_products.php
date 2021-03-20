<?php 
 
    include_once("header.php");
    
    
    
        $Products = $mysql->select("select * from _tbl_products where ProductName like '%".$_GET['search']."%' and IsActive='1'"); 
      
   
    
?>
<style>
.active {color:#700f6a !important;font-weight:bold}
</style>

<?php if (sizeof($Products)==0) { ?>
<div id="product-category" class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
             
            <div class="row">
                <div id="column-left" class="col-md-3 col-sm-4 col-xs-12">
                    <div class="list-group cateleft">
                        <?php foreach($SubCategories  as $subcategory) { ?>                                           
                            <a href="products.php?sid=<?php echo $subcategory['SubCategoryID'];?>" class="list-group-item <?php echo ($subcategory['SubCategoryID']==$_GET['sid']) ? 'active' :'';?>"><?php echo $subcategory['SubCategoryName'];?> (<?php echo sizeof($mysql->select("select CategoryID from _tbl_products where SubCategoryID='".$subcategory['SubCategoryID']."'  and IsActive='1'"));?>)</a> 
                        <?php } ?>
                    </div>
                </div>
                <div id="content" class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                     
                     No Products found.
                          
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
 

<div id="product-category" class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
           
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
                                <select id="input-sort" class="form-control" onchange="location = 'products.php?cid=<?php echo $_GET['cid'];?>'+this.value;">
                                    <option value="name_asc" selected="selected">Default</option>
                                    <option value="name_asc">Name (A - Z)</option>
                                    <option value="name_desc">Name (Z - A)</option>
                                    <option value="price_asc">Price (Low &gt; High)</option>
                                    <option value="price_desc">Price (High &gt; Low)</option>
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
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php include_once("footer.php");?>