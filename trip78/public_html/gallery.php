<?php
    $page = "gallery";
    include_once("header.php");
?>  
    <div class="site wrapper-content">
        <div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
            <div class="banner-wrapper container article_heading">
                <div class="breadcrumbs-wrapper">
                    <ul class="phys-breadcrumb">
                        <li><a href="index.php" class="home">Home</a></li>
                        <li>Gallery</li>
                    </ul>
                </div>
                <h1 class="heading_primary">Gallery</h1></div>
        </div>
        <section class="content-area">
            <div class="container">
                <div class="row">
                    <div class="site-main col-sm-12 full-width">
                        <div class="sc-gallery wrapper_gallery">
                            <div class="gallery-tabs-wrapper filters">
                                <ul class="gallery-tabs">
                                    <li><a href="#" data-filter="*" class="filter active">all</a></li>
                                    <?php
                                         $categories = $mysql->select("select * from _tbl_gallery_names where IsActive='1' order by GalleryName");
                                         foreach($categories as $category) {
                                    ?>
                                    <li><a href="#" data-filter=".gallery_<?php echo  $category['GalleryID'];?>" class="filter"><?php echo $category['GalleryName'];?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="row content_gallery">
                            
                                <?php
                                    $galleryImages = $mysql->select("select * from _tbl_gallery_images where IsActive='1' order by GalleryID");
                                    foreach($galleryImages as $galleryImage) {
                                ?>
                                <div class="col-sm-4 gallery_item-wrap competitions gallery_<?php echo $galleryImage['GalleryID'];?>">
                                    <a href="https://www.trip78.in/uploads/gallery/<?php echo $galleryImage['GalleryImage'];?>" class="swipebox" title="<?php echo $galleryImage['GalleryTitle'];?>">
                                        <img src="https://www.trip78.in/uploads/gallery/<?php echo $galleryImage['GalleryImage'];?>" alt="<?php echo $galleryImage['GalleryTitle'];?>">
                                        <div class="gallery-item">
                                            <h4 class="title"><?php echo $galleryImage['GalleryTitle'];?></h4>
                                        </div>
                                    </a></div>
                                <?php
                                    }
                                ?>
                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php include_once("footer.php");?> 