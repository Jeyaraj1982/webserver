 <?php 
    include_once("../../config.php");
 ?>
 <link rel="stylesheet" type="text/css" media="all" href="../../assets/css/jsDatePick_ltr.min.css" />
 <script type="text/javascript" src="../../assets/js/jsDatePick.min.1.3.js"></script>
<body style="margin:0px;">
    <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;width:100%;'>Filter By date</div>
        <form method="get" action="todaypostads.php">
        <input type="hidden" value="filterdate" name="view">  
            <table cellpadding="5" cellspacing="0" align="left" style="font-family:arial;font-size:12px;color:#222;">
                <tr>
                    <td>From Date: <input id="adpostfrom" type="text" size="30" name="fromdate"/></td>
                    <td>To Date:<input id="adpostto" type="text" size="30" name="todate"/></td>
                    <td><input type="submit" value="View Result"></td>
                </tr>
            </table>
        </form>
</body>
 <script type="text/javascript">
            window.onload = function(){
                new JsDatePick({
                    useMode:2,
                    target:"adpostfrom",
                    dateFormat:'%Y-%m-%d'
                });
                
                  new JsDatePick({
                    useMode:2,
                    target:"adpostto",
                    dateFormat:'%Y-%m-%d'
                });
            };  
</script> 