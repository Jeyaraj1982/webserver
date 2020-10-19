 <?php
 class MySqldatabase
    {
        public $link   = "";
        public $qry    = "";

        public function __construct($dbHost, $dbUser, $dbPass, $dbName)
        {
            $this->link = new PDO("mysql:host=" . $dbHost . ";dbname=" . $dbName, $dbUser, $dbPass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function select($sql)
        {
             
            try {
                $stmt = $this->link->prepare($sql);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt->fetchAll();
            } catch (PDOException $e) {
                
                return array();
            }
        }

        public function insert($tableName, $rowData)
        {
            $r = "insert into `" . $tableName . "` (";
            $l = " values (";
            foreach ($rowData as $key => $value) {
                $r .= "`" . $key . "`,";
                $l .= ($value == "Null") ? "Null," : "'" . $value . "',";
            }
            $sql = substr($r, 0, strlen($r) - 1) . ")" . substr($l, 0, strlen($l) - 1) . ")";
            
            $this->qry = $sql;
            try {
                $this->link->exec($sql);
                $last_id = $this->link->lastInsertId();
                return $last_id;
            } catch (PDOException $e) {
               
                return 0;
            }
        }

        public function execute($sql)
        {
            
            try {
                return $this->link->exec($sql);
            } catch (PDOException $e) {
                
                return 0;
            }
        }

        public function __destruct()
        {
            $this->link = null;
        }

  
}
 
  
    
$mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");
?>
  <!-- Content
  ============================================= -->
  <div id="content">
  <div class="login-signup-page mx-auto my-5">
      <h3 class="font-weight-400 text-center">Sign In</h3>
      <p class="lead text-center">Your login information is safe with us.</p>
      <div class="bg-light shadow-md rounded p-4 mx-2">
      <?php
        if (isset($_POST['submitBtn'])) {
            
            // $sql= "select * from `_tbl_Members` where  `MemberPassword`='".$_POST['loginPassword']."' and `MemberEmail`='".$_POST['emailAddress']."'";
            //$sql= "select * from `_tbl_Members` where  `MemberEmail`='".$_POST['emailAddress']."'";
            $sql= "select * from `_tbl_Members` where  `MemberCode`='".$_POST['emailAddress']."'";
            $data = $mysqldb->select($sql);
            
            if (sizeof($data)>0) {
                
                if ($data[0]['MemberPassword']==$_POST['loginPassword']) {
                    $_SESSION['User']=$data[0];                   
                   $id=$mysqldb->insert("_tbl_members_login_logs",array("MemberID"   =>$_SESSION['User']['MemberID'],
                                                                        "LoginOn"    =>date("Y-m-d H:i:s"),
                                                                         "IsSuccess" =>"1")); 
                    ?>
                 <script>location.href='app/dashboard.php';</script>
                 <?php
                } else {
                     echo    "<span style='color:red'>Member ID password incorrect</span>";
                   $id=$mysqldb->insert("_tbl_members_login_logs",array("MemberID"   =>$_SESSION['User']['MemberID'],
                                                                        "LoginOn"    =>date("Y-m-d H:i:s"),
                                                                         "IsSuccess" =>"0")); 
                } 
                   
                 
                 
           }   else {
            echo    "<span style='color:red'>login failed</span>";
                         
           }   
       }
      ?>
      <form id="loginForm" method="post">
          <div class="form-group">
          <label for="emailAddress">Member ID</label>
          <input type="text" class="form-control" name= "emailAddress" id="emailAddress" required placeholder="Enter Your Member ID">
        </div>
          <div class="form-group">
          <label for="loginPassword">Password</label>
          <input type="password" class="form-control" name= "loginPassword" id="loginPassword" required placeholder="Enter Password">
        </div>
          <div class="row">
          <div class="col-sm">
              <div class="form-check custom-control custom-checkbox">
              <input id="remember-me" name="remember" class="custom-control-input" type="checkbox">
              <label class="custom-control-label" for="remember-me">Remember Me</label>
            </div>
            </div>
          <div class="col-sm text-right"><a class="btn-link" href="#">Forgot Password ?</a></div>
        </div>
          <button class="btn btn-primary btn-block my-4"  name="submitBtn" type="submit">Sign In</button>
        </form>
      <p class="text-3 text-muted text-center mb-0">Don't have an account? <a class="btn-link" href="signup-3.html">Sign Up</a></p>
    </div>
    </div>
  <!-- Content end -->
