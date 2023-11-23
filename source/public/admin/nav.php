<!DOCTYPE html>
<header>
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
      <a
          class="list-group-item list-group-item-action py-2 ripple"
          aria-current="true"
          href="index.php"
          aria-expanded="true"
        >
        <i class="fa fa-home me-3" aria-hidden="true"></i><span>Trang chủ</span>
        </a>
        <a
          class="list-group-item list-group-item-action py-2 ripple"
          aria-current="true"
          data-bs-toggle="collapse"
          href="#collapseExample1"
          aria-expanded="true"
          aria-controls="collapseExample1"
        >
        <i class="fa fa-list-alt me-3" aria-hidden="true"></i><span>Danh mục</span>
        </a>

        <ul id="collapseExample1" class="collapse list-group list-group-flush">
          <li class="list-group-item py-1 ps-4">
            <a href="add_category.php" class="text-reset">Thêm mới</a>
          </li>
          <li class="list-group-item py-1 ps-4">
            <a href="view_categories.php" class="text-reset">Xem thông tin</a>
          </li>
        </ul>


        <a
          class="list-group-item list-group-item-action py-2 ripple"
          aria-current="true"
          data-bs-toggle="collapse"
          href="#collapseExample2"
          aria-expanded="true"
          aria-controls="collapseExample2"
        >
        <i class="fa-solid fa-book me-3"></i><span>Công thức</span>
        </a>

        <ul id="collapseExample2" class="collapse list-group list-group-flush">
          <li class="list-group-item py-1 ps-4">
            <a href="add_recipe.php" class="text-reset">Thêm mới</a>
          </li>
          <li class="list-group-item py-1 ps-4">
            <a href="view_recipes.php" class="text-reset">Xem thông tin</a>
          </li>
        </ul>

        <a
          class="list-group-item list-group-item-action py-2 ripple"
          aria-current="true"
          href="view_user.php"
          aria-expanded="true"
        >
        <i class="fa-solid fa-user me-3"></i><span>Người dùng</span>
        </a>


        <a
          class="list-group-item list-group-item-action py-2 ripple"
          aria-current="true"
          href="view_comment.php"
          aria-expanded="true"
        >
        <i class="fa-solid fa-comment me-3"></i><span>Bình luận</span>
        </a>


        <a
          class="list-group-item list-group-item-action py-2 ripple"
          aria-current="true"
          href="view_rating.php"
          aria-expanded="true"
        >
        <i class="fas fa-star me-3"></i>Đánh giá</span>
        </a>

      </div>
    </div>



  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">


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


      <a class="navbar-brand" href="index.php">
        <img
          src="/../img/logo.jpg"
          height="70"
          alt="Let me cook Logo"
          loading="lazy"
        />
      </a>



      <ul class="navbar-nav ms-auto d-flex flex-row">

        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <img
              src="https://img.freepik.com/premium-vector/male-avatar-icon-unknown-anonymous-person-default-avatar-profile-icon-social-media-user-business-man-man-profile-silhouette-isolated-white-background-vector-illustration_735449-122.jpg"
              class="rounded-circle"
              height="22"
              alt="Avatar"
              loading="lazy"
            />admin01
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
          </ul>
        </li>
      </ul>
    </div>

  </nav>
  <style>
    li:hover{
      background: #8CC7E9;
    }
  main{
    padding-left: 120px !important;
    padding-top: 100px;
  }
    body {
  background-color: #fbfbfb;
}
@media (min-width: 991.98px) {
  main {
    padding-left: 120px;
    padding-top: 100px;
  }
}


.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  padding: 70px 0 0; 
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
  width: 190px;
  z-index: 600;
}

@media (max-width: 991.98px) {
  .sidebar {
    width: 100%;
  }
}
.sidebar .active {
  border-radius: 5px;
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: 0.5rem;
  overflow-x: hidden;
  overflow-y: auto; 
}
 </style>
 <script>
    console.log(location.href);
 </script>
</header>




