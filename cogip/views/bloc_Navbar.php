<div class="container-fluid">
  <div class="row">

    <nav class="navbar navbar-dark bg-dark col-12">

      <!-- Navbar brand + Navbar logo -->
      <a class="navbar-brand" href="index.php">
        <div class="navlogo d-flex justify-content-center">
          <img src="assets/img/logo.png" ><p>Cogip</p>
        </div>
      </a>
      
      <!-- Collapse button -->
      <button class="navbar-toggler col-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent15"
        aria-controls="navbarSupportedContent15" aria-expanded="false" aria-label="Toggle navigation"><span class="navigation navbar-toggler-icon"></span></button>

      <!-- Collapsible content -->
      <div class="collapse navbar-collapse offset-11 col-1" id="navbarSupportedContent15">

        <!-- Links -->
        <ul class="navbar-nav mr-auto d-flex justify-content-right">

          <!-- HOME -->
          <li class="nav-item">
            <a class="nav-link" href="index.php" rel="noreferrer">Home<i class="fa fa-home" aria-hidden="true"></i></a>
          </li>

          <!-- CONNEXION -->
          <li class="nav-item dropdown d-flex justify-content-end">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Connexion
            </a>
            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="page_Login.php">Login</a>
              <a class="dropdown-item" href="page_Logout.php">Logout</a>
            </div>
            <i class="nav-link fa fa-sign-in" aria-hidden="true"></i>
          </li>

          <!-- ADMIN -->
          <?php Admin_nav(); ?>
          
          <!-- COMPANIES -->
          <li class="nav-item">
            <a class="nav-link" href="page_Companies.php" rel="noreferrer">Companies<i class="fa fa-building-o" aria-hidden="true"></i></a>
          </li>

          <!-- INVOICES -->
          <li class="nav-item">
            <a class="nav-link" href="page_Invoices.php" rel="noreferrer">Invoices<i class="fa fa-file-text" aria-hidden="true"></i></a>
          </li>

          <!-- CONTACTS -->
          <li class="nav-item">
            <a class="nav-link" href="page_Contacts.php" rel="noreferrer">Contacts<i class="fa fa-address-book" aria-hidden="true"></i></a>
          </li>

        </ul>

      </div>
    </nav>

  </div>
</div>