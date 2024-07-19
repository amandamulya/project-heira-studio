<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md fixed-top bg-success text-white" style="background:#399C8D">
    <div class="container">
      <a class="navbar-brand text-white" href="#">Heira Studio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0 text-danger">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/aboutus">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/category">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/member/testimoni">Testimoni</a>
          </li>
          @if(!empty(Auth::user()->email))
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user"></i> My Account - Hi, {{Auth::user()->nama}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{url('member/profil')}}">Profil</a></li>
              <li><a class="dropdown-item" href="{{url('memberpesanan')}}">Pesanan Saya</a></li>
              
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{url('memberlogout')}}">Logout</a></li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link text-white" href="/loginmember"><i class="fa fa-lock"></i> Login</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
</header>