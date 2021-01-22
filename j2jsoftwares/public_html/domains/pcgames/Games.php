<?php 
    $page="Games";
    include_once("header.php");
    include_once("sidebar.php");
?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h5 class="content-header-title float-left pr-1 mb-0">Games</h5>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb p-0 mb-0">
                                <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Games</a>
                                </li>
                                <li class="breadcrumb-item active">Manage Game Details
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic card section start -->
            <section id="table-transactions">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Manage Game Details</h5>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                              <li class="ml-2"><a href="AddGames.php" class="btn btn-primary">Add</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div id="table-extended-transactions_wrapper" class="dataTables_wrapper no-footer">
                            <table id="table-extended-transactions" class="table mb-0 dataTable no-footer" role="grid"> 
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_desc" tabindex="0" aria-controls="table-extended-transactions" rowspan="1" colspan="1" style="width: 117.417px;" aria-label="status: activate to sort column ascending" aria-sort="descending">Disc Number</th>
                                        <th class="sorting_desc" tabindex="0" aria-controls="table-extended-transactions" rowspan="1" colspan="1" style="width: 117.417px;" aria-label="status: activate to sort column ascending" aria-sort="descending">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="table-extended-transactions" rowspan="1" colspan="1" style="width: 159.9px;" aria-label="name: activate to sort column ascending">Size</th>
                                        <th class="sorting" tabindex="0" aria-controls="table-extended-transactions" rowspan="1" colspan="1" style="width: 99.2833px;" aria-label="amount: activate to sort column ascending">Created On</th>
					<th class="sorting" tabindex="0" aria-controls="table-extended-transactions" rowspan="1" colspan="1" style="width: 99.2833px;" aria-label="amount: activate to sort column ascending"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql = $mysql->select("Select * from _tbl_game_details order by GameID DESC");
                                        foreach($sql as $game){?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $game['DiscNumber'];?></td>
                                        <td><img src="uploads/GameImage/<?php echo $game['GameImage'];?>" style="width:150px"></td>
                                        <td><?php echo $game['GameName'];?></td>
                                        <td><?php echo $game['DiskSize'];?></td>
					<td><?php echo $game['CreatedOn'];?></td>

                                        <td style="text-align: right;"><a href="EditGame.php?Code=<?php echo $game['GameID'];?>">Edit</a>&nbsp;|&nbsp;<a href="ViewGame.php?Code=<?php echo $game['GameID'];?>">View</a></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Card types section end -->
        </div>
      </div>
    </div>
    <!-- END: Content-->
   
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

<?php include_once("footer.php");?>