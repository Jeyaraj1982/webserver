<?php include_once("header.php"); ?> 
<div class="header">
    <div class="container header-container">
        <div class="col-md-6 header-title-section">
            <p class="header-subtitle"></p>
            <h1 class="header-title">Start <span>Your Digital </span>Resmue and Visiting Cards with us</h1>
            <p class="header-title-text">DigitalMaking.in provides online resume & visiting card distribution services.</p>
        </div>
        <div class="col-md-6 header-img-section">
            <img src="https://www.digitalmaking.in/assets/img/hero_img.png">
        </div>                    
    </div>    
</div>
<div class="innovate-section">
    <div class="container innovate-container">
        <div class="col-md-5 innovate-title-section">
            <div class="innovate-header-img">
                <img src="https://www.digitalmaking.in/assets/img/innovation.png">
            </div>    
        </div>
        <div class="col-md-6 offset-1 col-sm-12">
            <p class="innovate-number" style="max-width:230px !important;min-width:230px !important">Digital Resume</p>
            <p class="innovate-text">The Internet now plays an integral role in how people search for jobs, as well as how employers and companies find appropriate candidates. According to some resume writing experts, traditional resumes, such as chronological resumes or functional resumes, are outdated.</p>
            <div class="learn-more-btn-section mt-5">
                <a class="nav-link learn-more-btn btn-header" href="https://www.digitalmaking.in/digitalresume.php">more...</a>
            </div>
        </div>
    </div>
</div>    
<div class="video-section" style="padding-bottom:0px;padding-top:0px;">
    <div class="container video-container" style="box-shadow:none;background-color:#fff !important;border-radius:0px;margin-top:0px;">
        <div class="col-md-6 video-title-section">
            <p class="video-number" style="max-width:290px !important;min-width:290px !important">Digital Visiting Card</p>
            <p class="innovate-text">One of the most significant advantages of digital business cards is that it is a convenient way to store as much information as you want in one place. Unlike the paper cards, there is no lack of space here. So, include your URLs, website addresses, social media accounts, fax number, phone number, and more in the card. </p>
            <div class="learn-more-btn-section">
                <a class="nav-link learn-more-btn btn-header" href="https://www.digitalmaking.in/digitalvisitingcard.php">more...</a>
            </div>
        </div>
        <div class="col-md-5 offset-1 col-sm-12">
            <div class="video-header-img">
                <img src="https://www.digitalmaking.in/assets/img/video.png">
            </div>
        </div>
    </div>
</div>
<div class="prevideo-section" style="min-height:100px !important">
    <div class="container prevideo-container"></div>
</div>    
<div class="features-section">
    <div class="container features-container">
        <div class="col-md-12 features-title-section">
            <h2 class="features-title">Our automated features</h2>
        </div>
        <div class="col-md-4 col-sm-12 mb-5">
            <div class="ft-1">
                <h3>Instantly accessible</h3>
                <p class="features-text">There are numerous advantages to creating an online resume. Companies themselves are increasing their use of online services because they offer significant cost savings over traditional hiring methods.</p>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 mb-5">
            <div class="ft-2">
                <h3>Make your resume stand out</h3>
                <p class="features-text">Ultimately though, the key factor in all resume writing is to have an impressive, solid, and error-free resume that reflects your skills and experiences.</p>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 mb-5">
            <div class="ft-3">
                <h3>Visitng Card</h3>
                <p class="features-text">One of the most significant advantages of digital business cards is that it is a convenient way to store as much information as you want in one place.</p>
            </div>
        </div>
    </div>
</div>
<div class="stats-section">
    <div class="container stats-container p-0">
        <div class="col-lg-3 col-md-6 col-xs-8 offset-xs-2 stats-card-section">
            <div class="stats-card">
                <h2 id="digitalCards">0</h2>
                <p>Digital Cards</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-8 offset-xs-2 stats-card-section">
            <div class="stats-card">
                <h2 id="digitalResume">0</h2>
                <p>Digital Resume</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-8 offset-xs-2 stats-card-section">
            <div class="stats-card">
                <h2 id="happyCustomers">0</h2>
                <p>Happy Customers</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-xs-8 offset-xs-2 stats-card-section">
            <div class="stats-card">
                <h2 id="franchisee">0</h2>
                <p>Franchisees</p>
            </div>
        </div>
    </div>
</div>    
<script>
<?php      
$d = $mysql->select("select * from _counter where date(web_date)=date('".date("Y-m-d")."')");
if (sizeof($d)==1) {
    $i=$d[0]['count_1'];
    $j=$d[0]['count_2'];
    $k=$d[0]['count_3'];
    $l=$d[0]['count_4'];
} else {
    $d = $mysql->select("select * from _counter order by dayid desc");
    $i=$d[0]['count_1']+rand(5,15);
    $j=$d[0]['count_2']+rand(1,10);
    $k=$d[0]['count_3']+rand(1,10);
    $l=$d[0]['count_4']+rand(0,2);
    $mysql->insert("_counter",array("web_date"=>date("Y-m-d"),
                                    "count_1"=>$i,
                                    "count_2"=>$j,
                                    "count_3"=>$k,
                                    "count_4"=>$l));
    
}
?>
    var i=0;
    setInterval(function() {
        if (i<=<?php echo $i;?>) {
            $('#digitalCards').html(i);
            i=i+10;
        }},10);
                                              
    var j=0;
    setInterval(function() {
        if (j<=<?php echo $j;?>) {
            $('#digitalResume').html(j);  
            j=j+20;
        }},10);
    
    var k=0;
    setInterval(function() {
        if (k<=<?php echo $k;?>) {
            $('#happyCustomers').html(k);
            k=k+17;
        }},10);

    var l=0;
    setInterval(function() {
        if (l<=<?php echo $l;?>) {
            $('#franchisee').html(l);
            l++;
        }},1);
</script>       
<?php include_once("footer.php"); ?>