<nav class="navbar navbar-expand-lg navbar-dark bg-danger ">
  <div class="container">
    <a class="navbar-brand" >Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php if($title === 'Home'){ echo 'active'; } ?>" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($title === 'About'){ echo 'active'; } ?>" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($title === 'Posts'){ echo 'active'; } ?>" href="/blog">Posts</a>
        </li>
      </ul>
    </div>
  </div>
</nav>