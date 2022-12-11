<nav class="navbar navbar-expand-lg navbar-dark bg-danger ">
  <div class="container">
    <a class="navbar-brand" >Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php if($active === 'home'){ echo 'active'; } ?>" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($active === 'about'){ echo 'active'; } ?>" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($active === 'posts'){ echo 'active'; } ?>" href="/blog">Posts</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($active === 'categories'){ echo 'active'; } ?>" href="/categories">Categories</a>
        </li>
        {{-- $active merupakan variable active untuk  --}}
      </ul>
    </div>
  </div>
</nav>