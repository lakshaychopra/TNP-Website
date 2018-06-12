<template>
<div class="sidebar">
      <div class="sidebar-header">
        <img src="img/avatars/8.jpg" class="img-avatar" alt="Avatar">
        <div>
          <strong>JOHN DOE</strong>
        </div>
        <div class="text-muted">
          <small>Founder &amp; CEO</small>
        </div>
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
          <button type="button" class="btn btn-link">
            <i class="icon-settings"></i>
          </button>
          <button type="button" class="btn btn-link">
            <i class="icon-speech"></i>
          </button>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-user"></i>
            </button>
            <div class="dropdown-menu">
              <div class="dropdown-header text-center">
                <strong>Account</strong>
              </div>
              <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> Updates<span class="badge badge-info">42</span></a>
              <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Messages<span class="badge badge-success">42</span></a>
              <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> Tasks<span class="badge badge-danger">42</span></a>
              <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> Comments<span class="badge badge-warning">42</span></a>
              <div class="dropdown-header text-center">
                <strong>Settings</strong>
              </div>
              <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
              <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
              <a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="badge badge-secondary">42</span></a>
              <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Projects<span class="badge badge-primary">42</span></a>
              <div class="divider"></div>
              <a class="dropdown-item" href="#"><i class="fa fa-shield"></i> Lock Account</a>
              <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Logout</a>
            </div>
          </div>
        </div>
      </div>
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item open">
            <a class="nav-link active" href="main.html"><i class="icon-speedometer"></i> Dashboard <span class="badge badge-info">NEW</span></a>
          </li>

          <li class="divider"></li>
          <li class="nav-title">
            Theme
          </li>
          <li class="nav-item">
            <a href="colors.html" class="nav-link"><i class="icon-drop"></i> Colors</a>
          </li>
          <li class="nav-item">
            <a href="typography.html" class="nav-link"><i class="icon-pencil"></i> Typograhy</a>
          </li>
          <li class="nav-title">
            Components
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Base</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="base/breadcrumb.html"><i class="icon-puzzle"></i> Breadcrumb</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="base/cards.html"><i class="icon-puzzle"></i> Cards</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="base/carousel.html"><i class="icon-puzzle"></i> Carousel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="base/collapse.html"><i class="icon-puzzle"></i> Collapse</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="base/jumbotron.html"><i class="icon-puzzle"></i> Jumbotron</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="base/list-group.html"><i class="icon-puzzle"></i> List group</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="base/navs.html"><i class="icon-puzzle"></i> Navs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="base/pagination.html"><i class="icon-puzzle"></i> Pagination</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="base/popovers.html"><i class="icon-puzzle"></i> Popovers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="base/progress.html"><i class="icon-puzzle"></i> Progress</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="base/switches.html"><i class="icon-puzzle"></i> Switches</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="base/tabs.html"><i class="icon-puzzle"></i> Tabs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="base/tooltips.html"><i class="icon-puzzle"></i> Tooltips</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-cursor"></i> Buttons</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="buttons/buttons.html"><i class="icon-cursor"></i> Buttons</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="buttons/button-group.html"><i class="icon-cursor"></i> Buttons Group</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="buttons/dropdowns.html"><i class="icon-cursor"></i> Dropdowns</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="buttons/loading-buttons.html"><i class="icon-cursor"></i> Loading Buttons</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="buttons/social-buttons.html"><i class="icon-cursor"></i> Social Buttons</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="charts.html"><i class="icon-pie-chart"></i> Charts</a>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-code"></i> Editors</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="editors/code-editor.html"><i class="icon-note"></i> Code Editor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="editors/markdown-editor.html"><i class="fa fa-code"></i> Markdown Editor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="editors/text-editors.html"><i class="icon-note"></i> Rich Text Editor</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-note"></i> Forms</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="forms/basic-forms.html"><i class="icon-note"></i> Basic Forms</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="forms/advanced-forms.html"><i class="icon-note"></i> Advanced Forms</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="forms/validation.html"><i class="icon-note"></i> Validation</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="google-maps.html"><i class="icon-map"></i> Google Maps <span class="badge badge-info">NEW</span></a>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Icons</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="icons/flags.html"><i class="icon-star"></i> Flags <span class="badge badge-success">NEW</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="icons/font-awesome.html"><i class="icon-star"></i> Font Awesome <span class="badge badge-secondary">4.7</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="icons/simple-line-icons.html"><i class="icon-star"></i> Simple Line Icons</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bell"></i> Notifications</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="notifications/alerts.html"><i class="icon-bell"></i> Alerts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="notifications/badge.html"><i class="icon-bell"></i> Badge</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="notifications/modals.html"><i class="icon-bell"></i> Modals</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="notifications/toastr.html"><i class="icon-bell"></i> Toastr</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-energy"></i> Plugins</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="plugins/calendar.html"><i class="icon-calendar"></i> Calendar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="plugins/draggable-cards.html"><i class="icon-cursor-move"></i> Draggable Cards</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="plugins/sliders.html"><i class="icon-equalizer"></i> Sliders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="plugins/spinners.html"><i class="fa fa-spinner"></i> Spinners</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-list"></i> Tables</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="tables/tables.html"><i class="icon-list"></i> Standard Tables</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tables/datatables.html"><i class="icon-list"></i> DataTables</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="widgets.html"><i class="icon-calculator"></i> Widgets <span class="badge badge-info">NEW</span></a>
          </li>
          <li class="divider"></li>
          <li class="nav-title">
            Extras
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Pages</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="views/pages/login.html" target="_top"><i class="icon-star"></i> Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="views/pages/register.html" target="_top"><i class="icon-star"></i> Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="views/pages/404.html" target="_top"><i class="icon-star"></i> Error 404</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="views/pages/500.html" target="_top"><i class="icon-star"></i> Error 500</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-layers"></i> UI Kits</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-speech"></i> Invoicing</a>
                <ul class="nav-dropdown-items">
                  <li class="nav-item">
                    <a class="nav-link" href="UIkits/invoicing/invoice.html"><i class="icon-speech"></i> Invoice</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-speech"></i> Email</a>
                <ul class="nav-dropdown-items">
                  <li class="nav-item">
                    <a class="nav-link" href="UIkits/email/inbox.html"><i class="icon-speech"></i> Inbox</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="UIkits/email/message.html"><i class="icon-speech"></i> Message</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="UIkits/email/compose.html"><i class="icon-speech"></i> Compose</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="divider m-2"></li>
          <li class="nav-title">
            Labels
          </li>
          <li class="nav-item hidden-cn">
            <a class="nav-label" href="#"><i class="fa fa-circle text-danger"></i> Label danger</a>
          </li>
          <li class="nav-item hidden-cn">
            <a class="nav-label" href="#"><i class="fa fa-circle text-info"></i> Label info</a>
          </li>
          <li class="nav-item hidden-cn">
            <a class="nav-label" href="#"><i class="fa fa-circle text-warning"></i> Label warning</a>
          </li>
          <li class="divider"></li>
          <li class="nav-title">
            System Utilization
          </li>
          <li class="nav-item px-3 hidden-cn">
            <div class="text-uppercase mb-1">
              <small><b>CPU Usage</b></small>
            </div>
            <div class="progress progress-xs">
              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <small class="text-muted">348 Processes. 1/4 Cores.</small>
          </li>
          <li class="nav-item px-3 hidden-cn">
            <div class="text-uppercase mb-1">
              <small><b>Memory Usage</b></small>
            </div>
            <div class="progress progress-xs">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <small class="text-muted">11444GB/16384MB</small>
          </li>
          <li class="nav-item px-3 hidden-cn">
            <div class="text-uppercase mb-1">
              <small><b>SSD 1 Usage</b></small>
            </div>
            <div class="progress progress-xs">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <small class="text-muted">243GB/256GB</small>
          </li>

        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
