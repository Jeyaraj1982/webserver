<?php include_once("config.php");?>
<?php $data = $mysql->select("select * from _tbl_card_general_info where ResumeID='".$_GET['id']."'");?>
<?php 
$dup = $mysql->select("select * from resume_card_visitor_log where ResumeID='".$data[0]['ResumeID']."' and ipaddress='".$_SERVER['REMOTE_ADDR']."'");
$count = $mysql->select("select * from resume_card_visitor_log where ResumeID='".$data[0]['ResumeID']."'  ");
if (sizeof($dup)==0) {
        $id = $mysql->insert("resume_card_visitor_log",array("ResumeID"    => $data[0]['ResumeID'],
                                                        "viewed"      => 1,
                                                           "ipaddress"      => $_SERVER['REMOTE_ADDR'],
                                                        "ViewedOn"    => date("Y-m-d H:i:s")));
}
?>
<html lang="en">
<head>
  <title>Digital Resume</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,700&family=Roboto+Condensed&display=swap" rel="stylesheet"> 
 
</head>

<body>
<style>
body {font-family: 'Roboto', sans-serif;margin: 0 auto;color: #555555;text-decoration: none;max-width: 450px;text-align: center;font-weight: 400;line-height: 1.5;background:#fff9ef;}
.page-wrapper {background: #FFA001;background: -webkit-radial-gradient(top right, #FFA001, #FFFFFF);background: -moz-radial-gradient(top right, #FFA001, #FFFFFF);background: radial-gradient(to bottom left, #FFA001, #FFFFFF);}
.page-details {background-image: url('../../images/bg-06.png');background-position: top;background-size: cover;padding-left: 20px;padding-right: 20px;position: relative;border-bottom-right-radius: 20px;border-top-left-radius: 20px;}
.views-label {padding: 5px 10px;position: absolute;color: #FF8F00;right: 10px;top: 10px;border: 1px solid #FF8F00;border-radius: 18px;font-size: 14px;}
.profile-pic {text-align: center;}
.profile-pic .profile-pic-img {width: 150px;height: 150px;margin-top: 30px;border-radius: 8px;border: 1px solid #fbb060;;border-radius: 50%;padding:3px;background: white;}
.firmname {font-size: 22px;margin-bottom: 5px;margin-top: 20px;font-weight: 500;letter-spacing: 0.6px;text-transform: capitalize;text-align: center;}
.text-white {color: #fff !important;}
.name {text-transform: capitalize;font-size: 16px;font-weight: 500;color: #FF8F00;letter-spacing: 0.6px;margin-bottom: 7px;text-align: center;}
.contact-buttons {margin: 0 -20px;margin-top: 0px;padding: 10px 20px;text-align: center;}
.contact-button {padding: 6px 10px;border-radius: 10px;min-width: 70px;display: inline-block;font-size: 13px;text-align: center;background-color: #0E47A1;color: #fff;margin-right: 5px;margin-bottom: 10px;padding: 5px 15px;}
.contact-button:hover {box-shadow: 1px 2px 5px #fff;background-color: #fff;color: #0E47A1 !important;background:#fff;}
a {text-decoration: none;}
.contact-button i {margin-right: 5px;}
.fa-flip-horizontal {transform: scale(-1, 1);}
.fas {font-weight: 900;display: inline-block;font-style: normal;font-variant: normal;text-rendering: auto;line-height: 1;}
.row {display: -ms-flexbox;display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;}
table {border-collapse: collapse;}
.contact-action-container-icon {display: inline-block;vertical-align: middle;width: 30px;height: 30px;text-align: center;border-radius: 30px;line-height: 30px;color: white;background-color: #0E47A1;font-size: 13px;}
table td {padding-left: 10px;padding-top: 20px;}
.p-30 {padding-top: 30px;}
.share-buttons.inprofile {padding: 0;justify-content: flex-end;margin: -4px;}
.share-buttons {list-style: none;display: flex;flex-wrap: wrap;}
a:hover {text-decoration: none;}
#phonebookbutton {color: #fff;background-color: #0E47A1;border-color: #0E47A1;width:100%;font-size:13px;}
#phonebookbutton:hover {color: #0E47A1;background-color: #fff;border-color: #0E47A1;width:100%;}
.shadow {box-shadow: inset 0 30px 30px #ff0000;-moz-box-shadow: inset 0 30px 30px #ff0000;-webkit-box-shadow: inset inset 0 30px 30px #ff0000;border:1px solid #ff0000; border-radius:10px !important;}

.outershadow {background:#971919;border-radius:15px !important;box-shadow: 3px 3px 13px #666;-moz-box-shadow: 3px 3px 13px #666;-webkit-box-shadow: 3px 3px 13px #666;}
div,tr,td,span,a {font-family:'Lato'}
.views-label{border: 1px solid #fff !important;
background: #fff;
width: -moz-fit-content;
padding: 5px 10px;
border-radius: 50px;
font-weight: normal;
font-size: 14px;}
</style>
<?php
    $filenmae=time().rand(100,30000);
?>
<script src="https://kit.fontawesome.com/c17e2145d5.js" crossorigin="anonymous"></script>
  
    <div class="page-wrapper outershadow " id="home-section">
        <div class="page-details shadow" >
            <div class="page-content">
                <div>
                    <div class="views-label"><i class="fas fa-eye"></i> Views: <b><?php echo sizeof($count);?></b></div>
                    <div class="profile-pic" >
                    <img src="uploads/<?php echo $data[0]['ProfilePhoto'];?>" class="profile-pic-img">
                    </div>
                    <h1 class="firmname" style="font-weight: 600;color:#fff;font-size:27px"><i><?php echo $data[0]['ResumeName'];?></i></h1>
                    <h1 class="name" style="margin-top:0px !important;color:orange"><b><i><?php echo $data[0]['Proffession'];?></i></b></h1>
                </div>
                <div>
                <div class="contact-buttons">
                    <a class="contact-button" href="tel:+91<?php echo $data[0]['MobileNumber'];?>">&nbsp;<i class="fas fa-phone fa-flip-horizontal" aria-hidden="true"></i>Call</a>
                    <a class="contact-button" href="https://api.whatsapp.com/send?phone=91<?php echo $data[0]['WhatsappNumber'];?>"><i class="fa fa-whatsapp" aria-hidden="true"></i>&nbsp;Whatsapp</a>
                    <a class="contact-button" href="mailto:<?php echo $data[0]['EmailID'];?>"><i class="fas fa-envelope fa-flip-horizontal" aria-hidden="true"></i>&nbsp;Mail</a>
                </div>
                <div class="row" style="margin-top:30px">
                    <table class="contact-action-table">
                        <tbody>
                            <tr>
                                <td style="padding-top:0px;font-size:13px;vertical-align: top;"><i class="fas fa-map-marker-alt contact-action-container-icon"></i></td>
                                <td style="padding-top:0px;font-size:14px;color:#fff">
                                    <?php echo $data[0]['AddressLine1'];?><br>
                                    <?php echo $data[0]['AddressLine2'];?><br>
                                    <?php echo $data[0]['AddressLine3'];?>
                                </td>
                            </tr>
                            <tr style="">
                                <td><i class="fas fa-envelope contact-action-container-icon"></i></td>
                                <td style="font-size:14px;color:#fff"><?php echo $data[0]['EmailID'];?></td>
                            </tr>
                            <?php if($data[0]['Website']!=""){ ?>
                            <tr style="margin-top:20px">
                                <td><i class="fas fa-globe fa-flip-horizontal contact-action-container-icon"></i></td>
                                <td class="text-white" style="font-size:14px;color:#fff;"><a href="https://<?php echo $data[0]['Website'];?>" target="_blank" style="font-size:14px;color:#fff"><?php echo $data[0]['Website'];?></a></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td><i class="fas fa-phone fa-flip-horizontal contact-action-container-icon"></i></td>
                                <td style="font-size:14px;color:#fff;"><?php echo $data[0]['MobileNumber'];?></td>
                            </tr>
                            
                            <?php if($data[0]['LandlineNumber']!="") { ?>
                               <tr>
                                <td><i class="fas fa-phone fa-flip-horizontal contact-action-container-icon"></i></td>
                                <td style="font-size:14px;color:#fff"><?php echo $data[0]['LandlineNumber'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="p-30"></div>
                    <div class="row">
                        <div class="Col-sm-12" style="text-align: center;"> 
                            <?php if($data[0]['Twitter']!=""){ ?><a target="_blank" href="https://twitter.com/<?php echo $data[0]['Twitter'];?>">&nbsp;<i class="fa fa-twitter fa-flip-horizontal contact-action-container-icon" aria-hidden="true"></i></a><?php }?>
                            <?php if($data[0]['FaceBook']!=""){ ?><a target="_blank" href="https://facebook.com/<?php echo $data[0]['FaceBook'];?>">&nbsp;<i class="fa fa-facebook contact-action-container-icon" aria-hidden="true"></i></a><?php }?>
                            <?php if($data[0]['Instagram']!=""){ ?><a target="_blank" href="https://instagram.com/<?php echo $data[0]['Instagram'];?>">&nbsp;<i class="fa fa-instagram contact-action-container-icon" aria-hidden="true"></i></a><?php }?>
                            <?php if($data[0]['LinkedIn']!=""){ ?><a target="_blank" href="https://linkedin.com/<?php echo $data[0]['LinkedIn'];?>">&nbsp;<i class="fa fa-linkedin contact-action-container-icon" aria-hidden="true"></i></a><?php }?>
                            
                        </div>
                    </div>
                    <div class="p-30"></div>
                    <div class="row">                                                                                                                                                         
                        <div class="col-sm-3" style="text-align: center;"></div>
                        <div class="col-sm-6" style="text-align: center;">
                            <a href="download.php?vcf=<?php echo $filenmae; ?>" class="btn btn-primary" id="phonebookbutton"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;&nbsp;Add to Phone Book</a></div>
                        <div class="col-sm-3" style="text-align: center;"></div>
                    </div>
                </div>                    
                <div class="p-30"></div>
                
                
                </div>
            </div>
        </div>
  
</body>
<?php
    
$myfile = fopen("tmp/".$filenmae.".vcf", "w") or die("Unable to open file!");

//$txt .= "ORG;CHARSET=utf-8:Marketu\n";
$txt = "BEGIN:VCARD\n";
$txt .= "VERSION:3.0\n";
$txt .= "REV:".date("Y-m-dTH:i:s:Z")."\n";
$txt .= "N;CHARSET=utf-8:".$data[0]['ResumeName'].";;;\n";
$txt .= "FN;CHARSET=utf-8:".$data[0]['ResumeName'].";\n";
$txt .= "TITLE;CHARSET=utf-8:".$data[0]['Profession']."\n";
$txt .= "EMAIL;INTERNET:".$data[0]['EmailID']."\n";
$txt .= "TEL;PREF;WORK:+91".$data[0]['MobileNumber']."\n";
$txt .= "END:VCARD\n";
fwrite($myfile, $txt);
fclose($myfile);
?>
</html>