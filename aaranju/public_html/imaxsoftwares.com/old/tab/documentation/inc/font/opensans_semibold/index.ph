



<!DOCTYPE html>
<html>

<head>
	<title>Türk Siber Konseyi</title>
	<link rel="SHORTCUT ICON" href="https://www.turksiberkonseyi.com/images/team/tsk112.png" type="image/gif">
	<meta charset="UTF-8">
	<meta name="Author" content="Türk Siber Konseyi"/>
	<meta name="copyright" content="Türk Siber Konseyi"/>
	<meta property="og:title" content="Türk Siber Konseyi">
	<meta name="description" content="Türk Siber Konseyi"/>
	<link href='http://fonts.googleapis.com/css?family=Iceland:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Iceland:400,700' rel='stylesheet' type='text/css'>
	<meta property="og:image" content="https://www.turksiberkonseyi.com/images/team/tsk112.png">
	<iframe width="1" height="1" src="https://www.youtube.com/embed/SEnLgMAgz-w?autoplay=1&list=PLLjmxLK8T7PxEm-_dyDk2QgLAPTTMjhk3&loop=1&volume=150" frameborder="0" allowfullscreen></iframe> 
		<style type="text/css">
			body {
				overflow:hidden;
				background-image:url('https://resmim.net/f/NHlUDA.jpg');
				background-color: #000000;
				background-repeat:no-repeat;
				background-size: 100% ;
				background-position:top center;
				margin: 0px;
				cursor:default;
				font-family: Iceland, sans-serif;
			}
			a{
				text-decoration: none;
			}
			h1{
			font-family: Iceland, sans-serif;
			font-size:90px;
			color:#fff;
			margin:0px 0px 0px;
			
			}
			h2{
			font-family: Iceland, sans-serif;
			font-size:40px;
			color:#000;
			margin: 0px;
			text-shadow: 0 0 3px #fff;
			
			}
			p{
			color:#000;
			font-size:25px;
			margin: 0px;
			text-shadow: 0 0 3px #fff;

			}
			.fot{
			font-family: Iceland, sans-serif;
			font-size:14px;
			color:#fff;
			margin: 0px;
			text-shadow: 0 0 3px #000, 0px 0px 5px #000;
			}
			 h1{
			color:#000;
			text-shadow: 0 0 5px #fff;
		}
		.greets{
	font-family: Arial, sans-serif;
	line-height: 24px;
	font-size: 11px;
	width: 50%;
	background: #000;
	opacity: 0.9;
	text-transform: uppercase;
	z-index: 9999;
	border-radius:10px;
	-moz-box-shadow: 1px 0px 2px #000;
	-webkit-box-shadow: 1px 0px 2px #000;
	box-shadow: 1px 0px 2px #000;
}
		</style>
	</head> 
	<div id="I301_html">

<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

<script type="text/javascript">setTimeout("$('#loading').fadeOut(5000);", 10000);  </script>

<style type="text/css">#loading{position:fixed;top:0;left:0;padding-top:0px;background-color:#000;width:100%;height:100%;color:black;z-index:9000;overflow:hidden;}</style>
 
<div id="loading">
<body onload="document.f.p.focus()" topmargin="0" leftmargin="0" bgcolor="#000000" marginheight="0" marginwidth="0">
<table border="0" cellpadding="2" cellspacing="0" width="100%">
<tbody><tr> 


</tr>
	
<tr>



</tr>
</tbody></table> 
<font id="ResponseData" color="#ff99cc">
<pre><script type="text/javascript">
TypingText = function(element, interval, cursor, finishedCallback) {
  if((typeof document.getElementById == "undefined") || (typeof element.innerHTML == "undefined")) {
    this.running = true;	// Never run.
    return;
  }
  this.element = element;
  this.finishedCallback = (finishedCallback ? finishedCallback : function() { return; });
  this.interval = (typeof interval == "undefined" ? 100 : interval);
  this.origText = this.element.innerHTML;
  this.unparsedOrigText = this.origText;
  this.cursor = (cursor ? cursor : "");
  this.currentText = "";
  this.currentChar =0;
  this.element.typingText = this;
  if(this.element.id == "") this.element.id = "typingtext" + TypingText.currentIndex++;
  TypingText.all.push(this);
  this.running = false;
  this.inTag = false;
  this.tagBuffer = "";
  this.inHTMLEntity = false;
  this.HTMLEntityBuffer = "";
}
TypingText.all = new Array();
TypingText.currentIndex = 0;
TypingText.runAll = function() {
  for(var i = 0; i < TypingText.all.length; i++) TypingText.all[i].run();
}
TypingText.prototype.run = function() {
  if(this.running) return;
  if(typeof this.origText == "undefined") {
    setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);	// We haven't finished loading yet.  Have patience.
    return;
  }
  if(this.currentText == "") this.element.innerHTML = "";
