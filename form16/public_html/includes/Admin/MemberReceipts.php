<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"><h4 class="page-title"></h4></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                My Receipts
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Receipt Number</th> 
                                            <th>Receipt Date</th> 
                                            <th>Invoice Number</th> 
                                            <th style="text-align:right">Receipt Value</th> 
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                        <tr>
                                            <td colspan="6" style="text-align:center;">No records found</td>  
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
<script>$(document).ready(function() {$('#myTable').DataTable({ "order": [[ 1, "desc" ]]});});</script>