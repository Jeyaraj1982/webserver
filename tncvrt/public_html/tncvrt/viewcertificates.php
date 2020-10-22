<?php include_once("header.php");?>
<?php $page="ViewCertificates"; ?>
<div class="col-sm-8">
<h4>View Certificates</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Reg No</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
          <?php $certificates= $mysql->select("select * from `_tbl_upload_certificates`");?>
            <?php foreach($certificates as $certificate) {?>
          
            <tr>
                <td><?php echo $certificate['RegisterNumber'];?></td>
                <td><?php echo $certificate['Name'];?></td>
                <td><?php echo $certificate['DateOfBirth'];?></td>
                <td><a href="viewcertificatephoto.php?id=<?php echo $certificate['StudentID'];?>">View Cerificate</a></td>
                <td>
                    <?php
                        $c = $mysql->select("select * from _tblHistory where RegisterNumber ='".$certificate['RegisterNumber']."'");
                        echo sizeof($c);
                    ?>
                </td>
            </tr>
                <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
