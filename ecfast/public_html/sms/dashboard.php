<?php 
    
    include_once("header.php"); 
    
    if (!(loginCheck())) {
        
        $dom = $mysql->select("select * from _cms where domainname='".$_SERVER['HTTP_HOST']."'");
        
        
         if (sizeof($dom)>0) {
             
            
             echo "<script>location.href='".$dom[0]['logouturl']."';</script>";
         } else {
        echo "<script>location.href='index.php';</script>";
         }
    } 
    
    
    if ($_REQUEST['do']=="logout") {
        unset($_SESSION);
        session_destroy();
        sleep(2);
       
         $dom = $mysql->select("select * from _cms where domainname='".$_SERVER['HTTP_HOST']."'");
        
        
         if (sizeof($dom)>0) {
             
            
             echo "<script>location.href='".$dom[0]['logouturl']."';</script>";
         } else {
         
        
          echo "<script>location.href='index.php';</script>";
         }
    }
?> 
 

                <h3>Send Moblie SMS</h3>
                Available SMS Credits: <?php echo checkCredits($_SESSION['user']['id']); ?><br><br>
                <script src="js/Chart.js"></script>
                 
            <div>
                <canvas id="canvas" height="300" width="900"></canvas>
            </div>
         

<?php 
for ($i = 9; $i >=0 ; $i--) {
    $dates[] = date('Y-m-d', strtotime("-$i days"));
}
$labels = "";
$data = "";
           foreach($dates as $d) {
               $labels .= '"'.$d.'",';
               $g = $mysql->select("SELECT COUNT(smscount) AS cnt FROM _mobilesms where userid='".$_SESSION['user']['id']."' and  DATE(senton)=date('".$d."') ");
               $data .= '"'.$g[0]['cnt'].'",';
           }
           
$labels = substr($labels, 0,strlen($labels)-1);
$data = substr($data, 0,strlen($data)-1);

?>
    <script>
        
        var randomScalingFactor = function(){ return Math.round(Math.random()*10)};
        var lineChartData = {
           /* labels : ["January","February","March","April","May","June","July"], */
            labels : [<?php echo $labels;?>],
            datasets : [
                {
                    label: "SMS consumption",
                    fillColor : "rgba(220,220,220,0.2)",
                    strokeColor : "rgba(220,220,220,1)",
                    pointColor : "rgba(220,220,220,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(220,220,220,1)",
                   /*data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]*/
                   data:[<?php echo $data;?>]
                }
                
                /*,
                {
                    label: "My Second dataset",
                    fillColor : "rgba(151,187,205,0.2)",
                    strokeColor : "rgba(151,187,205,1)",
                    pointColor : "rgba(151,187,205,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(151,187,205,1)",
                    data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                } */
            ]

        }

    window.onload = function(){
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true
        });
    }


    </script>
    
            </td>
        </tr>		
    </table>
 
