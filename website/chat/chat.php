<?php
session_start();
include '../../database/database.php';
if (!isset($_SESSION['UserID'])) {
  header("location: /cse-socity/website/login.php");
}
?>

<head>
<?php include '../header-link.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body class="">
  <div class="wrapper ">
    <section class="chat-area mx-auto">
      <header>
        <?php
        $UserID = mysqli_real_escape_string($conn, $_GET['UserID']);
        $sql = mysqli_query($conn, "SELECT * FROM user WHERE UserID = {$UserID}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          // header("location: users.php");
        }
        ?>
        <a href="users.php" class="back-icon"><i class="fa fa-arrow-left"></i></a>
        <i class="fa fa-user-circle fa-3x mx-2" aria-hidden="true"></i>
        <div class="details">
          <span><?php echo $row['name'] ?></span>
          <p class="small"></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $UserID; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button class="btn btn-primary">
          <i class="fa fa-paper-plane" aria-hidden="true"></i>
        </button>
      </form>
    </section>
    <div><a class="btn btn-sm btn-outline-dark d-block mx-auto" href="/cse-socity/">Back to Home</a></div>

  </div>

  <script src="javascript/chat.js"></script>

</body>

</html>