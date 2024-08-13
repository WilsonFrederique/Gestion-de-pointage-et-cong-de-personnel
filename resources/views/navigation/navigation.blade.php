
<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
    <div class="container">
      <a class="navbar-brand text-white" href="#">GESTION DE POINTAGE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.employes.index') }}">Employes</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.pointages.index') }}">Pointage</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.conges.index') }}">Coge</a>
          </li>

      </div>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Recherche..." aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
      </form>
    </div>
  </nav>
