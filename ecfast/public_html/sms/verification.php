<?php
    error_reporting(E_ALL);
    include 'PHPExcel/IOFactory.php';
    $inputFileName="excels/".$filename;
    try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch(Exception $e) {
        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
    }

    $sheet = $objPHPExcel->getSheet(0); 
    $highestRow = $sheet->getHighestRow(); 
    $highestColumn = $sheet->getHighestColumn();

    $totalsms=0;
    $validsms=0;
    $totalsmscount=0;
    
    if ($highestRow>500) {
        echo "Not Supported. Maximum allowed records must have 500 per file";
    } else {

    for ($row = 1; $row <= $highestRow; $row++) { 
        
        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);                                   
        if (sizeof($rowData)>0) {
            $senderid = checkValidSenderIDAPI($_SESSION['user']['id'],$rowData[0][3]);
            $sid = (isset($senderid[0]['sid']) && ($senderid[0]['sid']>0)) ? $senderid[0]['sid'] : 0;
            $isvalidatetoexe = ( (isMobileNumber(trim($rowData[0][0])) && (strlen(trim($rowData[0][1]))>0) && $sid>0 ) ? '1' :'0');
            $totalsms++;
            $id = $mysql->insert("_tblbatchdetails",array("batchid"=>$batchid,
                                                          "mnumber"=>trim($rowData[0][0]),
                                                          "message"=>trim($rowData[0][1]),
                                                          "mtype"=>trim($rowData[0][2]),
                                                          "sid"=>$sid,
                                                          "senderid"=>trim($rowData[0][3]),
                                                          "isvalidnumber"=> (isMobileNumber(trim($rowData[0][0])) ? '1' : '0'),
                                                          "isvalidmessage"=> (strlen(trim($rowData[0][1]))>=1 ? '1' : '0'),
                                                          "messagelength"=> strlen(trim($rowData[0][1])),
                                                          "credits"=> MessageCount(trim($rowData[0][1])),
                                                          "isvalidtoexec"=> $isvalidatetoexe,
                                                          "msgtxnid"=>"0"));
            if ($isvalidatetoexe==1) {
                $validsms++;
                $totalsmscount+=MessageCount(trim($rowData[0][1]));
            }
        }
    }
    $mysql->execute("update _tblbatch set totalrecords='".$totalsms."', validrecords='".$validsms."',totalsmscount='".$totalsmscount."' where batchid=".$batchid);
    $batchdetails = $mysql->select("select * from _tblbatch  where batchid=".$batchid);
    $records = $mysql->select("select * from _tblbatchdetails where batchid=".$batchid);
 
    ?>
    <form action="processstart.php" method="post" id="conWin">
        <input type="hidden" name="batchid" value="<?php echo $batchid;?>">
        <table style="margin-bottom:15px;margin-top:5px;" cellpadding="3" cellspacing="0">
            <tr style="font-weight:bold;">    
                <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Batch ID</td>
                <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Batch Name</td>
                <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Total Records</td>
                <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Valid Records</td>
                <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Message Count</td>
            </tr>
            <tr>
                <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $batchdetails[0]['batchid']; ?></td>
                <td style="border:1px solid #D0DDEA;border-top:none;text-align:left"><?php echo $batchdetails[0]['batchname']; ?></td>
                <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $batchdetails[0]['totalrecords']; ?></td>
                <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $batchdetails[0]['validrecords']; ?></td>
                <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $batchdetails[0]['totalsmscount']; ?></td>
            </tr>
        </table>
        <div style="height:300px;width:100%;overflow:auto;">
            <table style="font-size:11px;width:100%;border:1px solid #DEEAF2;border-bottom:none;" cellspacing="0">
                <tr style="text-align:center;font-weight:bold;color:#333">
                    <td style="padding:4px;background:url(images/trbackground.png);width:30px;border-bottom:1px solid #9EB6CE;border-right:1px solid #9EB6CE;">&nbsp;</td>
                    <td style="padding:4px;background:url(images/trbackground.png);width:80px;border-bottom:1px solid #9EB6CE;border-right:1px solid #9EB6CE;">A</td>
                    <td style="padding:4px;background:url(images/trbackground.png);border-bottom:1px solid #9EB6CE;border-right:1px solid #9EB6CE;">B</td>
                    <td style="padding:4px;background:url(images/trbackground.png);width:50px;border-bottom:1px solid #9EB6CE;border-right:1px solid #9EB6CE;">C</td>
                    <td style="padding:4px;background:url(images/trbackground.png);width:50px;border-bottom:1px solid #9EB6CE;">D</td>
                </tr>
                
                <?php 
                    $rcount =0;
                    
                    foreach($records as $r) { 
                        
                        $rcount++;
                        $bg="";
                        if ($r['isvalidnumber']==0) {
                            $bg="background:#FFEDE8;";
                        }
                        
                        if ($r['isvalidmessage']==0) {
                            $bg=";background:#FFEDE8;";
                        }
                        
                        if ($r['isvalidtoexec']==0) {
                            $bg=";background:#FFEDE8;";
                        }
                ?>
                <tr>
                    <td style="font-size:11px;padding:3px;background:#E4ECF7;color:#333;text-align:right;border-bottom:1px solid #D0E1ED;border-right:1px solid #D0E1ED;"><?php echo $rcount;?></td>
                    <td style="font-size:11px;padding:3px;background:#fff;color:#333;text-align:left;padding-right:3px;border-bottom:1px solid #D0E1ED;border-right:1px solid #D0E1ED;<?php echo $bg;?>"><?php echo $r['mnumber'];?></td>
                    <td style="font-size:11px;padding:3px;background:#fff;color:#333;text-align:left;padding-right:3px;border-bottom:1px solid #D0E1ED;border-right:1px solid #D0E1ED;<?php echo $bg;?>"><?php echo $r['message'];?></td>
                    <td style="font-size:11px;padding:3px;background:#fff;color:#333;text-align:left;padding-right:3px;border-bottom:1px solid #D0E1ED;border-right:1px solid #D0E1ED;<?php echo $bg;?>"><?php echo $r['mtype'];?></td>
                    <td style="font-size:11px;padding:3px;background:#fff;color:#333;text-align:left;padding-right:3px;border-bottom:1px solid #D0E1ED;<?php echo $bg;?>"><?php echo $r['senderid'];?></td>
                </tr>
                <?php } ?>
            </table>                   
        </div>
  <bR><span style='color:#FFEDE8'>Invalid</span><br>
  <?php if ($validsms>0) { ?>
  <input type="submit" value="Confirm To Send" class="myButton" name="isStart">
  <?php } ?>
  </form>
  <?php } ?>
  <?php include_once("footer.php"); ?>