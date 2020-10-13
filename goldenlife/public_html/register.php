<?php include_once("header.php");?>
<style>
.form-control{
display: block;
width: 100%;
padding: .375rem .75rem;
font-size: 1rem;
line-height: 1.5;
color: #495057;
background-color: #fff;
background-clip: padding-box;
border: 1px solid #ced4da;
border-radius: .25rem;
transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
} 
#btnLogin[type="submit"] {
    background: #E91E63;
    border: 0;
    border-radius: 3px;
    padding: 10px 30px;
    color: #fff;
    transition: 0.4s;
    cursor: pointer;
}                                         
#btnLogin[type="submit"]:hover {
    background: #081e5b;
}
.errorstring{color:red;font-size:11px;}


.container_c ul{
  list-style: none;
  margin: 0;
  padding: 0;
    overflow: auto;
}
.container_c ul li{
  color: #333;
  display: block;
  position: relative;
  float: left;
  height: 100px;
}
.container_c ul li input[type=radio]{
  position: absolute;
  visibility: hidden;
}
.container_c ul li label{
  display: block;
  position: relative;
  font-weight: 300;
  font-size: 1.35em;
  padding: 16px 25px 25px 80px;
  margin: 10px auto;
  height: 30px;
  z-index: 9;
  cursor: pointer;
  -webkit-transition: all 0.25s linear;
  font-weight:bold;
}
.container_c ul li:hover label{
    color: #666;
}
.container_c ul li .check{
  display: block;
  position: absolute;
  border: 5px solid #AAAAAA;
  border-radius: 100%;
  height: 25px;
  width: 25px;
  top: 30px;
  left: 20px;
    z-index: 5;
    transition: border .25s linear;
    -webkit-transition: border .25s linear;
}

.container_c ul li:hover .check {
  border: 5px solid orange;
}

.container_c ul li .check::before {
  display: block;
  position: absolute;
    content: '';
  border-radius: 100%;
  height: 9px;                                   
  width: 9px;
  top: 3px;
    left: 3px;                    
  margin: auto;
    transition: background 0.25s linear;
    -webkit-transition: background 0.25s linear;
}

input[type=radio]:checked ~ .check {
  border: 5px solid #E91E63;
}

input[type=radio]:checked ~ .check::before{
  background: #E91E63;
}

input[type=radio]:checked ~ label{
  color:#E91E63;
}

.download{
    color:#333;
}
.download:hover{
     color:#E91E63;
}
</style>
    <?php
        $_SESSION['epin']=array();
        if (isset($_POST['btnRegister'])) {
            $d=$mysql->select("select * from `_tbl_epins` where `PinCode`='".$_POST['EPin']."' and `EPinPassword`='".$_POST['EPinPassword']."'");
            if (sizeof($d)>0) {
                $_SESSION['epin']=$d[0];
                echo "<script>location.href='createmember.php';</script>"; 
            } else {
                $ErrEPinPassword = "Invalid E-Pin or E-Pin Password";
            }
        } 
    ?>
    <section id="intro" style="background:#fcf4cf;">
        <div class="form-group row"> 
            <div class="col-sm-2"></div>
            <div class="col-sm-8" style="margin-top: 5%;">
                <h2>GLS Member Registration</h2>
                <div class="container"  style="padding-bottom: 35px;"> 
                    <div class="container_c">
                        <ul>
                            <li>
                                <input type="radio" checked="checked" value="1" id="f-option" name="selector">
                                <label for="f-option">I have epin & sponsor details</label>
                                <div style="padding-left: 82px;font-size: 14px;color: #666;">I have sponsor ID, Epin and Epin Password</div>
                                <div class="check"></div>
                            </li>
                              <li>
                                <input type="radio" id="f-option1" value="2" name="selector">
                                <label for="f-option1">I have only epin details</label>
                                <div style="padding-left: 82px;font-size: 14px;color: #666;">I have Epin and Epin Password but not have sponsor ID</div>
                                <div class="check"></div>
                            </li>
                          <!--  <li>
                                <input type="radio" id="s-option2" value="3" name="selector">
                                <label for="s-option2">I have only sponsor</label>
                                <div style="padding-left: 82px;font-size: 14px;color: #666;">I don't have Epin details but i have sponsor ID</div>
                                <div class="check"><div class="inside"></div></div>
                            </li>  -->
                            <li>
                                <input type="radio" id="s-option3" value="4" name="selector">
                                <label for="s-option3">I don't have epin & sponsor details</label>
                                <div class="check"><div class="inside"></div></div>
                                <div style="padding-left: 82px;font-size: 14px;color: #666;">I don't have Epin Details & sponsor ID</div>
                            </li>  
                        </ul>
                    </div>
                    <br><br>
                    <div class="form-group row">
                            <div class="col-sm-12">
                            <button type="button" class="btn btn-primary" onclick="DoNext()" id="btnLogin" name="btnRegister">Continue</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="assets/GLS_Registration_Form.pdf" class="download">download application</a>
                            
                            </div>
                        </div>
                </div>                                                                                                                         
            </div>
            <div class="col-sm-2"></div>
        </div>
  </section>                                        
  <script>
    function DoNext() {
        
                    var radioValue = $("input[name='selector']:checked").val();

            if(radioValue==1){
                location.href="esregister.php";
            }
            
                        if(radioValue==2){
                location.href="eregister.php";
            }
            
               if(radioValue==3){
                location.href="sregister.php";
            }
            
            
               if(radioValue==4){
                location.href="nesregister.php";
            }

    }
  </script>
<?php include_once("footer.php");?>