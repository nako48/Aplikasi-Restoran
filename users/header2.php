<?php
error_reporting(0);
session_start();
if(empty($_SESSION['username'])){
	exit(header('location: /login/index.php'));	
}
include('../koneksi.php');
$username = $_SESSION['username'];
$query = "SELECT * FROM user WHERE username='$username'";
$exe = mysql_query($query);
while($row = mysql_fetch_assoc($exe)){
	$admin = $row['id_level'];
	$nama = $row['nama_user'];
	$id_user = $row['id_user'];	
  $userrna = $row['username']; 
}
if($admin==1){
	$statusnya='administrator';	
}else if($admin==2){
	$statusnya='waiter';	
}else if($admin==3){
	$statusnya='kasir';	
}else if($admin==4){
	$statusnya='owner';	
}else if($admin==5){
	$statusnya='pelanggan';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="twitter:site" content="@themepixels">
  <meta name="twitter:creator" content="@themepixels">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Starlight">
  <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
  <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

  <meta property="og:url" content="http://themepixels.me/starlight">
  <meta property="og:title" content="Starlight">
  <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

  <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
  <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="600">

  <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
  <meta name="author" content="ThemePixels">

  <title>Halaman - <?php echo $statusnya;?></title>

  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="../lib/Ionicons/css/ionicons.css" rel="stylesheet">
  <link href="../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../css/starlight.css">
</head>

<body>
  <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> Restoranku</a></div>
  <div class="sl-sideleft">
    <div class="input-group input-group-search">
      <input type="search" name="search" class="form-control" placeholder="Search">
      <span class="input-group-btn">
        <button class="btn"><i class="fa fa-search"></i></button>
      </span>
    </div>
    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
      <a href="index.html" class="sl-menu-link active">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Dashboard</span>
        </div>
      </a>
      <?php if ($admin==1 || $admin==2 || $admin==3 ){?>
        <a href="/registrasi/" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Registrasi</span>
          </div>
        </a>
      <?php }?>        
      <?php if ($admin==1){?>
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
          <span class="menu-item-label">Entri Referensi</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="../referensi/" class="nav-link">Tambah Referensi</a></li>
        <li class="nav-item"><a href="../referensi/edit.php" class="nav-link">Edit Referensi</a></li>
        <li class="nav-item"><a href="../referensi/delete.php" class="nav-link">Delete Referensi</a></li>
        <li class="nav-item"><a href="../referensi/status.php" class="nav-link">Edit Status</a></li>
        <li class="nav-item"><a href="../referensi/list-ref.php" class="nav-link">List Referensi</a></li>
      </ul>
    </div>
    <?php }?>  
    <?php if ($admin==1 || $admin==2 || $admin==5){?>
    <a href="/order/" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
        <span class="menu-item-label">Entri Order</span>
      </div>
    </a>
    <?php }?>  
    <?php if ($admin==1 || $admin==3){?>
      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
          <span class="menu-item-label">Entri Transaksi</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="../transaksi/" class="nav-link">Entri Transaksi</a></li>
        <li class="nav-item"><a href="../transaksi/list-transaksi.php" class="nav-link">Struck Transaksi</a></li>
      </ul>
    <?php }?>  
    <?php if ($admin==1 || $admin==2 || $admin==3 || $admin==4){?>
    <a href="/generate-laporan/" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
        <span class="menu-item-label">Generate Laporan</span>
      </div>
    </a>
    <?php }?> 
  </div>
  <br>
</div>
<div class="sl-header">
  <div class="sl-header-left">
    <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
    <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
  </div>
  <div class="sl-header-right">
    <nav class="nav">
      <div class="dropdown">
        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
          <span class="logged-name"><?php echo $nama?><span class="hidden-md-down"></span></span>
          <img src="../img/img3.jpg" class="wd-32 rounded-circle" alt="">
        </a>
        <div class="dropdown-menu dropdown-menu-header wd-200">
          <ul class="list-unstyled user-profile-nav">
            <li><a href="../profile/"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
            <li><a href="../logout.php"><i class="icon ion-power"></i> Sign Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="navicon-right">
      <a id="btnRightMenu" href="" class="pos-relative">
        <i class="icon ion-ios-bell-outline"></i>
        <span class="square-8 bg-danger"></span>
      </a>
    </div>
  </div>
</div>
<div class="sl-sideright">
  <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
    </li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
      <div class="media-list">
        <!-- loop starts here -->
        <a href="" class="media-list-link">
          <div class="media">
            <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
              <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
              <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
            </div>
          </div><!-- media -->
        </a>
        <!-- loop ends here -->
        <a href="" class="media-list-link">
          <div class="media">
            <img src="../img/img4.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
              <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
              <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link">
          <div class="media">
            <img src="../img/img7.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
              <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
              <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link">
          <div class="media">
            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
              <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

              <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link">
          <div class="media">
            <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
              <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
              <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
            </div>
          </div><!-- media -->
        </a>
      </div><!-- media-list -->
      <div class="pd-15">
        <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
      </div>
    </div><!-- #messages -->

    <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
      <div class="media-list">
        <!-- loop starts here -->
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
              <span class="tx-12">October 03, 2017 8:45am</span>
            </div>
          </div><!-- media -->
        </a>
        <!-- loop ends here -->
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
              <span class="tx-12">October 02, 2017 12:44am</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
              <span class="tx-12">October 01, 2017 10:20pm</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
              <span class="tx-12">October 01, 2017 6:08pm</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
              <span class="tx-12">September 27, 2017 6:45am</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
              <span class="tx-12">September 28, 2017 11:30pm</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
              <span class="tx-12">September 26, 2017 11:01am</span>
            </div>
          </div><!-- media -->
        </a>
        <a href="" class="media-list-link read">
          <div class="media pd-x-20 pd-y-15">
            <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
            <div class="media-body">
              <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
              <span class="tx-12">September 23, 2017 9:19pm</span>
            </div>
          </div><!-- media -->
        </a>
      </div><!-- media-list -->
    </div><!-- #notifications -->

  </div><!-- tab-content -->
</div><!-- sl-sideright -->
<!-- ########## END: RIGHT PANEL ########## --->

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Restoranku</a>
    <span class="breadcrumb-item active">Dashboard</span>
  </nav>

  <div class="sl-pagebody">

    <div class="row row-sm">
      <div class="col-sm-6 col-xl-3">
        <div class="card pd-20 bg-primary">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Login Sebagai</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?php echo $statusnya;?></h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div><!-- col-3 -->
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
        <div class="card pd-20 bg-info">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Username</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?php echo $userrna;?></h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div><!-- col-3 -->