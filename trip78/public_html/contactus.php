<?php include_once("header.php");?>

    <main class="main">        
        <div class="wrap">
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="index.php" title="Home">Home</a></li>
                    <li><a title="Travel guides">Contact</a></li>                   
                </ul>
            </nav>
            <div class="row">
                <div class="three-fourth">
                    <h1 style="padding:0px">Contact us</h1>
                    <aside class="one-fourth right-sidebar lower" style="margin-top: 0px;width:100%">
                        <article class="widget">
                            <h4>Address</h4>
                            <fieldset>
                                <b>Welcome Holidays</b><br>
                                520/3A, South Bye Pass Road,<br>
                                Tirunelveli,<br>
                                Tamil Nadu 628005<br>
                            </fieldset>
                        </article> 
                    </aside>                                                                     
                    <div class="map-wrap">
                        <div id="map-container-google-9" class="z-depth-1-half map-container-5" style="height: 300px">
                            <iframe src="https://maps.google.com/maps?q=tirunelveli&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0;height:576px" allowfullscreen ></iframe>
                        </div>
                    </div>
                </div>                                                                                               
                <aside class="one-fourth right-sidebar lower">
                    <article class="widget">
                        <h4>Send us a message</h4>
                        <form method="post" action="" name="contactform" id="contactform">
                            <fieldset>
                                <div id="message"><?php echo $successmessage;?></div>
                                <div class="row">
                                    <div class="f-item full-width">
                                        <label for="name">Your name</label>
                                        <input type="text" id="name" name="name" value="" />
                                        <span id="Errname" style="font-size: 11px;color:red"></span>
                                    </div>
                                    <div class="f-item full-width">
                                        <label for="email">Your e-mail</label>
                                        <input type="email" id="email" name="email" value="" />
                                        <span id="Erremail" style="font-size: 11px;color:red"></span>
                                    </div>
                                    <div class="f-item full-width">
                                        <label for="email">Your mobile number</label>
                                        <input type="email" id="mobilenumber" name="mobilenumber" maxlength="10" value="" />
                                        <span id="Errmobilenumber" style="font-size: 11px;color:red"></span>
                                    </div>
                                    <div class="f-item full-width">
                                        <label for="comments">Your message</label>
                                        <textarea id="comments" name="comments" rows="10" cols="10"></textarea>
                                    </div>
                                    <div class="f-item full-width">
                                        <button type="button" onclick="AddAdditionalDetails()" id="submit" name="submit" class="gradient-button">Send</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </article>
                    <article class="widget">
                        <h4>Or contact us directly</h4>
                        <p class="number">096775 36373 , 96267 87878</p>
                        <p class="email"><a href="#">booking@mail.com</a></p>
                    </article>
                </aside>
            </div>
        </div>
    </main>
    <div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="confrimation_text">    
             
        </div>
      </div>
    </div>
   <?php include_once("footer.php");?>
   
    <script type="text/javascript">
    function AddAdditionalDetails() {
        
        ErrorCount=0;   
         
        $('#Errname').html("");
        $('#Erremail').html("");
        $('#Errmobilenumber').html("");
        
        if(IsNonEmpty("name","Errname","Please Enter Your Name")){
           IsAlphaNumeric("name","Errname","Please Enter Your Alpha Numeric Characters Only"); 
        }
        if(IsNonEmpty("email","Erremail","Please Enter Your Email")){
           IsEmail("email","Erremail","Please Enter Valid Email"); 
        }
        if(IsNonEmpty("mobilenumber","Errmobilenumber","Please Enter Your Mobile Number")){
           IsMobileNumber("mobilenumber","Errmobilenumber","Please Enter Valid Mobile Number"); 
        }
        
        if(ErrorCount==0){
        
         var param = $( "#contactform").serialize();
        $.post( "webservice.php?action=SubmitContactDetails",param,function(data) {                                       
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {                                                                                                                                                                                                                                                                                        
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='images/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='gradient-button' data-dismiss='modal'>Cancel</button></div></div>"; 
            } else {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='images/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a href='' class='gradient-button' style='color:white'>Continue</button></div></div>";
                html += "</div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }else {
        return false;
    }
    }
    </script>
    