<div id="content">
    <div class="login-signup-page mx-auto my-5">
        <h3 class="font-weight-400 text-center">Create Member</h3>
        <p class="lead text-center"></p>
        <div class="bg-light shadow-md rounded p-4 mx-2">
        <?php
            
            class MySqldatabase {
                
                var $link; 
                var $dbName = "";
                var $qry    = "";
        
                public function MySqldatabase($dbHost,$dbUser,$dbPass,$dbName){
                    $this->dbName = $dbName;
                    $this->link = mysql_connect($dbHost,$dbUser,$dbPass) or die("Error");
                }
        
                public function select($sql,$ass=false) {
                    
                    mysql_select_db($this->dbName,$this->link);
                    $resultData = array();
                    $result     = mysql_query($sql,$this->link);
                    
                    if ($ass) {
                        return mysql_fetch_assoc($result); 
                    }
            
                    if ($result) { 
                        if (mysql_num_rows($result) > 0) {
                            while ($row = mysql_fetch_assoc($result)) {
                                $resultData[]=$row;
                            }
                            mysql_free_result($result);  
                        }
                    }
            
                    return $resultData;
            }
        
            public function execute($sql) {
                
                $this->qry = $sql;
                mysql_select_db($this->dbName,$this->link);
                mysql_query($this->qry,$this->link);
                return mysql_affected_rows();
            }
            
            public function insert($tableName,$rowData) {
                
                $r = "insert into `".$tableName."` (";
                $l = " values (";
                foreach($rowData as $key => $value) {
                    $r.="`".$key."`,";
                    if ($value=="Null") {
                        $l.="Null,";
                    } else {
                        $l.="'".$value."',";    
                    }
                    
                }
                $r = substr($r,0,strlen($r)-1).")";
                $l = substr($l,0,strlen($l)-1).")";
                $sql = $r.$l;
                
                mysql_select_db($this->dbName,$this->link);

                $this->qry=$sql;  
                mysql_query($this->qry,$this->link) ;
                return mysql_insert_id($this->link);
            }
            
            public  function update($tableName,$rowData,$where) {
                
                $r = "update `".$tableName."` set ";
     
                foreach($rowData as $key => $value) {
                    $r.="`".$key."`='".$value."',";
                }
                $r = substr($r,0,strlen($r)-1);
                $sql = $r." where ".$where;
                
                mysql_select_db($this->dbName,$this->link);
                $this->qry=$sql;  
                mysql_query($this->qry,$this->link);
                return mysql_affected_rows($this->link);
            }
            
            public function dbClose() {
                mysql_close($this->link);
            }
        }
 
  
    
        $mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");
        
        if (isset($_POST['submitBtn'])) {
            
            $epin =$mysqldb->select("SELECT * FROM `_tblEpins` where `EPIN`='".$_POST['Epin']."' and `PINPassword`='".$_POST['PinPassword']."'");
            
            if (sizeof($epin)==1)  {
                
                if ($epin[0]['IsUsed']==0) {
                    
                    $data = md5($epin[0]['EPIN'].$epin[0]['PINPassword'].$epin[0]['EPINID']);
                    ?>
                    <form action="createmember" id="signupCForm" method="post">
                        <input type="hidden" value="<?php echo $data;?>" name="data">
                        <div class="form-group">
                            <label for="Epin">Sponser ID</label>
                            <input type="text" class="form-control" readonly="readonly" value="<?php echo $epin[0]['OwnToCode'];?>">
                        </div>
                        <div class="form-group">
                            <label for="Epin">Sponser Name</label>
                            <input type="text" class="form-control" readonly="readonly"  value="<?php echo $epin[0]['OwnToName'];?>">
                        </div>
                        <div class="form-group">
                            <label for="Epin">E-Pin</label>
                            <input type="text" class="form-control" readonly="readonly"  value="<?php echo $epin[0]['EPIN'];?>">
                        </div>
                        <button class="btn btn-primary btn-block my-4" name="submitBtn" type="submit">Confirm & Continue</button>
                    </form>
                    <?php
                    $isSuccess=true;                   

                } else {
                    $error = "Entered epin already used.";
                }
            } else {
                $error = "Invalid epin & pin password.";
            }

        }   
    
    if (!(isset($isSuccess) && $isSuccess==true)) {
    ?>
    <form action="signup" id="signupForm" method="post">
                 <div class="form-group">
                  <label for="Epin">E-Pin</label>
                  <input type="text" class="form-control" name="Epin" value="<?php echo isset($_POST['Epin']) ? $_POST['Epin'] : "";?>" id="Epin" required placeholder="Enter Epin">
                </div>
                <div class="form-group">
                  <label for="PinPassword">Pin Password</label>
                  <input type="password" class="form-control" name="PinPassword" value="<?php echo isset($_POST['PinPassword']) ? $_POST['PinPassword'] : "";?>" id="PinPassword" required placeholder="Enter Pin Password">
                </div>
                 <div class="form-group">
                    <label style="color:red;"><?php echo $error;?></label>
                 </div>
                <button class="btn btn-primary btn-block my-4" name="submitBtn" type="submit">Continue Sign Up</button>
              </form>
    <p class="text-3 text-muted text-center mb-0">Already have an account? <a class="btn-link" href="login">Log In</a></p>
    <?php } ?>
    </div>
    </div>