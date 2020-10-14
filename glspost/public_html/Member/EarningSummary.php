<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Earning Summary
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table style="width: 100%;" class="mb-0 table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Levels</th>
                                            <th>Earning</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Level 1</td>
                                            <td style="text-align:right"><?php echo number_format(getLevelBasedEarning($_SESSION['User']['MemberCode'],1),2);?></td>
                                            <td><button class="mb-2 mr-2 btn btn-outline-secondary disabled">Move To E-Wallet</button> &nbsp; not eligible to withdraw </td>
                                        </tr>
                                        <tr>
                                            <td>Level 2</td>
                                            <td style="text-align:right"><?php echo number_format(getLevelBasedEarning($_SESSION['User']['MemberCode'],2),2);?></td>
                                            <td><button class="mb-2 mr-2 btn btn-outline-secondary disabled">Move To E-Wallet</button> &nbsp; not eligible to withdraw </td>
                                        </tr>
                                        <tr>
                                            <td>Level 3</td>
                                            <td style="text-align:right"><?php echo number_format(getLevelBasedEarning($_SESSION['User']['MemberCode'],3),2);?></td>
                                            <td><button class="mb-2 mr-2 btn btn-outline-secondary disabled">Move To E-Wallet</button> &nbsp; not eligible to withdraw </td>
                                        </tr>
                                        <tr>
                                            <td>Star</td>
                                            <td style="text-align:right"><?php echo number_format(getLevelBasedEarning($_SESSION['User']['MemberCode'],"Star"),2);?></td>
                                            <td><button class="mb-2 mr-2 btn btn-outline-secondary disabled">Move To E-Wallet</button> &nbsp; not eligible to withdraw </td>
                                        </tr>
                                        <tr>
                                            <td>Double Star</td>
                                            <td style="text-align:right"><?php echo number_format(getLevelBasedEarning($_SESSION['User']['MemberCode'],5),2);?></td>
                                            <td><button class="mb-2 mr-2 btn btn-outline-secondary disabled">Move To E-Wallet</button> &nbsp; not eligible to withdraw </td>
                                        </tr>
                                        <tr>
                                            <td>Silver </td>
                                            <td style="text-align:right"><?php echo number_format(getLevelBasedEarning($_SESSION['User']['MemberCode'],"Silver"),2);?></td>
                                            <td><button class="mb-2 mr-2 btn btn-outline-secondary disabled">Move To E-Wallet</button> &nbsp; not eligible to withdraw </td>
                                        </tr>
                                        <tr>
                                            <td>Double Silver</td>
                                            <td style="text-align:right"><?php echo number_format(getLevelBasedEarning($_SESSION['User']['MemberCode'],7),2);?></td>
                                            <td><button class="mb-2 mr-2 btn btn-outline-secondary disabled">Move To E-Wallet</button> &nbsp; not eligible to withdraw </td>
                                        </tr>
                                         <tr>
                                            <td>Gold</td>
                                            <td style="text-align:right"><?php echo number_format(getLevelBasedEarning($_SESSION['User']['MemberCode'],"Gold"),2);?></td>
                                            <td><button class="mb-2 mr-2 btn btn-outline-secondary disabled">Move To E-Wallet</button> &nbsp; not eligible to withdraw </td>
                                        </tr>
                                         <tr>
                                            <td>Double Gold</td>
                                            <td style="text-align:right"><?php echo number_format(getLevelBasedEarning($_SESSION['User']['MemberCode'],9),2);?></td>
                                            <td><button class="mb-2 mr-2 btn btn-outline-secondary disabled">Move To E-Wallet</button> &nbsp; not eligible to withdraw </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script>