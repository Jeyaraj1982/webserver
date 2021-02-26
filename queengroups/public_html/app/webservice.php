<?php
include_once("../config.php");
echo $_REQUEST['action']();
    
function DeleteService(){
    global $mysql;
    $service = $mysql->select("select * from _queen_services where ServiceID='".$_POST['ServiceID']."'");
    $Order = $mysql->select("select * from _queen_order_item where ServiceCode='".$service[0]['ServiceCode']."'");
    $result = array();
    if(sizeof($Order)==0){
        $mysql->execute("DELETE FROM _queen_services  where ServiceID  ='".$_POST['ServiceID']."'");
        $result['status']="Success";
        $result['message']="Service Deleted Successfully";
    }else {
        $result['status']="Failure";
        $result['message']="Service couln't be delete.<br>Service already used";
    }
    return json_encode($result);
}

function DeleteAgent(){
    global $mysql;
    $Order = $mysql->select("select * from _queen_orders where AgentID='".$_POST['AgentID']."'");
    $result = array();
    if(sizeof($Order)==0){
        $mysql->execute("DELETE FROM _queen_agent  where AgentID  ='".$_POST['AgentID']."'");
        $result['status']="Success";
        $result['message']="Agent Deleted Successfully";
    }else {
        $result['status']="failure";
        $result['message']="Agent couln't be delete.<br>Agent already place order";
    }
    return json_encode($result);
}

function DeleteStaff(){
    global $mysql;
    $ErrorCount=0;
    $ErrorrMessage = array();
    
    $Order = $mysql->select("select * from _queen_orders where StaffID='".$_POST['StaffID']."'");
    if(sizeof($Order)>0){
         $ErrorCount++;
         $ErrorrMessage[]="Staff Creates Some Orders";
    }
    $Agent = $mysql->select("select * from _queen_agent where StaffID='".$_POST['StaffID']."' and IsAgent='1'");
    if(sizeof($Agent)>0){
         $ErrorCount++;
         $ErrorrMessage[]="Staff Creates Some Agents";
    }
    $Customer = $mysql->select("select * from _queen_agent where StaffID='".$_POST['StaffID']."' and IsAgent='0'");
    if(sizeof($Customer)>0){
         $ErrorCount++;
         $ErrorrMessage[]="Staff Creates Some Customers";
    }
    $Service = $mysql->select("select * from _queen_services where StaffID='".$_POST['StaffID']."'");
    if(sizeof($Service)>0){
         $ErrorCount++;
         $ErrorrMessage[]="Staff Creates Some Services";
    }
    $Expenses = $mysql->select("select * from _queen_expenses where StaffID='".$_POST['StaffID']."'");
    if(sizeof($Expenses)>0){
         $ErrorCount++;
         $ErrorrMessage[]="Staff Creates Some Expenses";
    }
    $result = array();
    if($ErrorCount==0){    
        $mysql->execute("DELETE FROM _queen_staffs  where StaffID  ='".$_POST['StaffID']."'");
        $result['status']="Success";
        $result['message']="Staff Deleted Successfully";
    }else {
        $result['status']="failure";
        $result['message']= implode("<br>",$ErrorrMessage);
    }
    return json_encode($result);
}

function DeleteExpense(){
    global $mysql;
    $mysql->execute("DELETE FROM _queen_expenses  where ExpenseID  ='".$_POST['ExpenseID']."'");
    $result = array();
    $result['status']="Success";
    $result['message']="Expense Deleted Successfully";
    return json_encode($result);
}

function DeleteExpenseType(){
    global $mysql;
    $expense = $mysql->select("select * from _queen_expenses where ExpenseTypeID='".$_POST['ExpenseTypeID']."'");
    $result = array();
    if(sizeof($expense)==0){ 
        $mysql->execute("DELETE FROM _queen_expensetype  where ExpenseTypeID  ='".$_POST['ExpenseTypeID']."'");
        $result['status']="Success";
        $result['message']="Expense Type Deleted Successfully";
        return json_encode($result);
    }else{
        $result['status']="Failure";
        $result['message']="Expense Type Already Used In Expense";
        return json_encode($result);   
    }
}

