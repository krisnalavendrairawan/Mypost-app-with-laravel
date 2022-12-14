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

      
      
      
      <ul class="navbar-nav ms-auto">
        @auth

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>

            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item">
                <i class="bi bi-box-arrow-right"></i> Logout</a>
              </button>
            </form>

          </ul>

        </li>
        @else 

        <li><a href="/login" class="nav-link <?php if($active === 'login'){ echo 'active'; } ?>"><i class="bi bi-box-arrow-in-right"></i>
          Login</a></li>

      </ul>
      @endauth
      
    </div>
  </div>
</nav>