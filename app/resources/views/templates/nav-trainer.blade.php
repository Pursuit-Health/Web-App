<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Pursuit Health</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{route('profile')}}">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Clients</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 ml-auto">
      <input class="form-control mr-sm-2" type="search" placeholder="client name" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search for Client</button>
    </form>
  </div>
</nav>