<!DOCTYPE html>
<header>
<nav id="main-navbar" class="navbar navbar-expand-lg navbar-light fixed-top">


<div class="container-fluid">


  <button
    class="navbar-toggler"
    type="button"
    data-bs-toggle="collapse"
    data-bs-target="#sidebarMenu"
    aria-controls="sidebarMenu"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <i class="fas fa-bars"></i>
  </button>


  <a class="navbar-brand ps-5" href="index.php">
    <img
      src="/../img/logo.jpg"
      height="50"
      alt="Let me cook Logo"
      loading="lazy"
    />
  </a>

  


  <ul class="navbar-nav ms-auto d-flex flex-row">
  <li class="nav-item ps-5 pe-5 border-end border-start">
      <a class="nav-link" href="index.php">Trang chủ</a>
    </li>
  <li class="nav-item ps-5 pe-5 border-end border-start">
      <a class="nav-link" href="about.php">Giới thiệu</a>
    </li>
    <li class="nav-item ps-5 pe-5 border-end border-start">
      <a class="nav-link" href="view.php">Công thức</a>
    </li>
  <?php 
  if(isset($_SESSION['id'])) {
    $s="SELECT ten_tk from tai_khoan where id='$_SESSION[id]'";
    $res=mysqli_query($connect,$s);
    $ten=mysqli_fetch_array($res);
    echo'
    <li class="nav-item dropdown ps-5 pe-5" id="av">
      <a
        class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center "
        href="#"
        id="navbarDropdownMenuLink"
        role="button"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        '.$ten['ten_tk'].'
      </a>
      <ul
        class="dropdown-menu dropdown-menu-end ms-2"
        aria-labelledby="navbarDropdownMenuLink"
      >
      <li><a class="dropdown-item" href="store.php">MY RECIPES</a></li>
      <li><a class="dropdown-item" href="editprofile.php">Profile</a></li>
        <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
      </ul>
    </li>';}else{
      echo '<li class="nav-item ps-5 pe-5  border-start me-5">
      <a class="nav-link" href="login.php">ĐĂNG NHẬP</a>
    </li>';
    }
    ?>
  </ul>
</div>

</nav>
    </header>

    <style>
    #search-btn:hover{
      cursor: pointer;
    }

    main{
      padding-top: 100px;
    }

#main-navbar{
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
  background: white;
}

 </style>