<?php 
    include_once("header.php");
    
?>
<div class="main-panel"  style="width: 100%;height:auto !important">
    <div class="container"> 
        <div class="page-inner">
        <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>
            <div class="page-header">
                <ul class="breadcrumbs" style="border:none;margin-left:0px;padding-left:0px;">
                    <li class="nav-home">
                        <a href="<?php echo country_url;?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>" >Home</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>mypage" >Dashboard</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>products" >My Product Credits</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6"><h4 class="card-title">My Product Credits</h4></div>
                    </div>
                </div>
                <div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Particulars</th>    
									<th style="text-align: right">Credits</th>    
									<th style="text-align: right">Debits</th> 
									<th style="text-align: right">Available Balance</th>   
								</tr>
							</thead>  
							<tbody>
								<?php     
									$sql = $mysql->select("select * from _tbl_product_credits where UserID='".$_SESSION['USER']['userid']."' order by CreditsID desc");
									foreach($sql as $user){ 
										
								?>
									<tr>                                                                                                                                                                           
										<td><?php echo $user["Particulars"];?></td>
										<td style="text-align: right"><?php echo $user["Credits"];?></td>
										<td style="text-align: right"><?php echo $user["Debits"];?></td>
										<td style="text-align: right"><?php echo $user["Balance"];?></td>
									</tr>
								<?php } ?>
								<?php if(sizeof($sql)==0){ ?>
									<tr>
										<td colspan="4" style="text-align: center;">No Summary Found</td>
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

<?php include_once("footer.php"); ?> 
