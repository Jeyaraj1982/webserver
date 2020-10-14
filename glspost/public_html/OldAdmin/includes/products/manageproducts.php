<div class="app-main__outer">
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-medal icon-gradient bg-tempting-azure">
                    </i>
                </div>
                <div>Manage Products</div>
            </div>
            <div class="page-title-actions">
                 
                 
            </div>    </div>
    </div>            <div class="main-card mb-3 card">
        <div class="card-body">
            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th>ProductCode</th>
                    <th>ProductName</th>
                    <th>ProductDescription</th>
                    <th>ProductPrice</th>
                    <th>Credits</th>
                </tr>
                </thead>
                <tbody>
                <?php $Epins= $mysql->select("select * from  `_tbl_products` order by ProductID");?>
                <?php foreach ($Epins as $Epin){ ?>
                <tr>
                    <td><?php echo $Epin['ProductCode'];?></td>
                    <td><?php echo $Epin['ProductName'];?></td>
                    <td><?php echo $Epin['ProductDescription'];?></td>
                    <td><?php echo $Epin['ProductPrice'];?></td>
                    <td><?php echo $Epin['Credits'];?></td>
                </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>