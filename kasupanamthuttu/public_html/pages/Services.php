 <div class="line">
            <div class="box margin-bottom">
               <div class="row" >
               
               <div class="col-sm-8">
                 <h3 style="text-align: left;font-family: arial;border:none">Services</h3> 
                <table style="width:250px;display:none">
    <tbody><tr>
        <td style="width:50px;padding-right:0px"><img src="assets/whatsapp_icon.png" style="height:32px;width:32px;"></td>
        <td style="width: 200px;">+91 979 133 0770</td>
    </tr>
</tbody></table> 
<br><Br>
                 
                <!-- <img src="assets/Screenshot_2020_0503_163401.png" style="width:100%;margin:0px auto;"><br><br>-->
                 <div class="row">
                 <?php
                    $products = $mysql->select("select * from _tblservices order by ServiceID desc");
                    foreach($products as $p) {
                        ?>
                        <div class="col-sm-6" style="margin-bottom:15px">
                            <div style="border:1px solid #ccc;padding:10px">
                                <img src="assets/services/<?php echo $p['photopath'];?>" style="width: 100%;">
                            </div>
                        </div>
                        <?php
                    }
                 ?>
                </div> 
         <!--   <br> 
               1.நீங்கள் புதிதாக trust தொடங்கி   FCRA  பெறுவதன் வாயிலாக வெளிநாட்டு  நன்கொடைகள் பெறலாம். Trust பதிவு செய்ய மற்றும்  Export Import  licence, Company  registration க்கு எங்களை தொடர்பு கொள்ளுங்கள்.
<br><br>
2.வேலைவாய்ப்பு, வீடு, வாகனம், மொபைல், போன்ற எந்த வகையான விளம்பரம்  இருந்தாலும்  இலவசமாக பதிவு செய்யலாம். (Post Free ads for employment, home, automobile, motorcycle, etc. )click 
Www.klx.co.in 
<br><br>
3.இலவசமாக  பதிவு செய்து உங்களுக்கு பொருத்தமான துணையை தேர்ந்தெடுத்து உடனடியாக திருமணம் நடைபெற 
(Register for free and choose the right partner for you and get married immediately) click
Www.nammamarriage.com 
<br><br>
4.உங்களுக்கு விருப்பமான மாடலில் குறைந்த  கட்டணத்தில் எந்த  வகையான வெப்சைட் டிசைன் மற்றும் application  வடிவமைத்து தரப்படும்  (We can design any type of website design and application at a lower cost on your preferred model)
<br><br>    -->           
               </div>                                        
               
               <div class="col-sm-4">
               <!--
               <h3 style="text-align: left;font-family: arial;border:none">nammamarriage.com</h3> <br>
               No 1 matrimonial service 
               <a href="https://www.nammamarriage.com"><img src="https://www.kasupanamthuttu.com/assets/nammamarriage.png" style="width:100%;border:1px solid #999;padding:5px;"> </a>
               <br><br>
                <h3 style="text-align: left;font-family: arial;border:none">klx.co.in</h3> 
                free classified website
                <a href="https://www.klx.co.in"><img src="https://www.kasupanamthuttu.com/assets/klx.png" style="width:100%;border:1px solid #999;padding:5px;"> </a>
            
             <br><br>
                <h3 style="text-align: left;font-family: arial;border:none">cinemanewfaces.com</h3> 
                cinemanewfaces website
                <a href="https://www.cinemanewfaces.com"><img src="https://www.kasupanamthuttu.com/assets/cinema.png" style="width:100%;border:1px solid #999;padding:5px;"> </a>
                -->
               </div>
                   
                   
            </div>
            </div>
            </div> 