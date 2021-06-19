<div class="container-fluid" style="padding-top:30px;">
<?php
    
    if (isset($_POST['CreateBtn'])) {
        
        $error=0;
        
        if (strlen(trim($_POST['ClientID']))==0) {
            $ClientID = "Please enter Client ID";
            $error++;
        }
        $ClientDetails = $mysql->select("select * from _tbl_master_clients where   ClientID='".$_POST['ClientID']."'");
        $client_data =  $ClientDetails;
        if (sizeof($ClientDetails)==0) {
            $ClientID = "Invalid Client ID";
            $error++; 
        } else {
            if ($ClientDetails[0]['IsActive']==0) {
               $ClientID = "Currently, this client is not active.";
               $error++;  
            }
            
        }
     
        if ($error==0) {
            
           ?>
           
            <div class="card">
    <div class="card-header" style="padding:20px 40px !important">
        <div class="row">
            <div class="col-md-6">
                <h5 style="margin-top:5px">Client Information</h5>
            </div>
             
             
        </div>
    </div>
    <div class="card-body" style="padding-top:25px !important">
          <div class="row"> 
        <div class="col-sm-12">
                        <div class="row g-3  mb-3">
                            <div class="col-md-9">
                                 <label class="form-label" for="validationCustom01" style="font-weight:bold;">Client ID</label> :&nbsp;&nbsp;  <?php echo   $client_data[0]['ClientID'];?>&nbsp; <br>
                                <label class="form-label" for="validationCustom01" style="font-weight:bold;margin-top:10px">Client's Name</label><br>
                                <?php echo   $client_data[0]['ClientName'];?>&nbsp;<br><br>
                                
                                <label class="form-label" for="validationCustom03" style="font-weight:bold">Father/Husband Name</label><br>
                                <?php echo   $client_data[0]['FatherName'];?>&nbsp;
                            
                            </div>
                            <div class="col-md-3" style="text-align: right;">
                               
                              
                                
                                <?php if (strlen(trim($client_data[0]['ProfilePhoto']))>0) { ?>
                                <img src="<?php echo $client_data[0]['ProfilePhoto'];?>" style="max-width: 100%;height:160px;border:1px solid #ccc;padding:3px;border-radius:3px;background:#fff"> 
                                <?php } else { ?>
                                <img src="assets/app/noimage.jpg" style="max-width: 100%;height:160px;border:1px solid #ccc;padding:3px;border-radius:3px;background:#fff">
                                <?php } ?>
                            </div>
                            
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-3">
                                <label class="form-label" for="validationCustom01"  style="font-weight:bold;">Gender</label><br>
                                <?php echo   $client_data[0]['Gender'];?>&nbsp;<bR><br>
                            </div>
                            
                            <div class="col-md-3">
                                <label class="form-label" for="validationCustom01"  style="font-weight:bold;">Client Type</label><br>
                                <?php echo   $client_data[0]['ClientTypeName'];?>&nbsp;<bR><br>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="validationCustom03"  style="font-weight: bold;">Date of Birth</label> <br>
                                <?php echo   $client_data[0]['DateOfBirth'];?>&nbsp;
                          </div>
                           <div class="col-md-3">
                                <label class="form-label" for="validationCustom01"   style="font-weight: bold;">Religion / Nationality</label><br>
                                <?php echo $client_data[0]['ReligionName'];?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php echo $client_data[0]['NationalityName'];?>
                            </div>  
                            
                        </div>
                        <div class="row g-3 mb-3">
                           
                            <div class="col-md-3">
                                <label class="form-label" for="validationCustom02"  style="font-weight: bold;">Email</label> <br>
                                <?php echo   $client_data[0]['EmailID'];?>&nbsp;
                            </div>
                             <div class="col-md-3">
                                <label class="form-label" for="validationCustomUsername"  style="font-weight: bold;">Mobile Number</label><br>
                                <?php echo   $client_data[0]['MobileNumber'];?>&nbsp;
                            </div>
                            
                             <div class="col-md-3">
                                <label class="form-label" for="validationCustom03"  style="font-weight: bold;">Alternative Contact Numbers</label><br>
                                <?php echo   $client_data[0]['PersonalAlternativeNumbers'];?>&nbsp;
                            </div>
                         
                                                          <div class="col-md-3">
                                <label class="form-label" for="validationCustomUsername"  style="font-weight: bold;">Whatsapp Number</label> <br>
                                <?php echo   $client_data[0]['WhatsappNumber'];?>&nbsp;
                            </div>

                            
                                                                                 
                           
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12" style="text-align: right;">
                              <a href="dashboard.php?action=Cases/add&client=<?php echo md5($client_data[0]['CreatedOn'].$client_data[0]['ClientID']);?>" class="btn btn-primary">Continue</a>
                            </div>
                        </div>
                         
                        
               
            
        </div>
        </div>
    
    
     
    </div>
</div>
           <script>
            //location.href='dashboard.php?action=Dashboard/<?php echo $_GET['redirect'];?>&case=<?php echo md5($CaseDetails[0]['CreatedOn'].$CaseDetails[0]['CaseID']);?>';
           </script>
           <style>
           #clientform{display:none}
           </style>
           <?php
           
        }  else {
            ?>
               <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-danger outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                      <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b>Couldn't able to find customer information.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
            <?php
        }
    }
