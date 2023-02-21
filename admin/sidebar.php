<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="admin_style.css">

<header class="header">

   <section class="flex">

      <a href="home.php" class="logo"><img src="live-streaming.png" alt="logo"></a>

      <form action="search_page.php" method="post" class="search-form">
         <input type="text" name="search" placeholder="search here..." required maxlength="100">
         <button type="submit" class="fas fa-search" name="search_btn"></button>
      </form>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <img src="live-streaming.png" alt="foto profile">
         <h3>Nama</h3>
         <span>admin</span>
         <a href="profile.php" class="btn">view profile</a>
         <a href="logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
      </div>

   </section>

</header>

<!-- header section ends -->

<!-- side bar section starts  -->

<div class="side-bar">

   <div class="close-side-bar">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
         <img src="live-streaming.png" alt="profile">
         <h3>Nama</h3>
         <span>Admin</span>
         <a href="profile.php" class="btn">view profile</a>
      </div>

   <nav class="navbar">
      <a href="home.php"><i class="fas fa-home"></i><span>home</span></a>
      <a href="pegawai.php"><i class="fas fa-user"></i><span>data pegawai</span></a>
      <a href="subbagian.php"><i class="fas fa-building"></i><span>data sub bagian</span></a>
      <a href="cttn_kinerja.php"><i class="fas fa-book"></i><span>catatan kinerja pegawai</span></a>
      <a href="about.php"><i class="fas fa-question-circle"></i><span>about us</span></a>
   </nav>

</div>

<!-- side bar section ends -->

<script src="admin_script.js"></script>