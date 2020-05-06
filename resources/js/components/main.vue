<template>
  <div>
    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
      <a class="navbar-brand d-none d-sm-block" href="index.html">SB Admin Pro</a>
      <button
        class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2"
        id="sidebarToggle"
        href="#"
      >
        <i data-feather="menu"></i>
      </button>
      <form class="form-inline mr-auto d-none d-lg-block">
        <input
          class="form-control form-control-solid mr-sm-2"
          type="search"
          placeholder="Search"
          aria-label="Search"
        />
      </form>
      <ul class="navbar-nav align-items-center ml-auto">
        <li class="nav-item dropdown no-caret mr-3 dropdown-user">
          <a
            class="btn btn-icon btn-transparent-dark dropdown-toggle"
            id="navbarDropdownUserImage"
            href="javascript:void(0);"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <img class="img-fluid" src="https://source.unsplash.com/QAB-WJcbgJk/60x60" />
          </a>
          <div
            class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
            aria-labelledby="navbarDropdownUserImage"
          >
            <h6 class="dropdown-header d-flex align-items-center">
              <img class="dropdown-user-img" src="https://source.unsplash.com/QAB-WJcbgJk/60x60" />
              <div class="dropdown-user-details">
                <div class="dropdown-user-details-name">Valerie Luna</div>
                <div class="dropdown-user-details-email">vluna@aol.com</div>
              </div>
            </h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#!">
              <div class="dropdown-item-icon">
                <i data-feather="settings"></i>
              </div>Account
            </a>
            <a class="dropdown-item" href="#!">
              <div class="dropdown-item-icon">
                <i data-feather="log-out"></i>
              </div>Logout
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
          <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
              <div class="sidenav-menu-heading">Core</div>

              <router-link to="/dashboard" class="nav-link">
              <div class="nav-link-icon">
                  <i data-feather="activity"></i>
                </div>Dashboards
              </router-link>

              <router-link to="/tag" class="nav-link">
              <div class="nav-link-icon">
                  <i data-feather="activity"></i>
                </div>Tag
              </router-link>
              <div class="sidenav-menu-heading">Interface</div>
              <a
                class="nav-link collapsed"
                href="javascript:void(0);"
                data-toggle="collapse"
                data-target="#collapseLayouts"
                aria-expanded="false"
                aria-controls="collapseLayouts"
              >
                <div class="nav-link-icon">
                  <i data-feather="layout"></i>
                </div>Layout
                <div class="sidenav-collapse-arrow">
                  <i class="fas fa-angle-down"></i>
                </div>
              </a>
              <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                  <a class="nav-link" href="layout-static.html">Static Navigation</a>
                  <a class="nav-link" href="layout-dark.html">Dark Sidenav</a>
                  <a class="nav-link" href="layout-rtl.html">RTL Layout</a>
                  <a
                    class="nav-link collapsed"
                    href="#"
                    data-toggle="collapse"
                    data-target="#collapseLayoutsPageHeaders"
                    aria-expanded="false"
                    aria-controls="collapseLayoutsPageHeaders"
                  >
                    Page Headers
                    <div class="sidenav-collapse-arrow">
                      <i class="fas fa-angle-down"></i>
                    </div>
                  </a>
                  <div
                    class="collapse"
                    id="collapseLayoutsPageHeaders"
                    data-parent="#accordionSidenavLayout"
                  >
                    <nav class="sidenav-menu-nested nav">
                      <a class="nav-link" href="header-simplified.html">Simplified</a>
                      <a class="nav-link" href="header-overlap.html">Content Overlap</a>
                      <a class="nav-link" href="header-breadcrumbs.html">Breadcrumbs</a>
                      <a class="nav-link" href="header-light.html">Light</a>
                    </nav>
                  </div>
                </nav>
              </div>
            </div>
          </div>
          <div class="sidenav-footer">
            <div class="sidenav-footer-content">
              <div class="sidenav-footer-subtitle">Logged in as:</div>
              <div class="sidenav-footer-title">Valerie Luna</div>
            </div>
          </div>
        </nav>
      </div>
      <div id="layoutSidenav_content">
        <main>
          <router-view></router-view>
        </main>
        <footer class="footer mt-auto footer-light">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 small">Copyright &#xA9; Your Website 2020</div>
              <div class="col-md-6 text-md-right small">
                <a href="#!">Privacy Policy</a>
                &#xB7;
                <a href="#!">Terms &amp; Conditions</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
</template>
<script>
export default {

}
</script>
