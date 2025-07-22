<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <?php
        $requestUri = $_SERVER['REQUEST_URI'];
        // Extract the path relative to /admin/pages/
        $path = parse_url($requestUri, PHP_URL_PATH);
        $pathParts = explode('/', trim($path, '/'));
        $pagesIndex = array_search('pages', $pathParts);
        $relativePath = '';
        if ($pagesIndex !== false && isset($pathParts[$pagesIndex + 1])) {
            $relativePath = implode('/', array_slice($pathParts, $pagesIndex + 1));
        }

        $pageTitles = [
            'contact/index.php' => ['breadcrumb' => 'Contact', 'title' => 'Contact Index'],
            'blog/index.php' => ['breadcrumb' => 'blog', 'title' => 'blog Index'],
            'user/index.php' => ['breadcrumb' => 'User', 'title' => 'User Index'],
            'auth/login.php' => ['breadcrumb' => 'Auth', 'title' => 'Login'],
            'auth/register.php' => ['breadcrumb' => 'Auth', 'title' => 'Register'],
            'user/create.php' => ['breadcrumb' => 'User', 'title' => 'Create User'],
            'product/update.php' => ['breadcrumb' => 'Product', 'title' => 'Update Product'],
            // Add more mappings as needed
        ];

        $breadcrumb = 'Pages';
        $title = 'Index';
        if (isset($pageTitles[$relativePath])) {
            $breadcrumb = $pageTitles[$relativePath]['breadcrumb'];
            $title = $pageTitles[$relativePath]['title'];
        }
        ?>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;"><?= htmlspecialchars($breadcrumb) ?></a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page"><?= htmlspecialchars($title) ?></li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0"><?= htmlspecialchars($title) ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <?php
              if (session_status() === PHP_SESSION_NONE) {
                  session_start();
              }
              if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                  echo '<a href="../auth/logout.php">Logout</a>';
              } else {
                  echo '<a href="../auth/login.php">Login</a>';
              }
              ?>
            </div>
          </div>

        </div>
      </div>
    </nav>