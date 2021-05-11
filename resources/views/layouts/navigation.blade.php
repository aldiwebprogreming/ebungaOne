<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <a class="navbar-brand" href="#">ebunga</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Shop</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Abaout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <div class="dropdown">
      <a type="button" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
       <i class="fas fa-shopping-bag ml-4" style="font-size: 30px; color: green;"></i>
       <sup style="font-weight: bold; font-size: 20px;">@yield('shop')</sup>
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

        
      </div>
    </div>

  <!--   <a type="button" id="dropdownMenuButton">
    <i class="fas fa-shopping-bag ml-4" style="font-size: 30px; color: green;"></i>
    </a> -->
    
  </div>
  </div>
</nav>