<?php
session_start();
include '../../database/database.php';
if (!isset($_SESSION['UserID'])) {
  header("location: /cse-socity/website/login.php");
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <?php include '../header-link.php'; ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

</head>

<body>

  <div class="container py-5">
    <div class="wrapper ">

      <section class="users ">
        <header>
          <div class="content">
            <?php
            $sql = mysqli_query($conn, "SELECT * FROM user WHERE UserID = {$_SESSION['UserID']}");
            if (mysqli_num_rows($sql) > 0) {
              $row = mysqli_fetch_assoc($sql);
            }
            ?>
            <?php
            if ($row['img']) {
            ?>
              <img src="/cse-socity/website/img/<?php echo $row['img']  ?>" alt="nothing found" width="20" height="20" class="d- mx-auto rounded-circle">
            <?php
            } else {
            ?>
              <i class="fa fa-user-circle fa-2x text-primary " aria-hidden="true"></i>

            <?php
            }
            ?>
            <div class="details ms-2">
              <span><?php echo $row['name'] ?></span>
              <p class="small"></p>
            </div>
          </div>
        </header>
        <div class="search">
          <span class="text" class="small">Select an user to start chat</span>
          <input type="text" placeholder="Enter name to search...">
          <button>
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>
        </div>
        <div class="users-list">

        </div>
      </section>

      <div><a class="btn btn-sm btn-outline-dark d-block mx-auto" href="/cse-socity/">Back to Home</a></div>
    </div>
  </div>

  <script src="javascript/users.js"></script>

</body>

</html>