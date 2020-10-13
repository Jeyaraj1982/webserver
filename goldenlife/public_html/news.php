<?php include_once("header.php");?>
  <main id="main">
    <section id="about" class="wow fadeInUp">
      <div class="container" style="border: 10px solid #ccc;border-radius: 10px;background: #333;color: #fff;padding: 80px;">
	    <div class="section-header">
         <?php $news = $mysql->select("select * from `_tbl_noticeboard` where `IsPublish`='1' and NewsID='".$_GET['news']."'"); ?>
          <h2><?php echo $news[0]['NewsTitle'];?></h2>
         <p><?php echo str_replace("</pre>","",str_replace('<pre class="tw-data-text tw-text-large tw-ta" data-placeholder="Translation" id="tw-target-text" style="text-align:left" dir="ltr">',"",$news[0]['NewsText']));?></p>
        </div>
      </div>
    </section>  
  </main>
<?php include_once("footer.php");?>
  