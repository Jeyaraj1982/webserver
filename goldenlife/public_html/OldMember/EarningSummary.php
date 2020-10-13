<?php include_once("header.php");?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-medal icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>Earning Summary
                                   <!-- <div class="page-title-subheading">Choose between regular React Bootstrap tables or advanced dynamic ones.</div> -->
                                </div>
                            </div>
                                 </div>
                    </div> 
                    <div class="main-card mb-3 card">
                        <div class="card-body">
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
      <?php include_once("footer.php");?>