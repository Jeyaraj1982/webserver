
    <div style="width: 450px;margin:0px auto;font-family:arial;color:#333;border:1px solid #ccc;padding:20px;background:#ddd">
        <?php

if (isset($_POST['btnReset'])) {
    if ($_POST['skey']=="Ux31=9@!45Wl") {
        $_POST['skey']=2;
        include_once("../config.php");
        $id =  time(); 
        $backup_file = "db_".$id. '.sql';
        $command = "mysqldump -h".DbHost." -u".DbUser." -p".DbPassword." ".DbName."  > ".$backup_file;
        system($command);
        $mysql->execute("
        TRUNCATE _audit_tblEpins;
        TRUNCATE _tblEpins;
        TRUNCATE _tblPlacements;
        DELETE FROM _tbl_Members WHERE MemberID>1;
        UPDATE _tbl_Members SET IsPayoutEligible='0',IsBinaryEligible='0' WHERE MemberID=1;
        ");
        echo "application rest process completed. Backup ID: ".$id;
    } else {
        echo "Security key is invalid";
    }
} else {
?>
        <h2>Reset Epins,Members,Tree</h2>
        <form action="" method="post">
            Security Key<br>
            <input type="password" name="skey" style="width:100%"><br>
            <input type="submit" value="Reset" name="btnReset">
        </form>
        <?php } ?>
</div>
