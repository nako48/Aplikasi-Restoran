<?php
include('../header.php');
?>
<?php
error_reporting(0);
session_start();
if(!empty($_SESSION['username'])){
  exit(header('location: /users/index.php'));  
}
?>
<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
  <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
    <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Form <span class="tx-info tx-normal">Login</span></div>
    <div class="tx-center mg-b-60">    
      <?php
      if(isset($_GET['error'])){
        if($_GET['error'] == "1"){
          echo "Maaf Username/Password Tidak Terdaftar"; 
        }else if($_GET['error'] == "2"){
          echo "Maaf Username/Password Salah"; 
        }
      }
      ?></div>
      <form action="proseslogin.php" method="POST">
        <div class="form-group">
          <input type="text" name="mail" class="form-control" placeholder="Enter your username">
        </div>
        <div class="form-group">
          <input type="password" name="pass" class="form-control" placeholder="Enter your password">
        </div>
        <button type="submit" class="btn btn-info btn-block">Sign In</button>
      </div>
    </div>

    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>

  </body>
  </html>