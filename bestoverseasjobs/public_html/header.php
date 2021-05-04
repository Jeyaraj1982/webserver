<?php include_once("config.php");?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta https-equiv="Content-Type" content="text/html; charset=windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="https://www.emeraldisle.lk/">
        <link rel="shortcut icon" href="favi/favicon.ico">
        <link rel="shortcut icon" href="images/photo.jpg" type="image/jpeg">
        <title></title>
	    <link rel="stylesheet" href="https://www.emeraldisle.lk/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://www.emeraldisle.lk/css/animations.css">
		<link rel="stylesheet" href="https://www.emeraldisle.lk/css/font-awesome.css">
	    <link rel="stylesheet" href="https://www.emeraldisle.lk/css/main.css?v=a7a4228c26f0bfb0d506aea070270b7c">
	    <link rel="stylesheet" href="https://www.emeraldisle.lk/css_new/bootstrap.css?v=5109c2a775538d6b6d0d892a2256f090">
        <link rel="stylesheet" href="https://www.emeraldisle.lk/css_new/fonts/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="https://www.emeraldisle.lk/css_new/style1.css?v=249db7619024cbfe2720672cf951f4a5">
        <link rel="stylesheet" href="https://www.emeraldisle.lk/css_new/colors/green.css?v=a6083320c1dd9bb1a893aa2f87f41423" class="colors">
        <link rel="stylesheet" href="https://www.emeraldisle.lk/css_new/theme-responsive.css?v=76d7b8f612d0eae54136fdb89fb28302">
</head>
<style>
.dss {
    background: linear-gradient(130deg, #28a745 80%, #fff  60%); 
    color: #9a9a9a;
}
.black_overlay {
  display: none;
  position: absolute;
  top: 0%;
  left: 0%;
  width: 100%;
  height: 100%;
  background-color: black;
  z-index: 1001;
  -moz-opacity: 0.8;
  opacity: .80;
  filter: alpha(opacity=80);
}
.white_content {
  display: none;
  position: absolute;
  top:20px; 
        left:10%; 
 position:fixed; 
  width: 80%;
height: 95%;

  padding: 16px;
  border: 16px solid orange;
  background-color: white;
  z-index: 1002;
  overflow: auto;
}
.ls.mse {
    background-color: #0000000d;
    color: #6e6e6e;

}
.modal-contents {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    width: 750px;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: .3rem;
    outline: 0;
}

.modal-footers {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: end;
    justify-content: center;
    padding: 1rem;
    border-top: 1px solid #e9ecef;
}
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    vertical-align: middle;
  margin-left: middle;
  margin-right: middle;
    cursor: pointer;
}
.texts-center {
    text-align: left!important;
}
.flip-container {perspective: 1000px; transform-style: preserve-3d;}
.flip-container:hover .back {transform: rotateY(0deg);}
.flip-container:hover .front {transform: rotateY(180deg);}
.flip-container, .front, .back {
  width: 320px;
  height: 220px;
  margin: 0 30px 35px 0;
  float:left;
}

.flipper {transition: 0.6s; transform-style: preserve-3d;	position: relative;}

/* hide back of pane during swap */
.front, .back {
	backface-visibility: hidden;
	transition: 0.6s;
	transform-style: preserve-3d;
	position: absolute;
	   background-image: url("images/user1.png");
	top: 0;
	left: 0;
}

.front {z-index: 2;	transform: rotateY(0deg);}
.back {
	transform: rotateY(-180deg);
  background: #bbb;
  color: #000;
  text-align:center;
  line-height:2.4em;
    background-image: url("images/user2.png");

}