function GetAgentDetails() {
    global $mysql;
    $agentdetails = $mysql->select("select * from _queen_agent where AgentID='".$_REQUEST['AgentID']."'");
    $html = '<div class="form-group">';
    $html.=$agentdetails[0]['AgentName'];
    $html.='<br>';
    $html.=$agentdetails[0]['MobileNumber'];
    $html.='<br>';
    $html .= '</div>';
    return $html;
}

function GetServiceDetails() {
    global $mysql;
    if(trim($_GET['term'])!=""){
        $servicedetails = $mysql->select("select * from _queen_services where ServiceName Like '".$_GET['term']."%' order by ServiceName");
    }else{
        $servicedetails = $mysql->select("select * from _queen_services order by ServiceName");
    }
    return json_encode($servicedetails);
}

function GetAgentInfo() {
    global $mysql;
    if(trim($_GET['term'])!=""){
        $sql = "SELECT Agent.*, IFNULL(Wallet.AvailableBalance,0) AS AvailableBalance FROM 
                (SELECT * FROM _queen_agent WHERE IsAgent='1' and (AgentName Like '".$_GET['term']."%' or AgentCode Like '".$_GET['term']."%') order by AgentName) AS Agent 
                LEFT JOIN 
                (SELECT AgentID,SUM(Credits)-SUM(Debits) AS AvailableBalance FROM _queen_wallet GROUP BY AgentID HAVING SUM(Credits)>=0 ) AS Wallet
                ON Agent.AgentID = Wallet.AgentID";
    }else{
        $sql = "SELECT Agent.*, IFNULL(Wallet.AvailableBalance,0) AS AvailableBalance FROM 
                (SELECT * FROM _queen_agent WHERE IsAgent='1' order by AgentName) AS Agent 
                LEFT JOIN 
                (SELECT AgentID,SUM(Credits)-SUM(Debits) AS AvailableBalance FROM _queen_wallet GROUP BY AgentID HAVING SUM(Credits)>=0 ) AS Wallet
                ON Agent.AgentID = Wallet.AgentID";
    }
    return json_encode($mysql->select($sql));
}

function GetCustomerInfo() {
    global $mysql;
    if(trim($_GET['term'])!=""){
        $sql = "SELECT Agent.*, IFNULL(Wallet.AvailableBalance,0) AS AvailableBalance FROM 
                (SELECT * FROM _queen_agent WHERE IsAgent='0' and AgentName Like '".$_GET['term']."%' order by AgentName) AS Agent 
                LEFT JOIN 
                (SELECT AgentID,SUM(Credits)-SUM(Debits) AS AvailableBalance FROM _queen_wallet GROUP BY AgentID HAVING SUM(Credits)>=0 ) AS Wallet
                ON Agent.AgentID = Wallet.AgentID";
    }else{
        $sql = "SELECT Agent.*, IFNULL(Wallet.AvailableBalance,0) AS AvailableBalance FROM 
                (SELECT * FROM _queen_agent WHERE IsAgent='0' order by AgentName) AS Agent 
                LEFT JOIN 
                (SELECT AgentID,SUM(Credits)-SUM(Debits) AS AvailableBalance FROM _queen_wallet GROUP BY AgentID HAVING SUM(Credits)>=0 ) AS Wallet
                ON Agent.AgentID = Wallet.AgentID";
    }
    return json_encode($mysql->select($sql));
}

function GetStaffInfo() {
    global $mysql;
    if(trim($_GET['term'])!=""){
        $GetStaffDetails = $mysql->select("select * from _queen_staffs where StaffName Like '".$_GET['term']."%' order by StaffName");
    }else {
        $GetStaffDetails = $mysql->select("select * from _queen_staffs order by StaffName");
    }
    return json_encode($GetStaffDetails);
}

function GetExpenseTypeInfo() {
    global $mysql;
    if(trim($_GET['term'])!=""){
        $GetExpenseTypeDetails = $mysql->select("select * from _queen_expensetype where ExpenseType Like '".$_GET['term']."%' order by ExpenseType");
    }else {
        $GetExpenseTypeDetails = $mysql->select("select * from _queen_expensetype order by ExpenseType");    
    }
    return json_encode($GetExpenseTypeDetails);
}

