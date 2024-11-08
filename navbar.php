<nav class="navbar navbar-expand-lg navbar-dark shadow-lg p-3 mb-5">
  <a class="navbar-brand" href="index.php">
    <h2>Awaaz of Devbhoomi
    </h2>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <donation_form class="navbar-nav">

      <!-- Dropdown for login options -->
      <li class="nav-item dropdown">
        <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Login Here
        </a> -->
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <h4>Home</h4>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="donation_form.html">
          <h4>Donation</h4>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="gallery.php">
          <h4>Gallery</h4>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="about.php">
          <h4>About</h4>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="contact.php">
          <h4>Contact Us</h4>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="mun.php">
          <h4>MUN</h4>
        </a>
      </li>
  </div>
</nav>


<style>
/* Customize the navbar appearance */
.navbar-brand {
  color: rgb(161, 201, 201);
  padding: 10px;
  transition: 0.3s;
  font-weight: bold;
  font-size: 1.25rem;
}

.navbar-nav {
  font-size: 1.0rem;
}

.navbar {
  background: linear-gradient(90deg, #3A1C71 0%, #FDBB2D 100%);
}

/* Make navbar links more spaced and readable */
.navbar-nav .nav-item .nav-link {
  color: white;
  padding: 10px;
  text-align: center;
  font-size: 1rem;
}

.navbar-nav .nav-item .nav-link:hover {
  color: #000;
}

/* Add media query for responsiveness */
@media (max-width: 767px) {
  .navbar-nav {
    text-align: center;
  }
  .navbar-nav .nav-link {
    padding: 15px;
  }
  .navbar-toggler {
    border: none;
  }
}

</style>