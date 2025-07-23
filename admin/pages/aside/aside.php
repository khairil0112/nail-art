<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="/nail-art/admin/pages/main/dashboard.php">
      <img src="../../assets/img/logo-ct-dark.png" width="26" height="26" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Nail-Art</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?php if ($current_page == 'dashboard.php') echo 'active'; ?>" href="/nail-art/admin/pages/main/dashboard.php">
          <div class="icon icon-shape icon-md text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12.5812 2.68627C12.2335 2.43791 11.7664 2.43791 11.4187 2.68627L1.9187 9.47198L3.08118 11.0994L11.9999 4.7289L20.9187 11.0994L22.0812 9.47198L12.5812 2.68627ZM19.5812 12.6863L12.5812 7.68627C12.2335 7.43791 11.7664 7.43791 11.4187 7.68627L4.4187 12.6863C4.15591 12.874 3.99994 13.177 3.99994 13.5V20C3.99994 20.5523 4.44765 21 4.99994 21H18.9999C19.5522 21 19.9999 20.5523 19.9999 20V13.5C19.9999 13.177 19.844 12.874 19.5812 12.6863Z"/>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($current_page == 'index.php' && strpos($_SERVER['REQUEST_URI'], '/user/') !== false) echo 'active'; ?>" href="/nail-art/admin/pages/user/index.php">
          <div class="icon icon-shape icon-md text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path d="M5 20H19V22H5V20ZM12 18C7.58172 18 4 14.4183 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 14.4183 16.4183 18 12 18ZM12 16C15.3137 16 18 13.3137 18 10C18 6.68629 15.3137 4 12 4C8.68629 4 6 6.68629 6 10C6 13.3137 8.68629 16 12 16Z"/>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Team</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($current_page == 'index.php' && strpos($_SERVER['REQUEST_URI'], '/product/') !== false) echo 'active'; ?>" href="/nail-art/admin/pages/product/index.php">
          <div class="icon icon-shape icon-md text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path d="M3 3H21V21H3V3Z" fill="none" stroke="currentColor" stroke-width="2"/>
              <path d="M3 9H21" stroke="currentColor" stroke-width="2"/>
              <path d="M9 21V9" stroke="currentColor" stroke-width="2"/>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Product</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($current_page == 'index.php' && strpos($_SERVER['REQUEST_URI'], '/contact/') !== false) echo 'active'; ?>" href="/nail-art/admin/pages/contact/index.php">
          <div class="icon icon-shape icon-md text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path d="M21 8V21H3V8" stroke="currentColor" stroke-width="2"/>
              <path d="M12 13L21 8" stroke="currentColor" stroke-width="2"/>
              <path d="M3 8L12 13" stroke="currentColor" stroke-width="2"/>
              <path d="M12 13V3" stroke="currentColor" stroke-width="2"/>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Contact</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if (($current_page == 'edit.php' || $current_page == 'index.php') && strpos($_SERVER['REQUEST_URI'], '/blog/') !== false) echo 'active'; ?>" href="/nail-art/admin/pages/blog/index.php">
          <div class="icon icon-shape icon-md text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path d="M4 4H20V20H4V4Z" stroke="currentColor" stroke-width="2"/>
              <path d="M4 9H20" stroke="currentColor" stroke-width="2"/>
              <path d="M9 20V9" stroke="currentColor" stroke-width="2"/>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Blog</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
