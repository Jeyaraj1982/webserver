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
                (SELECT * FROM _queen_agent WHERE IsAgent='1' and AgentName Like '".$_GET['term']."%' order by AgentName) AS Agent 
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
?>