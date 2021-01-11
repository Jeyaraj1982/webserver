<?php include_once("header.php"); ?>
<style>
    .form-control{display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;} 
    #btnLogin[type="submit"] {    background: #E91E63;    border: 0;    border-radius: 3px;    padding: 10px 30px;    color: #fff;    transition: 0.4s;    cursor: pointer;}
    #btnLogin[type="submit"]:hover {    background: #081e5b;}
    .errorstring{color:red;font-size:11px;}
    .SponsorInfo {padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;width:100%;background:#fff;border:none;padding-left:0px;font-weight:bold}
</style>


 


<section style="background:#fff;">
    <div class="row" style="margin-left:0px;margin-right:0px;"> 
        <div class="col-sm-2"></div>
        <div class="col-sm-8" style="margin-top: 5%;">
            <div class="container" style="padding-bottom: 35px;"> 
                <?php
                    $ErrorCount = 0;
                    $data = $mysql->select("select * from _tbl_member_preregister  where MemberID='".$_POST['pgid']."' and  IsActivated='0'");
                    
                    if (sizeof($data)==1) {
                      
                       if ($ErrorCount==0) {
                           $MemberCode=SeqMaster::GetNextMemberCode();                                                                      
                           $Member = $mysql->insert("_tbl_member",array("MemberCode"         => $MemberCode,
                                                                        "MemberName"         => trim($data[0]['MemberName']),
                                                                        "MemberPassword"     => trim($data[0]['MemberPassword']),
                                                                        "AddressLine1"       => trim($data[0]['AddressLine1']),
                                                                        "AddressLine2"       => trim($data[0]['AddressLine2']),               
                                                                        "MemberMobileNumber" => trim($data[0]['MemberMobileNumber']),
                                                                        "Sex"                => trim($data[0]['Sex']),
                                                                        "DateOfBirth"        => trim($data[0]['DateOfBirth']),
                                                                        "EmailID"            => trim($data[0]['EmailID']),
                                                                        "IsActive"           => "1",
                                                                        "SponsorID"          => $data[0]['SponsorID'],
                                                                        "SponsorCode"        => $data[0]['SponsorCode'],
                                                                        "Sponsorname"        => $data[0]['SponsorName'],
                                                                        "CreatedOn"          => date("Y-m-d H:i:s")));
                           $mysql->execute("update _tbl_member set UID='".J2JApplication::encryptID(($Member))."' where MemberID='".$Member."'");
                           if ($Member>0) {
                               
                               $mysql->execute("update _tbl_member_preregister set IsActivated='1', ActivatedMemberID='".$Member."',ActivatedMemberCode='".$MemberCode."'  where MemberID='".$_POST['pgid']."'");
                               /* Update Wallet */
                               $walletID= $mysql->insert("_tbl_wallet_earning",array("MemberID"     => $Member,
                                                                                     "MemberCode"   => $MemberCode,
                                                                                     "TxnDate"      => date("Y-m-d H:i:s"),
                                                                                     "Particulars"  => "WalletRefill Using Payment Gateway",
                                                                                     "Amount"       => 500,
                                                                                     "Credit"       => 500,
                                                                                     "Debit"        => "0",
                                                                                     "Balance"      => getWithdrawableBalance($MemberCode)+500));
                               /* End Update Wallet */
                               
                               /* Generate EPin */
                               
                               /* End of Generate Epin */
                               $package = $mysql->select("select * from `_tbl_epin_package` where `packageid`='1'");
                               $PinCode = strtoupper(md5(SeqMaster::GetNextPinCode()));    
                               $Pin = substr($PinCode,0,10);                                                            
                               $PinPassword = strtolower(substr($PinCode,11,6));
                               $Pin = $mysql->insert("_tbl_epins",array("PinCode"         => $Pin,
                                                                        "EPinPassword"    => $PinPassword,
                                                                        "GeneratedByID"   => $Member,
                                                                        "GeneratedByName" => "Member",
                                                                        "IsSold"          => "1",
                                                                        "SoldMemberID"    => $Member,
                                                                        "SoldMemberCode"  => $MemberCode,
                                                                        "SoldMemberName"  => $data[0]['MemberName'],
                                                                        "SoldOn"          => date("Y-m-d H:i:s"),
                                                                        "PinValue"        => $package[0]['PackageValue'],
                                                                        "PinPackageName"  => $package[0]['PackageName'],
                                                                        "PinPackageID"    => $package[0]['packageid'],
                                                                        "GeneratedOn"     => date("Y-m-d H:i:s")));
                                                                        
                                                                        $mysql->execute("update _tbl_epins set IsUsed='1', 
                                                                       UsedOn='".date("Y-m-d H:i:s")."',
                                                                       UsedToMemberID='".$Member."',
                                                                       UsedMemberCode='".$MemberCode."',
                                                                       UsedMemberName='".trim($_POST['FirstName'])."' where PinID='".$Pin."'");
                               $epin = $mysql->select("select * from _tbl_epins where PinID='".$Pin."'");
                               
                                $walletID= $mysql->insert("_tbl_wallet_earning",array("MemberID"     => $Member,
                                                                                     "MemberCode"   => $MemberCode,
                                                                                     "TxnDate"      => date("Y-m-d H:i:s"),
                                                                                     "Particulars"  => "EPIN/Create Member Fee",
                                                                                     "Amount"       => 500,
                                                                                     "Credit"       => "0",
                                                                                     "Debit"        => "500",
                                                                                     "Balance"      => getWithdrawableBalance($MemberCode)-500)); 
                               
                               /* Endo of Epin Generate */
                                                  
                                $mysql->insert("_tbl_placements",array("ParentMemberID"=>$data[0]['SponsorID'] ,
                                                                       "ParentMemberCode"=>$data[0]['SponsorCode'],
                                                                       "ParentMemberName"=>$data[0]['SponsorName'],
                                                                                         
                                                                       "UplineMemberID"   => $data[0]['SponsorID'],
                                                                       "UplineMemberCode" => $data[0]['SponsorCode'],
                                                                       "UpilneMemberName" => $data[0]['SponsorName'],
                                                                                         
                                                                       "ChildMemberID"=>$Member,
                                                                       "ChildMemberCode"=>$MemberCode,
                                                                       "ChildMemberName"=>trim($data[0]['MemberName']),
                                                                                         
                                                                       "PlacementedOn"=>date("Y-m-d H:i:s"),
                                                                       
                                                                       "PlacementedID"=>$data[0]['SponsorID'],
                                                                       "PlacementedCode"=>$data[0]['SponsorCode'],
                                                                       "PlacementedName"=>$data[0]['SponsorName'],
                                                                       "UsedPinID"        =>$Pin,
                                                                       "IsDirect"=>  "1"));
                                $levelnumber=1;
                                
                                $uplines = findUplines($data[0]['SponsorCode']);                  
                                foreach($uplines as $supline) {
                                    if (isset($income[$levelnumber-1]) && $income[$levelnumber-1]>0) {
                                        $mysql->insert("_tbl_earnings",array("MemberID"=>$supline['MemberID'],      
                                                                             "MemberCode"=>$supline['MemberCode'],
                                                                             "MemberName"=>$supline['MemberName'],
                                                                             "LevelNumber"=>$levelnumber,
                                                                             "LevelIncome"=>$income[$levelnumber-1],
                                                                             "PlacedMemberID"=>$Member,
                                                                             "PlacedMemberCode"=>$MemberCode,
                                                                             "PlacedMemberName"=>trim($_POST['FirstName']),
                                                                             "PlacedByMemberID"=>$epin[0]['SoldMemberID'],
                                                                             "PlacedByMemberCode"=>$epin[0]['SoldMemberCode'],
                                                                             "PlacedByMemberName"=>$epin[0]['SoldMemberName'],
                                                                             "PlacedOn"=>date("Y-m-d H:i:s"),
                                                                             "FromWeb"=>"1",
                                                                             "FromPortal"=>"0"));
                                                                             
                                        // Credit Amount
                                        $mysql->insert("_tbl_wallet_earning",array("MemberID"       => $supline['MemberID'],
                                                                             "MemberCode"     => $supline['MemberCode'],
                                                                             "TxnDate"        => date("Y-m-d H:i:s"),
                                                                             "Particulars"    => "Referal Income ".$MemberCode,
                                                                             "Amount"         => number_format($income[$levelnumber-1],2),
                                                                             "Credit"         => number_format($income[$levelnumber-1],2),
                                                                             "Debit"          => "0.00",
                                                                             "Balance"        => getWithdrawableBalance($supline['MemberCode'])+$income[$levelnumber-1],
                                                                             "VoucherID"      => "1",
                                                                             "VoucherName"    => "ReferalIncome"));
                                        
                                         $walletID= $mysql->insert("_tbl_wallet_utility",array("MemberID"     => $supline['MemberID'],
                                                                                     "MemberCode"   => $supline['MemberCode'],
                                                                                     "TxnDate"      => date("Y-m-d H:i:s"),
                                                                                     "Particulars"  => "Voucher ".$MemberCode,
                                                                                     "Amount"       => 500,
                                                                                     "Credit"       => "500",
                                                                                     "Debit"        => "0",
                                                                                     "Balance"      => GetUtilityBalance($supline['MemberCode'])+500));
                                                                                     
                                      //  $particulars  = $supline['MemberCode']." Earned Rs. ".number_format($income[$levelnumber-1])." placed ".$MemberCode;
                                     //   DebitCharges($supline['MemberID'],$supline['MemberCode'],$particulars,$income[$levelnumber-1]);
                                        
                                    }
                                    $levelnumber++;
                                }

                                //$message="Dear ".$_POST['FirstName'].", Your account has been created. Login Details: Member Code: ".$MemberCode.", Password=".$_POST['Password'].", Url: http://www.goldenlifesociety.co.in - Thanks GLS Team";
                               // $url="http://www.aaranju.in/sms/api.php?username=a3VtYXJtMTQ5QGdtYW&password=lsLmNvbQ==&number=".trim($_POST['MobileNumber'])."&sender=GOLDLS&message=".urlencode($message)."&uid=".$MemberCode;
                               // $ch = curl_init($url);
                              //  curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0");
                              //  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                              //  curl_setopt($ch, CURLOPT_TIMEOUT, 400);
                              //  $res = curl_exec($ch);
                               // curl_close($ch);
                                
                                /* <script>location.href='MemberCheckout.php?id=<?php echo $Member;?>';</script>  */
                                $successmessage = "<div style='text-align:center;padding:20px;'>
                                                        <img src='assets/images/checkmark-flat.png'><br><br>
                                                        New Member has been created successfully<br> <br>
                                                        <table align='Center'>
                                                            <tr>
                                                                <td style='text-align:left;padding:5px;'>Your Member ID</td>
                                                                <td style='text-align:left;padding:5px;'>:&nbsp;".$MemberCode."</td>
                                                            </tr>
                                                        </table>
                                                        <br><br>
                                                        <a href='index.php'>Continue to login</a>
                                                        <style>#memberform{display:none}</style>
                                                   </div>";
                                                   echo $successmessage;
                            } else {
                               
                                echo $errorMessage;
                                                        $successmessage = "<div style='text-align:center;padding:20px;color:red;'>
                                                Error occured. Couldn't save member detatils 
                                                <br><br>
                                                <a href='index.php'>Continue to login</a>
                                           </div>";
                        echo $successmessage;

                            }
                        }
                        
                    } else {
                        $successmessage = "<div style='text-align:center;padding:20px;color:red;'>
                                                Request may be processed, or couldn't be processed.<br>please contact administrator 
                                                <br><br>
                                                <a href='index.php'>Continue to login</a>
                                           </div>";
                        echo $successmessage;
                    }
                ?>
                 
                 
            </div>                                                                                                                         
        </div>
        <div class="col-sm-2"></div>
    </div>
</section>
<?php include_once("footer.php");?>  