function updateorderfromadmin(){
    
    global $mysql;
	$id =  $mysql->execute("update _queen_order_item set `Charge`     ='".$_POST['Charge']."',
                                                         `FeeAmount`  ='".$_POST['FeeAmount']."',
                                                         `TotalAmount` ='".$_POST['TotalAmount']."' where ItemID='".$_POST['ItemID']."'");
														 
	$orderitem = $mysql->select("select * from _queen_order_item where ItemID='".$_POST['ItemID']."'");
	$subtotal = $mysql->select("select sum(TotalAmount) as Total from _queen_order_item where OrderID='".$orderitem[0]['OrderID']."'");													 
	$mysql->execute("update _queen_orders set `OrderTotal`     ='".$subtotal[0]['Total']."' where OrderID='".$orderitem[0]['OrderID']."'");
	$result = array();
	$result['status']="Success";
	$result['message']="Updated Successfully";
	$result['total']=$subtotal;
	return json_encode($result);
}

function Removeitem(){
	global $mysql;

    $orderitem = $mysql->select("select * from _queen_order_item where ItemID='".$_POST['ItemID']."'");
	$subtotal = $mysql->select("select sum(TotalAmount) as Total from _queen_order_item where OrderID='".$orderitem[0]['OrderID']."'");													 
	
	$total = $subtotal[0]['Total']-$orderitem[0]['TotalAmount']; 
	
	$mysql->execute("update _queen_orders set `OrderTotal`     ='".$total."' where OrderID='".$orderitem[0]['OrderID']."'");
	$mysql->execute("DELETE FROM _queen_order_item  where ItemID  ='".$_POST['ItemID']."'");
	
	$result = array();
	$result['status']="Success";
	$result['message']="Removed Successfully";
	$result['total']=$total;
	return json_encode($result);
}

function RemoveExpense(){
    global $mysql;
    $mysql->execute("DELETE FROM _queen_expenses  where ExpenseID  ='".$_POST['ExpenseID']."'");
    return json_encode(array("status"=>"Success",
                             "message"=>"Expense Removed Successfully"));
}
function DeleteSavedInvoice(){
    global $mysql;
    $mysql->execute("DELETE FROM _queen_temp_orders  where OrderID  ='".$_POST['OrderID']."'");
    return json_encode(array("status"=>"Success",
                             "message"=>"Removed Successfully"));
}
function updatesaveorderfromadmin(){ 
	global $mysql;
	
	$id =  $mysql->execute("update _queen_temp_order_item set  `Charge`     	='".$_POST['ServiceCharge']."',
                                                               `FeeAmount`  	='".$_POST['FeeAmount']."',
                                                               `TotalAmount`	='".$_POST['total']."',
															   `AddedBy` 		='Admin',
															   `AddedByID`		='".$_SESSION['User']['AdminID']."',
															   `AddedOn` 		='".date("Y-m-d H:i:s")."' 
                                                                where ItemID='".$_POST['ItemID']."'");
														 
	$orderitem = $mysql->select("select * from _queen_temp_order_item where ItemID='".$_POST['ItemID']."'");
	$subtotal = $mysql->select("select sum(TotalAmount) as Total from _queen_temp_order_item where OrderID='".$orderitem[0]['OrderID']."'");													 
	$mysql->execute("update _queen_temp_orders set `OrderTotal`     ='".$subtotal[0]['Total']."' where OrderID='".$orderitem[0]['OrderID']."'");
	
	$result = array();
	$result['status']="Success";
	$result['message']="Updated Successfully";
	$result['total']=$subtotal;
	$result['total']=$subtotal;
	return json_encode($result);
}
function Removesaveditemfromadmin(){
	global $mysql;
	
    $orderitem = $mysql->select("select * from _queen_temp_order_item where ItemID='".$_POST['ItemID']."'");
	$subtotal = $mysql->select("select sum(TotalAmount) as Total from _queen_temp_order_item where OrderID='".$orderitem[0]['OrderID']."'");													 
	
	$total = $subtotal[0]['Total']-$orderitem[0]['TotalAmount']; 
	
	$mysql->execute("update _queen_temp_orders set `OrderTotal`     ='".$total."' where OrderID='".$orderitem[0]['OrderID']."'");
	$mysql->execute("DELETE FROM _queen_temp_order_item  where ItemID  ='".$_POST['ItemID']."'");
	
	$result = array();
	$result['status']="Success";
	$result['message']="Removed Successfully";
	$result['total']=$total;
	return json_encode($result);
	
}
function CancelOrderFromAdmin(){
	global $mysql;
	
    $mysql->execute("DELETE FROM _queen_temp_orders  where OrderID  ='".$_POST['OrderID']."'");
    $mysql->execute("DELETE FROM _queen_temp_order_item  where OrderID  ='".$_POST['OrderID']."'");
	
	$result = array();
	$result['status']="Success";
	$result['message']="Order Cancelled Successfully";
	return json_encode($result);
	
}
function CancelOrderFromStaff(){
    global $mysql;
    
    $mysql->execute("DELETE FROM _queen_temp_orders  where OrderID  ='".$_POST['OrderID']."'");
    $mysql->execute("DELETE FROM _queen_temp_order_item  where OrderID  ='".$_POST['OrderID']."'");
    
    $result = array();
    $result['status']="Success";
    $result['message']="Order Cancelled Successfully";
    return json_encode($result);
    
}
function ConfirmBack(){
	global $mysql;
	
    $mysql->execute("update _queen_temp_orders set `Edit` ='0' where OrderID='".$_POST['OrderID']."'");
	$result = array();
	$result['status']="Success";
	return json_encode($result);
	
} 




function SaveOrder() {
    global $mysql;
    
    if (!(isset($_POST['Agent']) && $_POST['Agent']>0)) {
       return json_encode(array("status"=>"failure","message"=>"Please select Agent/Customer")); 
    }
    $random = sizeof($mysql->select("select * from _queen_temp_orders")) + 1;
        $OrderCode ="ORD0000".$random;
        
        $Agentdetails = $mysql->select("select * from _queen_agent where AgentID='".$_POST['Agent']."'"); 
        
        $isHaveOrder = $mysql->select("select * from _queen_temp_orders where AgentID='".$Agentdetails[0]['AgentID']."' and date(OrderOn)=date('".date("Y-m-d")."')");
        
        if (sizeof($isHaveOrder)==0) {
              //"OrderOn"            => date("Y-m-d H:i:s"),
              $orderOn = $_POST['frmYear']."-".$_POST['frmMonth']."-".$_POST['frmDay'];
        $id = $mysql->insert("_queen_temp_orders",array("AgentID"            => $Agentdetails[0]['AgentID'],
                                                        "AgentCode"          => $Agentdetails[0]['AgentCode'],
                                                        "AgentName"          => $Agentdetails[0]['AgentName'],
                                                        "AgentMobileNumber"  => $Agentdetails[0]['MobileNumber'],
                                                        "StaffID"            => $_SESSION['User']['StaffID'],
                                                        "StaffCode"          => $_SESSION['User']['StaffCode'],
                                                        "StaffName"          => $_SESSION['User']['StaffName'],
                                                        "OrderCode"          => $OrderCode,
                                                        "OrderTotal"         => $_POST['subtotal'],
                                                        "OrderOn"            => $orderOn,
                                                        "LastUpdatedBy"      => "Staff",
                                                        "LastUpdatedByID"    => $_SESSION['User']['StaffID'],
                                                        "LastUpdatedOn"      => $orderOn));
        } else {
            $id = $isHaveOrder[0]['OrderID'];
        }
                               
                for ($i = 0; $i < count($_POST['ServiceCode']); $i++) {
                                                                                      
                $sid= $mysql->insert("_queen_temp_order_item",array("OrderID"     => $id,
                                                               "ServiceID"   => $_POST['ServiceID'][$i],
                                                               "ServiceCode" => $_POST['ServiceCode'][$i],
                                                               "ServiceName" => $_POST['ServiceName'][$i],
                                                               "DocDetails"  => $_POST['DocDetails'][$i],
                                                               "Charge"      => $_POST['ServiceCharge'][$i],
                                                               "FeeAmount"   => $_POST['FeeAmount'][$i],
                                                               "TotalAmount" => $_POST['total'][$i],
                                                               "AddedBy"     => "Staff",
                                                               "AddedByID"   => $_SESSION['User']['StaffID'],
                                                               "AddedOn"     => $orderOn));
                }
    
     if(sizeof($id)>0){      
        return json_encode(array("status"=>"success","OrderID"=>md5($id),"OrderCode"=>$OrderCode));
     } else {
          return json_encode(array("status"=>"failure","message"=>"Couldn't be save"));
     }
}

function CreateInvoice() {
    
    global $mysql;
    
    $random = sizeof($mysql->select("select * from _queen_orders")) + 1;
    $OrderCode ="ORD0000".$random;
    
    $temp_order = $mysql->select("select * from _queen_temp_orders where md5(OrderID)='".$_POST['OrderID']."'");
    $Agentdetails = $mysql->select("select * from _queen_agent where AgentID='".$temp_order[0]['Agent']."'"); 

    $id = $mysql->insert("_queen_orders",array("AgentID"            => $temp_order[0]['AgentID'],
                                               "AgentCode"          => $temp_order[0]['AgentCode'],
                                               "AgentName"          => $temp_order[0]['AgentName'],
                                               "AgentMobileNumber"  => $temp_order[0]['AgentMobileNumber'],
                                               "StaffID"            => $temp_order[0]['StaffID'],
                                               "StaffCode"          => $temp_order[0]['StaffCode'],
                                               "StaffName"          => $temp_order[0]['StaffName'],
                                               "OrderCode"          => $OrderCode,
                                               "OrderTotal"         => $temp_order[0]['OrderTotal'],
                                               "OrderOn"            => $temp_order[0]['OrderOn']));
    $temp_order_items = $mysql->select("select * from _queen_temp_order_item where md5(OrderID)='".$_POST['OrderID']."'");                                           
    foreach($temp_order_items as $item) {
        $sid= $mysql->insert("_queen_order_item",array("OrderID"     => $id,
                                                       "ServiceID"   => $item['ServiceID'],
                                                       "ServiceCode" => $item['ServiceCode'],
                                                       "ServiceName" => $item['ServiceName'],
                                                       "Charge"      => $item['ServiceCharge'],
                                                       "Charge"      => $item['ServiceCharge'],
                                                       "DocDetails"  => $item['DocDetails'],
                                                       "FeeAmount"   => $item['FeeAmount'],
                                                       "TotalAmount" => $item['TotalAmount'],
                                                       "AddedBy"     => "Staff",
                                                       "AddedByID"   => $_SESSION['User']['StaffID'],
                                                       "AddedOn"     =>  $temp_order[0]['OrderOn']));
    }
    $mysql->insert("_queen_wallet",array("AgentID"            => $temp_order[0]['AgentID'],
                                         "Credits"            => $temp_order[0]['OrderTotal'], 
                                         "Debits"             => "0",
                                         "AvailableBalance"   => getTotalBalanceWallet($temp_order[0]['AgentID'])+$temp_order[0]['OrderTotal'],
                                         "Particulars"        => "Create Order /".$id,
                                         "StaffID"            => $_SESSION['User']['StaffID'],
                                         "AddOn"              => $temp_order[0]['OrderOn']));
    
    $mysql->execute("delete from _queen_temp_orders where OrderID='".$temp_order[0]['OrderID']."'");                                                               
    $mysql->execute("delete from _queen_order_item where OrderID='".$temp_order[0]['OrderID']."'");                                                               
    
    // $mysql->execute("update _queen_orders set IsPaid='1',PaidOn='".date("Y-m-d H:i:s")."' where OrderID    ='".$id."'");  
    if(sizeof($id)>0){      
        return json_encode(array("status"=>"success","orderid"=>$OrderCode,"message"=>"Order Completed"));
    } else {
        return json_encode(array("status"=>"failure","message"=>"Couldn't be save"));
    }
}
?>