.vertical.flip-container {position: relative;}
.vertical .back {	transform: rotateX(180deg);}
.vertical.flip-container:hover .back  {transform: rotateX(0deg);}
.vertical.flip-container:hover .front {transform: rotateX(180deg);}
.front { color:#fff; text-align:center;  background-image: url("images/user1.png")}
h1{ padding-top:25px; color:#fff;}
a {
    color: #484848;
    text-decoration: none;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 100%;
  border-radius: 10px;
    text-align: center;
  padding: 15px 20px;
}
.iframe-container {
  overflow: hidden;
  padding-top: 56.25%;
  position: relative;
}

.iframe-container iframe {
   border: 0;
   height: 100%;
   left: 0;
   position: absolute;
   top: 0;
   width: 100%;
}

/* 4x3 Aspect Ratio */
.iframe-container-4x3 {
  padding-top: 75%;
}


.myDiv {
  border: 5px outset red;

  text-align: center;
}

</style>


   
<body>
 
 
  
	<!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/" class="color-main">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->


	 

	<!-- search modal -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form" action="/">
				<div class="form-group">
					<input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
				</div>
				<button type="submit" class="btn">Search</button>
			</form>
		</div>
	</div>

	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls p-normal">
			<!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
			<!--
		<ul class="list-unstyled">
			<li>Message To User</li>
		</ul>
		-->

		</div>
	</div>
	<!-- eof .modal -->

	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">

			<!-- template sections -->

			<!--eof topline-->
<style>
   .blink_text {

    animation:1s blinker linear infinite;
    -webkit-animation:1s blinker linear infinite;
    -moz-animation:1s blinker linear infinite;

     color: #fff;
    }

    @-moz-keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }

    @-webkit-keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }

    @keyframes blinker {  
     0% { opacity: 1.0; }
     50% { opacity: 0.0; }
     100% { opacity: 1.0; }
     }
     
     
</style>



<style>
	

#wnew, #wnew:link, #wnew:visited {
  text-decoration: none;
 
  
  border-radius: 5px;
  color: gray;
}

.animate2 {
	font-size: 20px;
	
	
}

.animate2 #spnew {
	display: inline-block;
}

#wnew.repeat {
  display: inline-block;
  font-size: 12px;
  text-transform: none;
  text-decoration: none;
	
  color: orange;
  padding: 5px 12px;
  border: 1px solid rgba(0, 0, 0, 0.15);
  font-weight: bold;
  margin: 0 0 0 50px;
  border-radius: 3px;
  position: relative;
  bottom: 15px;
}

#wnew.repeat:hover {
  background: rgba(0, 0, 0, 0.7);
  color: white;
}

.animate2 #spnew:nth-of-type(2) {
	animation-delay: .05s;
}
.animate2 #spnew:nth-of-type(3) {
	animation-delay: .1s;
}
.animate2 #spnew:nth-of-type(4) {
	animation-delay: .15s;
}
.animate2 #spnew:nth-of-type(5) {
	animation-delay: .2s;
}
.animate2 #spnew:nth-of-type(6) {
	animation-delay: .25s;
}
.animate2 #spnew:nth-of-type(7) {
	animation-delay: .3s;
}
.animate2 #spnew:nth-of-type(8) {
	animation-delay: .35s;
}
.animate2 #spnew:nth-of-type(9) {
	animation-delay: .4s;
}
.animate2 #spnew:nth-of-type(10) {
	animation-delay: .45s;
}
.animate2 #spnew:nth-of-type(11) {
	animation-delay: .5s;
}
.animate2 #spnew:nth-of-type(12) {
	animation-delay: .55s;
}
.animate2 #spnew:nth-of-type(13) {
	animation-delay: .6s;
}
.animate2 #spnew:nth-of-type(14) {
	animation-delay: .65s;
}
.animate2 #spnew:nth-of-type(15) {
	animation-delay: .7s;
}
.animate2 #spnew:nth-of-type(16) {
	animation-delay: .75s;
}
.animate2 #spnew:nth-of-type(17) {
	animation-delay: .8s;
}
.animate2 #spnew:nth-of-type(18) {
	animation-delay: .85s;
}
.animate2 #spnew:nth-of-type(19) {
	animation-delay: .9s;
}
.animate2 #spnew:nth-of-type(20) {
	animation-delay: .95s;
}





.seven #spnew {
	color: #348c04;
	opacity: 0;
	transform: translate(-150px, 0) scale(.3);
	animation: leftRight .5s forwards;
}


@keyframes leftRight {
	40% {
		transform: translate(50px, 0) scale(.7);
		opacity: 1;
		color: #348c04;
	}

	60% {
		color: #0f40ba;
	}

	80% {
		transform: translate(0) scale(2);
		opacity: 0;
	}

	100% {
		transform: translate(0) scale(1);
		opacity: 1;
	}
}
	
	
</style>