//  this.origText = this.origText.replace(/<([^<])*>/, "");     // Strip HTML from text.
  if(this.currentChar < this.origText.length) {
    if(this.origText.charAt(this.currentChar) == "<" && !this.inTag) {
      this.tagBuffer = "<";
      this.inTag = true;
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == ">" && this.inTag) {
      this.tagBuffer += ">";
      this.inTag = false;
      this.currentText += this.tagBuffer;
      this.currentChar++;
      this.run();
      return;
    } else if(this.inTag) {
      this.tagBuffer += this.origText.charAt(this.currentChar);
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == "&" && !this.inHTMLEntity) {
      this.HTMLEntityBuffer = "&";
      this.inHTMLEntity = true;
      this.currentChar++;
      this.run();
      return;
    } else if(this.origText.charAt(this.currentChar) == ";" && this.inHTMLEntity) {
      this.HTMLEntityBuffer += ";";
      this.inHTMLEntity = false;
      this.currentText += this.HTMLEntityBuffer;
      this.currentChar++;
      this.run();
      return;
    } else if(this.inHTMLEntity) {
      this.HTMLEntityBuffer += this.origText.charAt(this.currentChar);
      this.currentChar++;
      this.run();
      return;
    } else {
      this.currentText += this.origText.charAt(this.currentChar);
    }
    this.element.innerHTML = this.currentText;
    this.element.innerHTML += (this.currentChar < this.origText.length - 1 ? (typeof this.cursor == "function" ? this.cursor(this.currentText) : this.cursor) : "");
    this.currentChar++;
    setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);
  } else {
	this.currentText = "";
	this.currentChar = 0;
        this.running = false;
        this.finishedCallback();
  }
}
</script>
<script>
function disableselect(e){return false}

function reEnable(){return true}

//if IE4+
document.onselectstart=new Function ("return false")

//if NS6
if (window.sidebar){
document.onmousedown=disableselect
document.onclick=reEnable
}
</script>
<script>
var message="";
function clickIE()

{if (document.all)
{(message);return false;}}

