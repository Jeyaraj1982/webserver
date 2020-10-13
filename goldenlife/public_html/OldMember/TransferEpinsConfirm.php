<?php include_once("header.php");?>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
                        </div>
                        <div>Transfer E-Pins</div>
                    </div>
                </div>
            </div>            
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <?php
                        if (isset($_POST['btnConfrimTransfer'])) {
                            
                            $transferto = $mysql->select("select * from _tbl_member where MemberCode='".$_POST['TransferTo']."'");
                            if (sizeof($transferto)==1) {
                                
                                $pins = json_decode(base64_decode($_POST['ids']),true);
                                foreach($pins as $p) {
                                    
                                    $pinInfo = $mysql->select("select * from _tbl_epins where PinCode='".$p."'");
                                    $mysql->insert("_tbl_sold_epins",array("PinID"             => $pinInfo[0]['PinID'],
                                                                           "PinCode"           => $pinInfo[0]['PinCode'],
                                                                           "EPinPassword"      => $pinInfo[0]['EPinPassword'],
                                                                           "GeneratedByID"     => $pinInfo[0]['GeneratedByID'],
                                                                           "GeneratedByName"   => $pinInfo[0]['GeneratedByName'],
                                                                           "TransferedOn"      => date("Y-m-d H:i:s"),
                                                                           "PinValue"          => $pinInfo[0]['PinValue'],
                                                                           "IsSold"            => $pinInfo[0]['IsSold'],
                                                                           "SoldMemberID"      => $pinInfo[0]['SoldMemberID'],
                                                                           "SoldMemberCode"    => $pinInfo[0]['SoldMemberCode'],
                                                                           "SoldMemberName"    => $pinInfo[0]['SoldMemberName'],
                                                                           "SoldOn"            => $pinInfo[0]['SoldMemberName'],
                                                                           "SoldMemberToID"    => $transferto[0]['MemberID'],
                                                                           "SoldMemberToCode"  => $transferto[0]['MemberCode'],
                                                                           "SoldMemberToName"  => $transferto[0]['MemberName'],
                                                                           "SoldOndateTotime"  => date("Y-m-d H:i:s")));
                                    $mysql->execute("update _tbl_epins set SoldMemberID='".$transferto[0]['MemberID']."', SoldMemberCode='".$transferto[0]['MemberCode']."', SoldMemberName='".$transferto[0]['MemberName']."' , SoldOn='".date("Y-m-d H:i:s")."' where  PinID='".$pinInfo[0]['PinID']."' ");
                                }
                                
                                echo "<div style='text-align:center;font-size:18px;color:green;padding:50px'><img src='assets/images/tick.png' style='width:128px'><br><br>Epin Transfered successfully</div>";
                            
                            }  else {
                                echo "<div style='text-align:center;font-size:18px;color:red;padding:50px'><img src='assets/images/fail.png' style='width:128px'><br><br>Transfer failed. Invalid ID</div>";
                            }
                            
                        } else { 
                            echo "<div style='text-align:center;font-size:18px;color:red;padding:50px'><img src='assets/images/fail.png' style='width:128px'><br><br>Transfer failed. Invalid ID</div>";
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>
 <?php include_once("footer.php");?>