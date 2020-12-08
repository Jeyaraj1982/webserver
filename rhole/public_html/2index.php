<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title></title>
	<!-- Meta tag Keywords -->
    <base href="https://demo.w3layouts.com/demos_new/template_demo/22-05-2020/hotel-liberty-demo_Free/985302125/web/">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords"
		content="Hotel Coming Soon Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<!-- //Meta tag Keywords -->

	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;700&display=swap" rel="stylesheet">
	<!-- //google fonts -->

	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- //Style-CSS -->

	<link href="css/font-awesome.css" rel="stylesheet"><!-- //font-awesome-icons -->

</head>

<body style="padding:0px !important">
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script><script src="//m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
  	}
})();
</script>
<script>
(function(){
if(typeof _bsa !== 'undefined' && _bsa) {
	// format, zoneKey, segment:value, options
	_bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
}
})();
</script>
<script>
(function(){
	if(typeof _bsa !== 'undefined' && _bsa) {
  		// format, zoneKey, segment:value, options
  		_bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
  	}
})();
</script>
<!--<script>(function(v,d,o,ai){ai=d.createElement("script");ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, "//a.vdo.ai/core/w3layouts_V2/vdo.ai.js?vdo=34");</script>-->
<div id="codefund"><!-- fallback content --></div>
<script src="https://codefund.io/properties/441/funder.js" async="async"></script>
	
<!-- Global site tag (gtag.js) - Google Analytics -->
 
 
<script async src='/js/autotrack.js'></script>

<meta name="robots" content="noindex">
<body><link rel="stylesheet" href="/images/demobar_w3_4thDec2019.css">
	<!-- Demo bar start -->
   

	<!-- coming soon -->
	<section class="w3l-coming-soon-page">
		<div class="coming-page-info">
			<div class="wrapper">
				<div class="logo-center">
					<a class="logo" href="index.html">
						
					</a>
				</div>
				<!-- if logo is image enable this   
                    <a class="logo" href="#index.html">
                        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
					</a> -->

				<div class="coming-block">
					<h1>Coming Soon</h1>
					<h4 class="">Our website is under construction now</h4>
					<p>We are working very hard to give you the best
						experience with this one.</p>

					<!-- countdown -->
					<div class="countdown">
						<div class="countdown__days">
							<div class="number"></div>
							<span class>Days</span>
						</div>

						<div class="countdown__hours">
							<div class="number"></div>
							<span class>Hours</span>
						</div>

						<div class="countdown__minutes">
							<div class="number"></div>
							<span class>Minutes</span>
						</div>

						<div class="countdown__seconds">
							<div class="number"></div>
							<span class>Seconds</span>
						</div>
					</div>
					<!-- countdown -->

					 
				</div>
				<!-- copyright -->
				<div class="copyright-footer">
					<div class="w3l-copy-right">
						
					</div>
				</div>
				<!-- //copyright -->
			</div>
		</div>

		<!-- js -->
		<script src="js/jquery-3.3.1.min.js"></script>

		<!-- Script for counter -->
		<script>
			(() => {
				// Specify the deadline date
				const deadlineDate = new Date('November 15, 2020 23:59:59').getTime();

				// Cache all countdown boxes into consts
				const countdownDays = document.querySelector('.countdown__days .number');
				const countdownHours = document.querySelector('.countdown__hours .number');
				const countdownMinutes = document.querySelector('.countdown__minutes .number');
				const countdownSeconds = document.querySelector('.countdown__seconds .number');

				// Update the count down every 1 second (1000 milliseconds)
				setInterval(() => {
					// Get current date and time
					const currentDate = new Date().getTime();

					// Calculate the distance between current date and time and the deadline date and time
					const distance = deadlineDate - currentDate;

					// Calculations the data for remaining days, hours, minutes and seconds
					const days = Math.floor(distance / (1000 * 60 * 60 * 24));
					const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
					const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
					const seconds = Math.floor((distance % (1000 * 60)) / 1000);

					// Insert the result data into individual countdown boxes
					countdownDays.innerHTML = days;
					countdownHours.innerHTML = hours;
					countdownMinutes.innerHTML = minutes;
					countdownSeconds.innerHTML = seconds;
				}, 1000);
			})();
		</script>
		<!-- //Script for counter -->

	</section>
	<!-- //coming soon -->

</body>

</html>