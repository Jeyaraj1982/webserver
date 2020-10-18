        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Bank Account</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="form-group row">
                                        <div class="col-sm-6"><div class="card-title">Manage Bank </div></div>
                                        <div class="col-sm-6" style="text-align: right;"><a href="dashboard.php?action=AddBank">Add</a></div>
                                    </div>
                                </div>
                                <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Bank name</th>
                                                <th scope="col">IFS Code</th>
                                                <th scope="col">A/C Name</th>
                                                <th scope="col">A/C No</th>
                                                <th scope="col">Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $sqls= $mysql->select("select * from `_tbl_Bank_Details`");
                                            foreach($sqls as $sql){
                                        ?>
                                            <tr>
                                                <td><?php echo $sql['BankName'];?></td>
                                                <td><?php echo $sql['IFSCode'];?></td>
                                                <td><?php echo $sql['AccountName'];?></td>
                                                <td><?php echo $sql['AccountNumber'];?></td>
                                                <td><?php echo $sql['AccountType'];?></td>
                                            </tr>
                                        <?php }  ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
         
      