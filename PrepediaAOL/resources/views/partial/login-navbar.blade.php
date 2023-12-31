<nav class="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="/logo3.PNG" alt="Bootstrap" width="150" height="44">
          </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            @auth
            <li class="nav-item d-flex">
                <img src="/profile-picture.jpeg" alt="" width="110" height="110">
                <h1 class="mt-4">{{ auth()->user()->name }}</h1>
            </li>
            @endauth
            <li class="nav-item">
              <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="dropdown-item">
                <i>Logout</i>
              </button>
            </form>
            </li>
            @if(Auth::guard('admin')->check())
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                  </a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/meals/add-meal-id">Add Meal</a></li>
                      <li><a class="dropdown-item" href="/meals/create">Add Meal Set</a></li>
                      <li><a class="dropdown-item" href="/admin/assign-mealplan">Assign mealplan to customer</a></li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="/view-user">View User</a></li>
                  </ul>
              </li>
          @endif
          </ul>
          <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>
  </nav>