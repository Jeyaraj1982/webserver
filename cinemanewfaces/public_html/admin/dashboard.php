<?php
    include_once("../config.php");
?>
<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
 
.topnavx {
  overflow: hidden;
  background-color: #333;
}

.topnavx a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnavx .icon {
  display: none;
}

.dropdownx {
  float: left;
  overflow: hidden;
}

.dropdownx .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnavx a:hover, .dropdownx:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdownx:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnavx a:not(:first-child), .dropdownx .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnavx.responsive {position: relative;}
  .topnavx.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnavx.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnavx.responsive .dropdownx {float: none;}
  .topnavx.responsive .dropdown-content {position: relative;}
  .topnavx.responsive .dropdownx .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
<div class="topnavx" id="myTopnav">
 
  <div class="dropdownx">
    <button class="dropbtn">Directory 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a class="hmenu" href="dashboard.php?action=AddProfileList">Add Directory</a>
      <a class="hmenu" href="dashboard.php?action=ListDirectories">List Directories</a>
    </div>
  </div> 
  
  <div class="dropdownx">
    <button class="dropbtn">Scrolling 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
        <a class="hmenu" href="dashboard.php?action=AddScrollings">Add Scrolling</a>
        <a class="hmenu" href="dashboard.php?action=ListScrollings">List Scrollings</a>
    </div>
  </div>
  
  <div class="dropdownx">
    <button class="dropbtn">Payment-PayU 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
        <a class="hmenu" href="dashboard.php?action=PGTxn">List All Transaction</a>

    </div>
  </div>
  
  <div class="dropdownx">
    <button class="dropbtn">Profiles 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
        <a class="hmenu" href="dashboard.php?action=List">List All Profiles</a>
<a class="hmenu" href="dashboard.php?action=List&f=Artist">List All Artist</a>
<a class="hmenu" href="dashboard.php?action=List&f=director">List All Director</a>
<a class="hmenu" href="dashboard.php?action=List&f=musicdirector">List All Music Director</a>
<a class="hmenu" href="dashboard.php?action=List&f=artdirector">List All Art Director</a>
<a class="hmenu" href="dashboard.php?action=List&f=makeupman">List All Makeup Man</a>
<a class="hmenu" href="dashboard.php?action=List&f=technician">List All Technician</a>
<a class="hmenu" href="dashboard.php?action=List&f=others">List All Others</a> 

    </div>
    
     
  
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

 

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
  








                      
                            
</div>
<br><br>

<div>
    <?php include_once($_GET['action'].".php");?>
</div>