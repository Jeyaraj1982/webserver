<script>getMenuItems('timeBased');</script>   

<div style="background:#fff;padding:20px;border:1px solid #ccc">

    <h3>Winner's Testimonials</h3>
    <div class="pagecontent" style="font-size:12px;color:#333;line-height:18px;text-align:justify">       
        <table width="100%" cellspacing="0" cellpadding="5" border="0"  style="font-family:arial;font-size:13px;line-height:18px;text-align:justify;">
            <?php  foreach($mysql->select("select * from _tbltestimonials") as $p) { ?>
            <tr style="background:#FFF8EF;">
                <!--<td width="90" valign="top" style="background:#FFF8EF"><img src="../testimonials/<?php echo $p['photopath'];?>" height="100" width="80"></td>-->
                <td width="90" valign="top" style="background:#FFF8EF"><img style="border:2px solid #F2DDC4;" src="http://www.instrumentationtoday.com/wp-content/themes/patus/images/no-image-half-landscape.png" height="100" width="80"></td>
                <td valign="top"style="background:#FFF8EF"  ><strong><?php echo $p['test_name'];?></strong><br>
                    <div style="color:#333;font-size:12px;"><?php echo nl2br($p['testimonials']);?></div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="border:none;border-top:1px solid #F9EDDB"></td>
            </tr>
            <?php } ?>
        </table>
    </div>

</div> 