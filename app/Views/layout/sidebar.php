<div class="sidebar" data-color="rose" data-background-color="black" data-image="<?= base_url() ?>/assets/img/sidebar-1.jpg">
  <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
  <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-mini">
      JL
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      Jakarta Lumber
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item <?= session('page') === 'dashboard' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url(route_to('dashboard')) ?>">
          <i class="material-icons">dashboard</i>
          <p> Dashboard </p>
        </a>
      </li>
      <li class="nav-item <?= session('page') === 'barang' ? 'active' : ''; ?>">
        <a class="nav-link <?= session('page') === 'barang' ? '' : 'collapsed'; ?>" data-toggle="collapse" href="#pagesExamples" aria-expanded="<?= session('page') === 'barang' ? 'true' : 'false'; ?>">
          <i class="material-icons">carpenter</i>
          <p> Material
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse <?= session('page') === 'barang' ? 'show' : ''; ?>" id="pagesExamples">
          <ul class="nav">
            <li class="nav-item <?= session('section') === 'show_barang' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?= base_url(route_to('dashboard/barang')) ?>">
                <span class="sidebar-mini"><i class="material-icons">list</i></span>
                <span class="sidebar-normal"> List Barang </span>
              </a>
            </li>
            <li class="nav-item <?= session('section') === 'create_barang' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?= base_url(route_to('dashboard/barang/create')) ?>">
                <span class="sidebar-mini"><i class="material-icons">add</i></span>
                <span class="sidebar-normal"> Tambah Barang </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item <?= session('page') === 'penjualan' ? 'active' : ''; ?> ">
        <a class="nav-link <?= session('page') === 'penjualan' ? '' : 'collapsed'; ?>" data-toggle="collapse" href="#componentsExamples" aria-expanded="<?= session('page') === 'penjualan' ? 'true' : 'false'; ?>">
          <i class="material-icons">receipt_long</i>
          <p> Penjualan
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse <?= session('page') === 'penjualan' ? 'show' : ''; ?>" id="componentsExamples">
          <ul class="nav">
            <li class="nav-item <?= session('section') === 'show_penjualan' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?= base_url(route_to('dashboard/penjualan')) ?>">
                <span class="sidebar-mini"><i class="material-icons">list</i></span>
                <span class="sidebar-normal"> List Penjualan </span>
              </a>
            </li>
            <li class="nav-item <?= session('section') === 'create_penjualan' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?= base_url(route_to('dashboard/penjualan/create')) ?>">
                <span class="sidebar-mini"><i class="material-icons">add</i></span>
                <span class="sidebar-normal"> Tambah Penjualan </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item <?= session('page') === 'profile' ? 'active' : ''; ?>">
        <a class="nav-link <?= session('page') === 'profile' ? '' : 'collapsed'; ?>" data-toggle="collapse" href="#formsExamples" aria-expanded="<?= session('page') === 'profile' ? 'true' : 'false'; ?>">
          <i class="material-icons">person</i>
          <p> User
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse <?= session('page') === 'profile' ? 'show' : ''; ?>" id="formsExamples">
          <ul class="nav">
            <li class="nav-item <?= session('section') === 'show_profile' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?= base_url(route_to('dashboard/profile')) ?>">
                <span class="sidebar-mini"><i class="material-icons">portrait</i></span>
                <span class="sidebar-normal"> My Profile </span>
              </a>
            </li>
            <li class="nav-item <?= session('section') === 'create_profile' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?= base_url(route_to('dashboard/profile/create')) ?>">
                <span class="sidebar-mini"><i class="material-icons">add</i></span>
                <span class="sidebar-normal"> Create Profile </span>
              </a>
            </li>
            <li class="nav-item <?= session('section') === 'edit_profile' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?= base_url(route_to('dashboard/profile/edit')) ?>">
                <span class="sidebar-mini"><i class="material-icons">content_cut</i></span>
                <span class="sidebar-normal"> Edit Profile </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url(route_to('logout')) ?>">
          <i class="material-icons">exit_to_app</i>
          <p> Logout </p>
        </a>
      </li>
    </ul>
  </div>
</div>