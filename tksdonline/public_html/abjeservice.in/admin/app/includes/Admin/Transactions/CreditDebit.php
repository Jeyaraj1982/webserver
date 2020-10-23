 
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/Refill">Transaction</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/Refill">Credit/DebitReport</a></li>
        </ul>
    </div>
        
       <style>
       .btn-light{border:1px solid #ccc !important}
       </style> 
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    
    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
   
  
    <div class="row">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header">
                    <div class="card-title">Refill to Member</div>
                </div>
            <div class="card-body">
                <form method="post" action="dashboard.php?action=Transactions/CreditDebitReport">
                   
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-6 b-r">
                            <strong>Super Agent / Agent Mobile Number</strong>
                            <br>
                            <!--<input type="text" name="MemberCode" id="MemberCode" class="form-control" value="<?php echo isset($_POST['MemberCode']) ? $_POST['MemberCode'] : "";?>">-->
                             <select name="MemberCode" id="MemberCode" class="form-control selectpicker" style="border:1px solid #555" data-live-search="true">
                             <option value="0">Slect Agent</option>
     
    
    <?php $agents = $mysql->select("select * from _tbl_member");
    foreach($agents as $a) {
        ?>
             <option value="<?php echo $a['MemberID'];?>"><?php echo $a['MemberName']." (".$a['MobileNumber'].") ";?>
              Balance: <?php echo number_format($application->getBalance($a['MemberID']),2);?>
             </option>
        <?php
    }
    ?>
    
  </select>      <br>
  <span style="color:orange;font-size:12px">Not select display all members</span>
                        </div>
                    </div>
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <strong>Report</strong>
                            <br>
                            <select name="Report" class="form-control">
                                <option value="Credit">Credit Sheet</option>
                                <option value="Debit">Debit Sheet</option>
                            </select>
                            
                        </div>
                    </div>  
   <?php
                        $d = date("d");
                        $m = date("m");
                        $y = date("Y");
                    ?>                 
                     <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <strong>Date</strong>
                            <br>
                           <select name="d">
                    <option value="1"  <?php echo $d==1 ? " selected='selected' " : "";?> >1</option>
                    <option value="2"  <?php echo $d==2 ? " selected='selected' " : "";?>>2</option>
                    <option value="3"  <?php echo $d==3 ? " selected='selected' " : "";?>>3</option>
                    <option value="4"  <?php echo $d==4 ? " selected='selected' " : "";?>>4</option>
                    <option value="5"  <?php echo $d==5 ? " selected='selected' " : "";?>>5</option>
                    <option value="6"  <?php echo $d==6 ? " selected='selected' " : "";?>>6</option>
                    <option value="7"  <?php echo $d==7 ? " selected='selected' " : "";?>>7</option>
                    <option value="8"  <?php echo $d==8 ? " selected='selected' " : "";?>>8</option>
                    <option value="9"  <?php echo $d==9 ? " selected='selected' " : "";?>>9</option>
                    <option value="10" <?php echo $d==10 ? " selected='selected' " : "";?>>10</option>
                    <option value="11" <?php echo $d==11 ? " selected='selected' " : "";?>>11</option>
                    <option value="12" <?php echo $d==12 ? " selected='selected' " : "";?>>12</option>
                    <option value="13" <?php echo $d==13 ? " selected='selected' " : "";?>>13</option>
                    <option value="14" <?php echo $d==14 ? " selected='selected' " : "";?>>14</option>
                    <option value="15" <?php echo $d==15 ? " selected='selected' " : "";?>>15</option>
                    <option value="16" <?php echo $d==16 ? " selected='selected' " : "";?>>16</option>
                    <option value="17" <?php echo $d==17 ? " selected='selected' " : "";?>>17</option>
                    <option value="18" <?php echo $d==18 ? " selected='selected' " : "";?>>18</option>
                    <option value="19" <?php echo $d==19 ? " selected='selected' " : "";?>>19</option>
                    <option value="20" <?php echo $d==20 ? " selected='selected' " : "";?>>20</option>
                    <option value="21" <?php echo $d==21 ? " selected='selected' " : "";?>>21</option>
                    <option value="22" <?php echo $d==22 ? " selected='selected' " : "";?>>22</option>
                    <option value="23" <?php echo $d==23 ? " selected='selected' " : "";?>>23</option>
                    <option value="24" <?php echo $d==24 ? " selected='selected' " : "";?>>24</option>
                    <option value="25" <?php echo $d==25 ? " selected='selected' " : "";?>>25</option>
                    <option value="26" <?php echo $d==26 ? " selected='selected' " : "";?>>26</option>
                    <option value="27" <?php echo $d==27 ? " selected='selected' " : "";?>>27</option>
                    <option value="28" <?php echo $d==28 ? " selected='selected' " : "";?>>28</option>
                    <option value="29" <?php echo $d==29 ? " selected='selected' " : "";?>>29</option>
                    <option value="30" <?php echo $d==30 ? " selected='selected' " : "";?>>30</option>
                    <option value="31" <?php echo $d==31 ? " selected='selected' " : "";?>>31</option>
                </select>
                <select name="m">
                    <option value="1"  <?php echo $m==1 ? " selected='selected' " : "";?>>JAN</option>
                    <option value="2"  <?php echo $m==2 ? " selected='selected' " : "";?>>FEB</option>
                    <option value="3"  <?php echo $m==3 ? " selected='selected' " : "";?>>MAR</option>
                    <option value="4"  <?php echo $m==4 ? " selected='selected' " : "";?>>APR</option>
                    <option value="5"  <?php echo $m==5 ? " selected='selected' " : "";?> >MAY</option>
                    <option value="6"  <?php echo $m==6 ? " selected='selected' " : "";?> >JUN</option>
                    <option value="7"  <?php echo $m==7 ? " selected='selected' " : "";?> >JLY</option>
                    <option value="8"  <?php echo $m==8 ? " selected='selected' " : "";?>>AUG</option>
                    <option value="9"  <?php echo $m==9 ? " selected='selected' " : "";?>>SEP</option>
                    <option value="10" <?php echo $m==10 ? " selected='selected' " : "";?>>OCT</option>
                    <option value="11" <?php echo $m==11 ? " selected='selected' " : "";?>>NOV</option>
                    <option value="12" <?php echo $m==12 ? " selected='selected' " : "";?>>DEC</option>
                </select>
                <select name="y">
                    <option value="2020"  <?php echo $y==1 ? " selected='selected' " : "";?>>2020</option>
                </select>
                
                
                To 
                
                <select name="td">
                    <option value="1"  <?php echo $d==1 ? " selected='selected' " : "";?> >1</option>
                    <option value="2"  <?php echo $d==2 ? " selected='selected' " : "";?>>2</option>
                    <option value="3"  <?php echo $d==3 ? " selected='selected' " : "";?>>3</option>
                    <option value="4"  <?php echo $d==4 ? " selected='selected' " : "";?>>4</option>
                    <option value="5"  <?php echo $d==5 ? " selected='selected' " : "";?>>5</option>
                    <option value="6"  <?php echo $d==6 ? " selected='selected' " : "";?>>6</option>
                    <option value="7"  <?php echo $d==7 ? " selected='selected' " : "";?>>7</option>
                    <option value="8"  <?php echo $d==8 ? " selected='selected' " : "";?>>8</option>
                    <option value="9"  <?php echo $d==9 ? " selected='selected' " : "";?>>9</option>
                    <option value="10" <?php echo $d==10 ? " selected='selected' " : "";?>>10</option>
                    <option value="11" <?php echo $d==11 ? " selected='selected' " : "";?>>11</option>
                    <option value="12" <?php echo $d==12 ? " selected='selected' " : "";?>>12</option>
                    <option value="13" <?php echo $d==13 ? " selected='selected' " : "";?>>13</option>
                    <option value="14" <?php echo $d==14 ? " selected='selected' " : "";?>>14</option>
                    <option value="15" <?php echo $d==15 ? " selected='selected' " : "";?>>15</option>
                    <option value="16" <?php echo $d==16 ? " selected='selected' " : "";?>>16</option>
                    <option value="17" <?php echo $d==17 ? " selected='selected' " : "";?>>17</option>
                    <option value="18" <?php echo $d==18 ? " selected='selected' " : "";?>>18</option>
                    <option value="19" <?php echo $d==19 ? " selected='selected' " : "";?>>19</option>
                    <option value="20" <?php echo $d==20 ? " selected='selected' " : "";?>>20</option>
                    <option value="21" <?php echo $d==21 ? " selected='selected' " : "";?>>21</option>
                    <option value="22" <?php echo $d==22 ? " selected='selected' " : "";?>>22</option>
                    <option value="23" <?php echo $d==23 ? " selected='selected' " : "";?>>23</option>
                    <option value="24" <?php echo $d==24 ? " selected='selected' " : "";?>>24</option>
                    <option value="25" <?php echo $d==25 ? " selected='selected' " : "";?>>25</option>
                    <option value="26" <?php echo $d==26 ? " selected='selected' " : "";?>>26</option>
                    <option value="27" <?php echo $d==27 ? " selected='selected' " : "";?>>27</option>
                    <option value="28" <?php echo $d==28 ? " selected='selected' " : "";?>>28</option>
                    <option value="29" <?php echo $d==29 ? " selected='selected' " : "";?>>29</option>
                    <option value="30" <?php echo $d==30 ? " selected='selected' " : "";?>>30</option>
                    <option value="31" <?php echo $d==31 ? " selected='selected' " : "";?>>31</option>
                </select>
                <select name="tm">
                    <option value="1"  <?php echo $m==1 ? " selected='selected' " : "";?>>JAN</option>
                    <option value="2"  <?php echo $m==2 ? " selected='selected' " : "";?>>FEB</option>
                    <option value="3"  <?php echo $m==3 ? " selected='selected' " : "";?>>MAR</option>
                    <option value="4"  <?php echo $m==4 ? " selected='selected' " : "";?>>APR</option>
                    <option value="5"  <?php echo $m==5 ? " selected='selected' " : "";?> >MAY</option>
                    <option value="6"  <?php echo $m==6 ? " selected='selected' " : "";?> >JUN</option>
                    <option value="7"  <?php echo $m==7 ? " selected='selected' " : "";?> >JLY</option>
                    <option value="8"  <?php echo $m==8 ? " selected='selected' " : "";?>>AUG</option>
                    <option value="9"  <?php echo $m==9 ? " selected='selected' " : "";?>>SEP</option>
                    <option value="10" <?php echo $m==10 ? " selected='selected' " : "";?>>OCT</option>
                    <option value="11" <?php echo $m==11 ? " selected='selected' " : "";?>>NOV</option>
                    <option value="12" <?php echo $m==12 ? " selected='selected' " : "";?>>DEC</option>
                </select>
                <select name="ty">
                    <option value="2020"  <?php echo $y==1 ? " selected='selected' " : "";?>>2020</option>
                </select>
                            
                        </div>
                    </div>          
                    <div class="row mb15">
                        <div class="col-md-4 col-xs-6 b-r">
                            <button type="submit" name="refillBtn" id="refillBtn" class="btn btn-primary" >Get Report</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>            
</div>
<?php include_once("footer.php"); ?>