?>
    <div class="row" id="clientform">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" id="case_new_customer_search" name="case_new_customer_search" onsubmit="return formvalidation('case_new_customer_search')" >
                        <input type="hidden" id="selectedClientID" value="0" name="ClientID">
                        <div class="row g-3  mb-3">
                            <div class="col-md-9 autocomplete">
                                <label class="form-label" for="validationCustom01">Client Name</label> <br>
                                <!--<input class="form-control" id="ClientID" name="ClientID" type="text" placeholder="Client ID" value="<?php echo isset($_POST['ClientID']) ? $_POST['ClientID'] : "";?>">-->
                                
                                 
                                    <input id="ClientID" class="form-control" type="text" name="ClientName" placeholder="Client Name" autocomplete="off">
                                
                                <div id="ErrClientID" style="color:red"><?php echo isset($ClientID) ? $ClientID : "";?></div>
                            </div>
                          
                       
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                            
              <style>
              
              .autocomplete {
  position: relative;
  display: inline-block;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
  margin:0px 10px;
}

.autocomplete-items div {
  padding: 5px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
              </style>              
                           
  
  

<script>  
var selectedID=0; 
function autocomplete(inp, arr) {
    selectedID = 0;
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/ 
     
       $.each(arr, function(i, item) {
        /*check if the item starts with the same letters as the text field value:*/
        if ( (item.text.substr(0, val.length).toUpperCase() == val.toUpperCase()) ||  (item.MobileNumber.substr(0, val.length).toUpperCase() == val.toUpperCase()) ||  (item.ClientID.substr(0, val.length).toUpperCase() == val.toUpperCase()) ) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          html = "<span class='row' style='background:none;'>";
            html += "<span class='col-sm-2' style='background:none'>"+item.ClientID+"</span>";
            html += "<span class='col-sm-4' style='background:none'>"+item.ClientName+"</span>";
            html += "<span class='col-sm-3' style='background:none'>"+item.MobileNumber+"</span>";
            html += "<span class='col-sm-3' style='background:none'>"+item.Address+"</span>";
          html += "</span>"
          
          //b.innerHTML = "<strong>" + item.text.substr(0, val.length) + "</strong>";
          //b.innerHTML += item.text.substr(val.length);
          
          b.innerHTML = html;
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + item.text+ "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              selectedID = item.value;
              $('#ErrClientID').html("");
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      });
      
  });
  
  
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      selectedID = 0;
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
      selectedID = 0;
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
      selectedID=0;
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
      
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
<?php 
$clients = $mysql->select("select ClientID, ClientID as value,ClientName as text, ClientName, MobileNumber,ContactAddressLine1 as Address from _tbl_master_clients where IsActive='1' order by ClientName");
?>
var countries = <?php echo json_encode($clients);?>;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("ClientID"), countries);
</script>  
                                <button class="btn btn-primary" type="submit" name="CreateBtn" id="CreateBtn">Go!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                               