<?php
  $Members =$mysqldb->select("select * from `_tbl_operators` ");
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-6 align-self-center">
                <h4 class="page-title">List of My Members</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Operators</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>                                            
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
                                <thead>
                                    <tr>
                                        <th class="border-top-0"><b>Operator</b></th>
                                        <th class="border-top-0"><b>Balance</b></th>
                                        <th class="border-top-0"><b>&nbsp;</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($Members as $Member){ ?>
                                    <tr>
                                        <td><?php echo $Member['OperatorName'];?></td>
                                        <td><?php
                                                $response = file_get_contents("http://ecfast.in/hybrid/api/balance.php?optr=".$Member['OperatorCode']."&uname=admin@ggcash.in&pwd=123456");
                                                $data = explode(",",$response);
                                                             echo number_format($data[1],2);  
                                            ?>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                <?php }?>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>