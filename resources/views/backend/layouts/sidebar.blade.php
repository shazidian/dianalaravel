<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed " href="index.html">
          <i class="bi bi-menu-button-wide"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Riwayat Hidup</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('pendidikan') }}">
              <i class="bi bi-circle"></i><span>Pendidikan</span>
            </a>
          </li>
          <li>
            <a href="{{ url('pengalaman_kerja') }}">
              <i class="bi bi-circle"></i><span>Pengalaman Kerja</span>
            </a>
          </li>
          <li>
        </ul>
      </li><!-- End Forms Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  {{-- <aside>
    <div id="sidebar" class="nav-collase">
        <ul class="sidebar-menu">
            <li class="active">
            <a class="" href="index.html">
                <i class="icon_house_alt"></i>
                <span>Dashboard</span>
            </a>

            </li>
            <li>
                <a class="" href="index.html">
                    <i class="icon_profile"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Riwayat Hidup</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class=""></a></li>
                    <li></li>
                </ul>
            </li>
        </ul>
    </div>
  </aside> --}}
