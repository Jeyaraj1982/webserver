<?php 
    include_once("header.php");      
    if (isset($_GET['a']) && $_GET['a']>0) {
        $c = JPostads::getCategory($_GET['a']);    
    } else {
        $c = JPostads::getCategory($_GET['s']);               
    }
    
?>
                                                                               
<div class="main-panel"  style="width: 100%;height:auto !important">                 
    <div class="container" style="margin-top:0px">  
        <div class="page-inner">
            <div class="page-header">
             <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a>
                <ul class="breadcrumbs" style="border:none;margin-left:0px;padding-left:0px;">
                    <li class="nav-home">
                        <a href="<?php echo country_url;?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">                                            
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="index.php" >Home</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <?php echo $c[0]['categname'];?> 
                    </li>
                </ul>
            </div>                                            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div>
                            <ul class="list-group list-group-bordered">    
                            <?php foreach (JPostads::getSubcategories($_REQUEST['a']) as $r) { ?> 
                                <li class="list-group-item cursor-hand" style="display: block" onclick="viewads_subcategory('<?php echo $r['subcateid'];?>')">
                                <?php echo $r['subcatename'];?>
                                <i class="flaticon-right-arrow-4" style="float: right;"></i>  
                                </li>
                            <?php } ?> 
                            </ul>
                        </div>
                    </div>
                </div>           
            </div>
        </div> 
    </div>
</div>        
<?php include_once("footer.php"); ?>