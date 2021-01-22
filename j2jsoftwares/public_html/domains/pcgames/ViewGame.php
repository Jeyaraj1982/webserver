<?php 
    $page="Games";
    include_once("header.php");
    include_once("sidebar.php");
     $data = $mysql->select("Select * from _tbl_game_details where GameID='".$_GET['Code']."'");
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
                                            <li class="breadcrumb-item active">View Game Details
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <div class="content-body">
            <!-- Basic card section start -->
            <section class="input-validation">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">View Game Details</h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <form class="form-horizontal" novalidate>
              <div class="form-group row">
                <label class="col-sm-2">Name</label>
                <label class="col-sm-10"><?php echo $data[0]['GameName'];?></label>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Size</label>
                <label class="col-sm-10"><?php echo $data[0]['DiskSize'];?>MB</label>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Platform</label>
                <label class="col-sm-10"><?php echo $data[0]['Platform'];?></label>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Date</label>
                <label class="col-sm-10"><?php echo $data[0]['GameDate'];?></label>
              </div> 
              <div class="form-group row">
                <label class="col-sm-2">Release</label>
                <label class="col-sm-10"><?php echo $data[0]['Release'];?></label>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Languages</label>
                <label class="col-sm-10"><?php echo $data[0]['Languages'];?></label>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Genre</label>
                <label class="col-sm-10"><?php echo $data[0]['Genre'];?></label>                  
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Format</label>
                <label class="col-sm-10"><?php echo $data[0]['DiskFormat'];?></label>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Game Image</label>
                <label class="col-sm-10"><img src="uploads/GameImage/<?php echo $data[0]['GameImage'];?>"></label>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Game File</label>
                <label class="col-sm-10"><?php echo $data[0]['GameFile'];?></label>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Disc Number</label>
                <label class="col-sm-10"><?php echo $data[0]['DiscNumber'];?></label>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Youtube Url</label>
                <label class="col-sm-10"><?php echo $data[0]['YoutubeUrl'];?><br><iframe width="560" height="315" src="<?php echo $data[0]['YoutubeUrl'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></label>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Description</label>                                                              
                <label class="col-sm-10"><?php echo $data[0]['Description'];?></label>
              </div>
              <div class="form-group row">
                <label class="col-sm-2">Game Url</label>
                <label class="col-sm-10"><?php echo $data[0]['GameUrl'];?></label>                                    
              </div>
              
              <div class="form-group row"> 
                <label class="col-sm-2">Created On</label>
                <label class="col-sm-10"><?php echo $data[0]['CreatedOn'];?></label>
              </div>
              <a href="Games.php">List</a>&nbsp;&nbsp;<a href="EditGame.php?Code=<?php echo $data[0]['GameID'];?>">Edit</a>
            </form>
          </div>
        </div>
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