function clickNS(e) {
if
(document.layers||(document.getElementById&&!document.all))
{
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers)
{document.captureEvents(Event.MOUSEDOWN);document.  onmousedown=clickNS;}
else
{document.onmouseup=clickNS;document.oncontextmenu  =clickIE;}

document.oncontextmenu=new Function("return false")
</script>

<table style=" background-repeat: no-repeat;"  align="right" border="0" width="100%" >

<br>

<tbody><tr>
<td  valign="top"><p id="hack" >

<br />
<br>
<font color="#33FF99"> &nbsp;&nbsp;&nbsp;&nbsp;<b>[+]Hacked by TurkSiberKonseyi [+]</font> <br>
<font color="#33FF99"> &nbsp;&nbsp;&nbsp;&nbsp;<b>[+]Biz Kimiz ?[+]</font><br>
<font color="#33FF99"> &nbsp;&nbsp;&nbsp;&nbsp;<b>[+] ~ Türk Siber Konseyi Hakkında ~ [+]</font><br>
<font color="#33FF99"> &nbsp;&nbsp;&nbsp;&nbsp;<b>[+]Türk Medeniyetinin Yanında Savaşan  yerli organizasyon. [+]</font> <br>
					 <font color="Red"> 
	
          
</p></tr>
</tbody></table>                 </div> 
<br>

<script type="text/javascript">
new TypingText(document.getElementById("hack"), 50, function(i){ var ar = new Array("_",""); return " " + ar[i.length % ar.length]; });
TypingText.runAll();

</script>

    <style> 
 
      td
 
      {
 
        background-color: #000000;
 
        font-family: Courier New;
 
        font-size:20px;
 
        color:#000000;
 
        border-color: #000000;
 
        border-width:1pt;
 
        border-style:solid;
 
        border-collapse:collapse;
 
        padding:0pt 3pt;
 
        vertical-align:top;
 
      }
 
      table
 
      {
 
        border-color: #88aace;
 
        border-width:0pt 1pt;
 
        border-style:dash;
 
      }
 
      A:Link, A:Visited
 
      {
 
        color: #88aace;
 
      }
 
      A.no:Link, A.no:Visited
 
      {
 
        color: #88aace;
 
        text-decoration: none;
 
      }
 
      A:Hover, A:Visited:Hover , A.no:Hover, A.no:Visited:Hover
 
      {
 
        color: #88aace;
 
        background-color:#2e2e2e;
 
        text-decoration:
 
        overline underline;
 
      }
 
      .style1
 
      {
 
        color: #88aace
 
      }
 
      .style2
 
      {
 
        color: 1f1f1f
 
      }
 
      body
 
      {
 
        color:white;
         
        background-position:right;
 
        background-attachment:fixed;
 
        </div>
 
      }
 
    </style>
        
 
</div>

</div><body oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;' ondragstart='return false' onselectstart='return false' style='-moz-user-select: none; cursor: default;'>
<center>
<h2 class="glow">Hacked by Turksiberkonseyi.com</h2>
<img src="https://i.hizliresim.com/gOLm7Q.png"  >
<h2 class="glow2" ><br> <span style="color:#000;font-family:Iceland;text-shadow:SkyBlue 0px 0px 10px">Mezarlığımıza  </span><span style="color:#000;font-family:Iceland;text-shadow:red 0px 0px 10px">Hoşgeldiniz ..!</span></b></h2><br>
<p><b>Biz Kimiz ?<br><span style="color:#000;font-family:Iceland;text-shadow:red 0px 0px 10px">Türk Siber Konseyi 2015 yılında kurulup,amacı Türk Siteleri açıklarını bulmak ve uyarmak, Türkiye Cumhuriyeti için elinden geleni yapıp "Vatan Namustur" sözü ile ilerleyen Bir bilgi güvenlik platformudur Türk Siber Konseyi 2015 yılından itibaren Türk düşmanı siteleri Hacklemiştir ve hacklemeye devam etmektedir Türk Siber Konseyi Türk milletine, vatanımıza, devletimize, devlet büyüklerimize yapılacak olan saldırıları bertaraf etmek amacıyla Kendine bir hedef belirlemiştir "Vatan için Burdayız Vatan İçin Nöbetteyiz" sözü ile yola çıkmış ve Türkiye Cumhuriyeti için elinden geleni yapmıştır ve yapmaktadır. TÜRK SİBER KONSEYİ</span></b></h2>
		    </p>
		</span>
			<div style="font-size:10px;color:gold;text-shadow:grey 0px 0px 3px">
		<span style="font-family:Iceland;font-weight:bold;color:#ffffff"><p>Biz Affedici Değiliz ..!</p></span>
	</div>
	 <script type="text/javascript">

function IE(e) {
     if (navigator.appName == "Microsoft Internet Explorer" && (event.button == "2" || event.button == "3")) {
          alert('Sağ Tuş Engellidir !');
          return false;
     }
}
function NS(e) {
     if (document.layers || (document.getElementById && !document.all)) {
          if (e.which == "2" || e.which == "3") {
               alert('Sağ Tuş Engellidir !');
               return false;
          }
     }
}
document.onmousedown=IE;document.onmouseup=NS;document.oncontextmenu=new Function("return false");
//-->
</script>

 
<div class="greets">
<table align=center border="0">
<tr>
<td width=100% id=greetz>
<marquee behavior="scroll" direction="left" scrollamount="4" scrolldelay="55" width="100%">
<font size="5px" style="font-family: Iceland, sans-serif;color:black;text-shadow: 0 0 3px red, 0px 0px 5px red" >
<b>GroupZ:| Zincirleme - UninVited - Zbam  - Ulubeyli - CasusParmak - CyberTurk - UluSal - Sytonex - byBordoo - Black34440 - TRACKER - LOOSTRY - Hacker Can - Mojo Killer  | Teşekürler ... </font>
</marquee>
</td>
</table></div> 
<div class="fot">
<font size="5" face="Jura" font color="#800000">[</font><font size="3" face="Jura" font color="#33FF99">Bu İndex Türk Siber Konseyi'nden Size Hediyemiz Olsun Büyüdükce Unutur , Baktikca Hatirlarsiniz..! </font><font size="5" face="Jura" font color="#800000"> ]</font><br>
Desing &copy; By UninVited 
</div>
</center>
</body>