<style>

 body{margin:0;height:100%;}
canvas{
    position:absolute;top:0;left:0
    background-image: linear-gradient(bottom, rgb(105,173,212) 0%, rgb(23,82,145) 84%);
    background-image: -o-linear-gradient(bottom, rgb(105,173,212) 0%, rgb(23,82,145) 84%);
    background-image: -moz-linear-gradient(bottom, rgb(105,173,212) 0%, rgb(23,82,145) 84%);
    background-image: -webkit-linear-gradient(bottom, rgb(105,173,212) 0%, rgb(23,82,145) 84%);
    background-image: -ms-linear-gradient(bottom, rgb(105,173,212) 0%, rgb(23,82,145) 84%);
    
    background-image: -webkit-gradient(
        linear,
        left bottom,
        left top,
        color-stop(0, rgb(105,173,212)),
        color-stop(0.84, rgb(23,82,145))
    );
}   
    
    
    
</style>



   <script src='httpss://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script>
	
	/* This code is not required for the animation. This is only needed for the repeatation */
/* This code is not required for the animation. This is only needed for the repeatation */

$(function(){
	
	
	$('#cli').hide();
	
	
	$('.repeat').click(function(){
    	var classes =  $(this).parent().attr('class');
        $(this).parent().attr('class', 'animate');
        var indicator = $(this);
        setTimeout(function(){ 
        	$(indicator).parent().addClass(classes);
        }, 15);
    });
});
	
	
	  setInterval(function(){ 
		  
		  
	 
		    $("#cli").click();
		  
		  
 
		  
},2500);
	  
	
	
	</script>
	
	
  <script type="text/javascript">
      function blink() {
        var blinks = document.getElementsByTagName('blink');
        for (var i = blinks.length - 1; i >= 0; i--) {
          var s = blinks[i];
          s.style.visibility = (s.style.visibility === 'visible') ? 'hidden' : 'visible';
        }
        window.setTimeout(blink, 1000);
      }
      if (document.addEventListener) document.addEventListener("DOMContentLoaded", blink, false);
      else if (window.addEventListener) window.addEventListener("load", blink, false);
      else if (window.attachEvent) window.attachEvent("onload", blink);
      else window.onload = blink;
    </script>


			
			<div class="home1">
				
				 
<style>
 
	.blink_text {
		font-weight: bold;
    animation-duration: 1500ms;
    animation-name: blink;
    animation-iteration-count: infinite;
    animation-direction: alternate;
    -webkit-animation:blink 1500ms infinite; /* Safari and Chrome */
}
@keyframes blink {
    from {
        color:#FF072E;
    }
    to {
        color:white;
    }
}
@-webkit-keyframes blink {
    from {
        color:#FF072E;
    }
    to {
        color:white;
    }
}
     
    
        
</style>
 			</div>
				
				
			
			
			
	 
			
			
			 
<div id="myModal" class="modal">

   
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>
		
			<!-- header with three Bootstrap columns - left for logo, center for navigation and right for includes-->
	<header class="page_header ls c-my-5">		
<div class="container">		
<div class="row">
  <div class="col-sm-12">
    	<div class="text-left">
		<div class="header_logo_center" style="font-weight:bold;">
		<img src="https://bestoverseasjobsconsultancy.com/assets/logo.jpeg" alt="" style="height:100px;width:auto;">
        
        </div>
		</div>
    </div>
   
</div>

<div class="row">

  <div class="col-sm-12 text-righ">
          <nav class="top-nav">
                                    <ul class="nav sf-menu">


                                        <li>
                                            <a href="https://bestoverseasjobsconsultancy.com/index.php">Home&nbsp;&nbsp;</a>
                                            
                                        </li>

                                        <li>
                                        <a href="https://bestoverseasjobsconsultancy.com/whychooseus.php">Why Choose Us?&nbsp;&nbsp;</a>
                                        
                                        </li>
                            
                                        <li>
                                            <a href="https://bestoverseasjobsconsultancy.com/seekingrightstaff.php">Seeking right staff?&nbsp;&nbsp;&nbsp;</a>

                                             
                                        </li>

                                         
                                        <li>
                                            <a href="https://bestoverseasjobsconsultancy.com/lookingforjobs.php">Looking for jobs</a>
                                            
                                             
                                        </li>
                                         
     
                                        
                                        <li>
                                            <a href="https://bestoverseasjobsconsultancy.com/currentvacancies.php">Current Vacancies</a>

                                        </li>
                            
                                       
                                    </ul>


                                </nav>
  </div>
