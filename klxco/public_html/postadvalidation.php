<script>
$(document).ready(function(){
        
        $("#title").blur(function() {
            $('#Errtitle').html("");   
            var title = $('#title').val().trim();
            if (title.length==0) {
                $('#Errtitle').html("Please Enter Title"); 
            } 
        });
        
        $("#content").blur(function(){
            $('#Errcontent').html("");
            var m = $('#content').val().trim();
            if (m.length==0) {
                $('#Errcontent').html("Please Enter Description");
            }
        });
     /*   $("#uploadimage1").blur(function(){
            $('#Errimage1').html("");
            $('#div_1').css({"border": "1px solid #ccc"});
            var m = $('#uploadimage1').val().trim();
            if (m=="") {
                $('#Errimage1').html("Please Upload Image");
                $('#div_1').css({"border": "1px solid red"});
            }
        }); */
        
       $("#countryid").blur(function(){     
           $('#Errcountryid').html("");   
        var cnt = $('#countryid').val().trim();
            if (cnt==0) {
                $('#Errcountryid').html("Please Select Country");
            }
        });
        $("#state").blur(function(){   
         $('#Errstate').html("");  
        var st = $('#state').val().trim();
            if (st==0) {
                $('#Errstate').html("Please Select State");
            }
        });
        $("#district").blur(function(){    
            $('#Errdistrict').html("");  
        var ds = $('#district').val().trim();
            if (ds==0) {
                $('#Errdistrict').html("Please Select District");
            }
        });
        $("#city").blur(function(){  
        $('#Errcity').html("");    
        var cty = $('#city').val().trim();
            if (cty==0) {
                $('#Errcity').html("Please Select City");
            }
        });
       /* $("#location").blur(function(){   
        $('#Errlocation').html("");     
        var loc = $('#location').val().trim();
            if (loc.length==0) {
                $('#Errlocation').html("Please Enter Location");
            } 
        });  */
        <?php if($_GET['subc']!="77") {?>
        $("#amount").blur(function(){    
        var amt = $('#amount').val().trim();
        $('#Erramount').html("");
        if (amt.length==0) {
                $('#Erramount').html("Please enter Amount");
            } else {
                if (!(parseFloat(amt)>=10 && parseFloat(amt)<=1000000)) {
                    $('#Erramount').html("Amount must have Rs.10 to  Rs.1000000");
                }
            }   
        });
        <?php } ?>
        <?php if($_GET['subc']=="20" || $_GET['subc']=="21" || $_GET['subc']=="4" || $_GET['subc']=="22") {?>
        $("#SuperBuildUpArea").blur(function(){     
           $('#ErrSuperBuildUpArea').html("");   
        var cnt = $('#SuperBuildUpArea').val().trim();
            if (cnt==0) {
                $('#ErrSuperBuildUpArea').html("Please Enter Super Build Up Area");
            }
        });
        $("#CarpetArea").blur(function(){     
           $('#ErrCarpetArea').html("");   
        var cnt = $('#CarpetArea').val().trim();
            if (cnt==0) {
                $('#ErrCarpetArea').html("Please Enter Carpet Area");
            }
        });
        <?php } ?>
        <?php if($_GET['subc']=="96") {?>
        $("#Brand").blur(function(){     
           $('#ErrBrand').html("");   
        var cnt = $('#Brand').val().trim();
            if (cnt==0) {
                $('#ErrBrand').html("Please Select Brand Name");
            }
        });
        <?php } ?>
        <?php if($_GET['subc']=="24") {?>
        $("#PlotArea").blur(function(){     
           $('#ErrPlotArea').html("");   
        var cnt = $('#PlotArea').val().trim();
            if (cnt==0) {
                $('#ErrPlotArea').html("Please Select Plot Area");
            }
        });
        <?php } ?>
        <?php if($_GET['subc']=="60" || $_GET['subc']=="61") { ?>
        $("#Brand").blur(function(){     
           $('#ErrBrand').html("");   
        var cnt = $('#Brand').val().trim();
            if (cnt==0) {
                $('#ErrBrand').html("Please Select Brand Name");
            }
        });
        $("#Year").blur(function() {
            $('#ErrYear').html("");   
            var title = $('#Year').val().trim();
            if (title.length==0) {
                $('#ErrYear').html("Please Enter Year"); 
            } 
        });
        $("#KMDriven").blur(function() {
            $('#ErrKMDriven').html("");   
            var KMDriven = $('#KMDriven').val().trim();
            if (KMDriven.length==0) {
                $('#ErrKMDriven').html("Please Enter KMDriven"); 
            } 
        });
        <?php } ?>
        <?php if($_GET['subc']=="62" || $_GET['subc']=="65" || $_GET['subc']=="66") { ?>
        
        $("#Year").blur(function() {
            $('#ErrYear').html("");   
            var title = $('#Year').val().trim();
            if (title.length==0) {
                $('#ErrYear').html("Please Enter Year"); 
            } 
        });
        $("#KMDriven").blur(function() {
            $('#ErrKMDriven').html("");   
            var KMDriven = $('#KMDriven').val().trim();
            if (KMDriven.length==0) {
                $('#ErrKMDriven').html("Please Enter KMDriven"); 
            } 
        });
        <?php } ?>
        
        
    });
    
    function dovalidation() {
       $('#Errtitle').html("");   
       $('#Errcontent').html("");
       $('#Errimage1').html("");
       $('#Errcountryid').html("");
       $('#Errstate').html("");
       $('#Errdistrict').html("");
       $('#Errcity').html("");
       //$('#Errlocation').html("");
       $('#ErrBrand').html("");
       $('#ErrBrand').html("");
       $('#ErrYear').html("");
       $('#ErrKMDriven').html("");
       $('#Erramount').html("");
       $('#ErrSuperBuildUpArea').html("");
       $('#ErrCarpetArea').html("");
       $('#ErrPlotArea').html("");
       
       error=0;
       
       var title = $('#title').val().trim();
       if (title.length==0) {
            $('#Errtitle').html("Please Enter Title"); 
            error++;
        } 
        var m = $('#content').val().trim();
            if (m.length==0) {
                $('#Errcontent').html("Please Enter Description");
                error++;
            }
      /*  var im = $('#uploadimage1').val().trim();
            if (im=="") {
                $('#Errimage1').html("Please Upload Image");
                $('#div_1').css({"border": "1px solid red"});
                error++;
            }   */
        var cnt = $('#countryid').val().trim();
            if (cnt==0) {
                $('#Errcountryid').html("Please Select Country");
                error++;
            }
        var st = $('#state').val().trim();
            if (st==0) {
                $('#Errstate').html("Please Select State");
                error++;
            }
        var ds = $('#district').val().trim();
            if (ds==0) {
                $('#Errdistrict').html("Please Select District");
                error++;
            }
        var cty = $('#city').val().trim();
            if (cty==0) {
                $('#Errcity').html("Please Select City");
                error++;
            }
      /*  var loc = $('#location').val().trim();
            if (loc.length==0) {
                $('#Errlocation').html("Please Enter Location");
                error++;
            } */
        <?php if($_GET['subc']<>"77") {?>
        $("#amount").blur(function(){    
        var amt = $('#amount').val().trim();   
        $('#Erramount').html("");
        if (amt.length==0) {
                $('#Erramount').html("Please enter Amount");
                error++;
            } else {
                if (!(parseFloat(amt)>=10 && parseFloat(amt)<=1000000)) {
                    $('#Erramount').html("Amount must have Rs.10 to  Rs.1000000");
                    error++;
                }
            }   
        });       
        <?php } ?>
        <?php if($_GET['subc']=="96") {?>
            var Brand = $('#Brand').val().trim();
           if (Brand==0) {
                $('#ErrBrand').html("Please Enter Brand Name"); 
                error++;
            }        
        <?php } ?>
        <?php if($_GET['subc']=="24") {?>
            var Brand = $('#PlotArea').val().trim();
           if (Brand==0) {
                $('#ErrPlotArea').html("Please Enter Plot Area"); 
                error++;
            }        
        <?php } ?>
        <?php  if($_GET['subc']=="60" || $_GET['subc']=="61") { ?>
                var Brand = $('#Brand').val().trim();
                   if (Brand==0) {
                        $('#ErrBrand').html("Please Enter Brand Name"); 
                        error++;
                    }
                   var Year = $('#Year').val().trim();
                   if (Year.length==0) {
                        $('#ErrYear').html("Please Enter Year"); 
                        error++;
                    }
                    var KMDriven = $('#KMDriven').val().trim();
                       if (KMDriven.length==0) {
                            $('#ErrKMDriven').html("Please Enter KM Driven"); 
                            error++;
                        }
        <?php } ?>
        <?php  if($_GET['subc']=="62" || $_GET['subc']=="65" || $_GET['subc']=="66") { ?>
               
                   var Year = $('#Year').val().trim();
                   if (Year.length==0) {
                        $('#ErrYear').html("Please Enter Year"); 
                        error++;
                    }
                    var KMDriven = $('#KMDriven').val().trim();
                       if (KMDriven.length==0) {
                            $('#ErrKMDriven').html("Please Enter KM Driven"); 
                            error++;
                        }
        <?php } ?>
        <?php if($_GET['subc']=="20" || $_GET['subc']=="21" || $_GET['subc']=="4" || $_GET['subc']=="22") {?>
        var cnt = $('#SuperBuildUpArea').val().trim();
            if (cnt==0) {
                $('#ErrSuperBuildUpArea').html("Please Enter Super Build Up Area");
                 error++;
            }
        var cnt = $('#CarpetArea').val().trim();
            if (cnt==0) { 
                $('#ErrCarpetArea').html("Please Enter Carpet Area");
                 error++;
            }
        <?php } ?>
       if (error>0) {
            return false;
        }else{
            return true;
        }
    }
</script>