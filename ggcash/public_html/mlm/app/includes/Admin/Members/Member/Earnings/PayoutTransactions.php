<?php
    $requests = $mysql->select("select * from _tbl_payoutsummary where (`DebitLeft` >0 or `DebitRight`>0 ) and MemberID='".$data[0]['MemberID']."'  Order by `PayoutID` Desc");
    $requestsummary = $mysql->select("select   sum(TodayLeft) as _TodayLeft, sum(TodayRight) as _TodayRight , sum(DebitLeft) as _DebitLeft, sum(DebitRight) as _DebitRight from _tbl_payoutsummary where (`DebitLeft` >0 or `DebitRight`>0 ) and MemberID='".$data[0]['MemberID']."'  Order by `PayoutID` Desc");
?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Payout Transactions</h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                    <table style="display: none;">
                            <tr>
                                <td></td>
                                <td>Left (PV)</td>
                                <td>Right (PV)</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><?php echo $requests[sizeof($requests)-1]['TotalLeft'];?></td>
                                <td><?php echo $requests[sizeof($requests)-1]['TotalRight'];?></td>
                            </tr>
                            
                            <tr>
                                <td>Debited</td>               
                                <td><?php echo $requestsummary[0]['_DebitLeft'];?></td>
                                <td><?php echo $requestsummary[0]['_DebitRight'];?></td>
                            </tr>
                            <tr>
                                <td>Available</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Payout</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Remaining</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Today</td>
                                <td></td>
                                <td></td>
                            </tr>
                    </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>