<?php include_once("../../config.php"); ?>
<body style="margin:0px;">
 <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Edit FAQ</div>
 <style>
 .mytr:hover{background:#f1f1f1;cursor:pointer}
 </style>
<?php 
    
          $obj = new CommonController();
    
        if (!($obj->isLogin())){
            echo $obj->printError("Login Session Expired. Please Login Again");
            exit;
        }
     
        if(isset($_POST{"cdeletebtn"})){
       
        JFaq::deleteFaq($_POST['rowid']); 
        echo CommonController::printSuccess("Deleted Successfully");
        echo "<script>setTimeout(\"window.open('managefaq.php','rpanel')\",1500);</script>";
      }
       
    if (isset($_POST{"deletebtn"})){
             
             $pageContent =JFaq::getFaq($_POST['rowid']);
       
       ?>
      
       <form action='' method="post">
       <table  style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
        <tr>
            <td style="width:150px">Faq Question</td>
            <td><?php echo $pageContent[0]['faqquestion'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Faq Answer</td>
            <td><?php echo $pageContent[0]['faqanswer'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Is Published</td>
            <td><?php echo $pageContent[0]['ispublished'];?></td>
        </tr>
        
       </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['faqid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
       <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='managefaq.php'"> 
         </form>
        <?php
       exit;
       }
       
    if (isset($_POST{"updatebtn"})){
        
            $param = array("faqid"=>$_POST['rowid'],"faqquestion"=>$_POST['faqquestion'],"faqanswer"=>$_POST['faqanswer'],"ispublished"=>$_POST['ispublished']);    
             JFaq::updateFaq($param,$_POST['rowid']);
            echo CommonController::printSuccess("Updated Successfully");
            echo "<script>setTimeout(\"window.open('managefaq.php','rpanel')\",1500);</script>";
       
         }
          echo "<table  cellspacing='3' cellspadding='0' width='100%' style='font-size:12px;font-family:arial;'>";
          echo "<tr><td>Faq Question</td><td>Is Published </td></tr>";

   
    foreach (JFaq::getFaq() as $r)
    {
    ?>
        <form action='' method='post'>
                <tr class="mytr">
                    <td>
                    <b>Question:</b>&nbsp;<input type="text" value="<?php echo $r["faqquestion"];?>" name="faqquestion" style="width:260px !important">
                   <br><b>Answer:</b><br>
                        <textarea name="faqanswer" style="height:80px;width:300px;"><?php echo $r["faqanswer"];?></textarea>
                    </td>
                   
                    <td style='width:150px;'> 
                        <select name="ispublished">
                            <option value='1' <?php echo ($r["ispublished"]) ? 'selected="selected"' : '';?>>Yes</option>
                            <option value='0' <?php echo ($r["ispublished"]!=1) ? 'selected="selected"' : '';?>>No</option>
                        </select>
                    </td>
                    
                    <td>
                        <input type='hidden' value='<?php echo $r["faqid"];?>' name='rowid' id='rowid' >
                        <input type='submit' name='updatebtn' value='Update'>
                        <input type='submit' name='deletebtn' value='Delete'>
                    </td>
                </tr>
        </form>
    <?php  } ?>
</body>