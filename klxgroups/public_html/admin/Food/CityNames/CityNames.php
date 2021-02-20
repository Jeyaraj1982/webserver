
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
                                       Food Hotel City Names
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <p align="right">
                            <a href="dashboard.php?action=Food/CityNames/AddCityName" class="btn btn-success btn-sm">Add Food Hotel City Name</a>
                        </p>
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                               
                                                <th scope="col">City Name</th>
                                                
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $enquirys = $mysql->select("select * from _tbl_foods_citynames where IsActive='1' order by CityName ");?>
                                        <?php 
                                         foreach($enquirys as $enquiry){ 
                                              
                                        ?>
                                            <tr>
                                                <td><?php echo $enquiry['CityName'];?> </td>
                                                
                                                <td style="text-align: right"><a href="dashboard.php?action=Food/CityNames/EditCityName&City=<?php echo $enquiry['HotelCityNameID'];?>">Edit</a></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($enquirys)==0){ ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center;">No records found</td>
                                            </tr>
                                        <?php } ?>
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