</div>
</div>
	<span class="toggle_menu" style="margin-top: 10px;background: #f9f9f9;border: 1px solid #333;border-radius: 10px;padding: 0px !important;/*! margin: 10px; */">
					<span></span>
				</span>	
</header>		
		

		
<style>
* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

.mySlides {
    display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor:pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
</style>
<section class="at-login-form">
<!-- MODAL LOGIN -->
			<!--	<div class="modal fade" id="at-companyprofile" tabindex="-6" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>
							
									<div class="modal-footer">
										<div class="row">	
											<div class="col-md-12">
											<iframe src="images/Company-Profile2020.pdf" width="450px" height="2100px"/></iframe>
											</div>	
										
										</div>
									</div>
								</div>
							</div>
						</div>
						
						!>>
						<!-- MODAL LOGIN ENDS -->
				<!-- MODAL LOGIN -->
				<div class="modal fade" id="at-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>
							
									<div class="modal-footer">
										<div class="row">	
											<div class="col-md-12">
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec felis enim, placerat id eleifend eu, semper vel sem.  </p>	<a href="#" align="center" class="button" >Link Button</a>
											</div>	
										
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- MODAL LOGIN ENDS -->
<style>
.b {
  text-align: left;
}
.p {
background-color: lightgrey;
  width: 300px;
  border: 25px solid green;
  padding: 15px;
  margin: 25px;
  }
 .font {
  font-size: 14px;
    text-align: justify;
}
</style>
							<section class="at-login-form">
							    
							    
							    	<div class="modal fade" id="at-loginsa1" tabindex="-3" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>
							
									<div class="modal-footer">
										<div class="row">	
											<div class="col-md-12">

									

												<p class="font"><i>"We at Emerald Isle, are a strong team of professionals dedicated to better the quality of service and standards, inextricably linked with excellence.  We contribute relentlessly to exceed our Clients expectations. Leading through influence EIMTS is proud to be the pioneers in recruitment and the leader in global employment. "</i>
<br><b>
 <i class="mx-10 color-main fa fa-mobile"></i> </b>  +94  777-300618 <br><b><i class="mx-10 color-main fa fa-envelope"></i></b>hr@emeraldisle.lk<br><i class="mx-10 color-main fa fa-linkedin"></i> Anushuba Kaanaruban</p>


											</div>	
											


										</div>
									</div>
								</div>
							</div>
						</div>
						
						
							<div class="modal fade" id="at-loginsa3" tabindex="-3" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>
							
									<div class="modal-footer">
										<div class="row">	
											<div class="col-md-12">

									

												<p class="font"><i>"I at Emerald Isle for Past 8 years to increase the quality and speed of recruitment by integrating best practices and resource planning, allowing our clients access to top talent for permanent roles. Our contingent recruitment is exceptionally reactive to the needs of global industry sectors providing the ability of a workforce. Every day we assist our clients and candidates to have an innovative and effective presence in the job market and it is our collaborative approach which results in better placements and better service."</i>
<br><b>
 <i class="mx-10 color-main fa fa-mobile"></i> </b>  +94 0773-876464 <br><b><i class="mx-10 color-main fa fa-envelope"></i></b>psd2@emeraldisle.lk</p>


											</div>	
											


										</div>
									</div>
								</div>
							</div>
						</div>
						
						
							<div class="modal fade" id="at-loginsa2" tabindex="-3" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>
							
									<div class="modal-footer">
										<div class="row">	
											<div class="col-md-12">

									

												<p class="font"><i>"The talent and entrepreneurial vision of our management team has allowed us to become one of the most highly-commended recruitment company in Sri Lanka, leveraging our expertise and experience by staying ahead of the competition monitoring market and industry trends closely and sourcing candidates to meet the demand. With the number of years experience I carry along with the expertise team, we deliver world-class recruitment services with a successful results-based approach for our consumers."</i>
<br><b>
 <i class="mx-10 color-main fa fa-mobile"></i> </b>  +94 777-809136 <br><b><i class="mx-10 color-main fa fa-envelope"></i></b>manager@emeraldisle.lk</p>


											</div>	
											


										</div>
									</div>
								</div>
							</div>
						</div>
						
						
						
						
							<!-- MODAL LOGIN -->
				<div class="modal fade" id="at-loginsa" tabindex="-3" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>
							
									<div class="modal-footer">
										<div class="row">	
											<div class="col-md-12">

									

												<p class="font"><i>"It is with great privilege for me to introduce EIMTS as a leading, well reputable organization that source Human Resources to the Global Market. For the last 18 years, I take pride in seeing the organization grow to the highest standards. With the aim of providing equal employment opportunities for all, and our data base of rich clients and talented candidates, Emerald Isle will continue to achieve it's high standards as the leader in recruitment and maintain Client / Customer delight in the coming years."</i>
<br><b>
 <i class="mx-10 color-main fa fa-mobile"></i> </b>  +94 773876465 <br><b><i class="mx-10 color-main fa fa-envelope"></i></b> angeline@emeraldisle.lk<br><i class="mx-10 color-main fa fa-linkedin"></i> Angeline Cooke</p>


											</div>	
											


										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- MODAL LOGIN ENDS -->
				<!-- MODAL LOGIN -->
				<div class="modal fade" id="at-logins" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>
							
									<div class="modal-footer">
								
										<div class="row">	
											
																	
										</div>
	<p class="font"><i>"Patience, Persistence and Perspiration make an unbeatable combination for success and that is the story of Emerald Isle. We have established our presence today globally and are empowered to deliver operational excellence through innovation and leadership at all levels. We look forward in catering your career and Recruitment needs. "</i>
<br><b>
  <i class="mx-10 color-main fa fa-mobile"></i> </b>  +94 77 3536767 <br><b><i class="mx-10 color-main fa fa-envelope"></i></b> linda@emeraldisle.lk<br><i class="mx-10 color-main fa fa-linkedin"></i> Linda Gray<label style="font-size: x-small;margin-left:5px">MBA (UWS,Aust)</label></p>
											
											</div>
									</div>
								</div>
							</div>
					
						<!-- MODAL LOGIN ENDS -->

	<!-- MODAL LOGIN -->
				<div class="modal fade" id="at-loginsdff" tabindex="-4" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>
							
									<div class="modal-footer">
								
										<div class="row">	
				
										
										</div>
	<p class="font"><i>"Thank you for visiting our website. Founded in 1994, Emerald Isle Manpower and Travel Services is the leading Recruitment Company in Sri Lanka providing you with unmatched services enabling the dignity and power of gainful employment and also delivering best in class human capital solutions. "</i>
<br><b>
  <i class="mx-10 color-main fa fa-mobile"></i></b>  +94 777304105 <br><b><i class="mx-10 color-main fa fa-envelope"></i></b> hemantha@emeraldisle.lk<br><i class="mx-10 color-main fa fa-linkedin"></i> Hemantha Sapumohotti</p>
											
											</div>
									</div>
								</div>
							</div>
					
						<!-- MODAL LOGIN ENDS -->
	<!-- MODAL LOGIN -->
				<div class="modal fade" id="at-loginss" tabindex="-3" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>
							
									<div class="modal-footer">
										<div class="row">	
											<div class="col-md-12">
												<p>Emeraldisle IT solutions is a IT services provider and experienced value-added 
												reseller that provides its customers with complete technology solutions, including Graphics Design, web solution and other IT services.
</p><a href="https://it.emeraldisle.lk/" align="center" class="button" style="background-color:#299643;margin-left:auto;margin-right:auto;display:block;margin-bottom:0%">Visit our page</a>
											</div>	
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- MODAL LOGIN ENDS -->

	       

