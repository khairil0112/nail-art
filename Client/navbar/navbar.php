<div class="container-fluid">
  <div class="row py-3 border-bottom">

<!-- Pastikan Bootstrap sudah di-include -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Animasi Warna -->
<style>
  .nav-link {
    color: #333;
    transition: color 0.3s ease, background-color 0.3s ease, border-bottom 0.3s ease;
    padding: 6px 12px;
    border-radius: 5px;
    position: relative;
  }

  .nav-link:hover {
    color: #fff;
    background-color: #00d9ffff; /* Warna biru saat hover */
    text-decoration: none;
  }

  .nav-link.active {
    font-weight: bold;
    color: #007bff;
  }
</style>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm px-4">
  <div class="container-fluid">
    
    <!-- Logo kiri -->
    <a class="navbar-brand d-flex align-items-center" href="#home">
      <img src="../images/nail-art.png" alt="logo" style="width: 100px; height: auto;" class="me-2">
      <span style="font-weight: bold; font-size: 20px;"></span>
    </a>

    <!-- Toggle button (mobile) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu kanan -->
    <div class="collapse navbar-collapse justify-content-end" id="mainNav">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="../home/index.php#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../product/index.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../home/index.php#team">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../home/index.php#contact">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



  </div>
</div>

<!-- <div class="container-fluid">
  <div class="row py-3">
    <div class="d-flex  justify-content-center justify-content-sm-between align-items-center">
      <nav class="main-menu d-flex navbar navbar-expand-lg">

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

          <div class="offcanvas-header justify-content-center">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <div class="offcanvas-body">

            <select class="filter-categories border-0 mb-0 me-5">
              <option>Shop by Departments</option>
              <option>Groceries</option>
              <option>Drinks</option>
              <option>Chocolates</option>
            </select>

            <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
              <li class="nav-item active">
                <a href="#women" class="nav-link">Women</a>
              </li>
              <li class="nav-item dropdown">
                <a href="#men" class="nav-link">Men</a>
              </li>
              <li class="nav-item">
                <a href="#kids" class="nav-link">Kids</a>
              </li>
              <li class="nav-item">
                <a href="#accessories" class="nav-link">Accessories</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" id="pages" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                <ul class="dropdown-menu" aria-labelledby="pages">
                  <li><a href="index.html" class="dropdown-item">About Us </a></li>
                  <li><a href="index.html" class="dropdown-item">Shop </a></li>
                  <li><a href="index.html" class="dropdown-item">Single Product </a></li>
                  <li><a href="index.html" class="dropdown-item">Cart </a></li>
                  <li><a href="index.html" class="dropdown-item">Checkout </a></li>
                  <li><a href="index.html" class="dropdown-item">Blog </a></li>
                  <li><a href="index.html" class="dropdown-item">Single Post </a></li>
                  <li><a href="index.html" class="dropdown-item">Styles </a></li>
                  <li><a href="index.html" class="dropdown-item">Contact </a></li>
                  <li><a href="index.html" class="dropdown-item">Thank You </a></li>
                  <li><a href="index.html" class="dropdown-item">My Account </a></li>
                  <li><a href="index.html" class="dropdown-item">404 Error </a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#brand" class="nav-link">Brand</a>
              </li>
              <li class="nav-item">
                <a href="#sale" class="nav-link">Sale</a>
              </li>
              <li class="nav-item">
                <a href="#blog" class="nav-link">Blog</a>
              </li>
            </ul>

          </div>

        </div>
    </div>
  </div>
</div> -->