<template>
  <aside class="left-sidebar">
    <div class="scroll-sidebar">
      <div class="user-profile">
        <div class="profile-img">
          <img src="/images/user.jpg" alt="user" /> </div>
        <div class="profile-text">
          <a href="javascript:void(0)">{{getAuthUserFullName()}}</a>
        </div>
      </div>
      <nav class="sidebar-nav">
        <ul id="sidebarnav">
          <li>
            <router-link to="/home" exact>
              <i class="fa fa-home fa-fw" aria-hidden="true"></i>
              <span class="hide-menu">Home</span>
            </router-link>
          </li>
           <li class="dropdown">
            <a href="javascript:void(0)" data-toggle="dropdown">
              <i class="fa fa-file fa-fw" aria-hidden="true"></i>
              <span class="hide-menu">Filter
                <i class="fa fa-caret-down fa-fw" aria-hidden="true"></i>
              </span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li>
                <router-link to="/exec/filter" exact>
                  <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Filter
                </router-link>
              </li>
            </ul>
          </li>
        
          <li class="dropdown">
            <a href="javascript:void(0)" data-toggle="dropdown">
              <i class="fa fa-file fa-fw" aria-hidden="true"></i>
              <span class="hide-menu">Pages
                <i class="fa fa-caret-down fa-fw" aria-hidden="true"></i>
              </span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li class="dropdown-header">
                <strong>
                  <i class="fa fa-list fa-fw" aria-hidden="true"></i> Pages Menu
                </strong>
              </li>
              <li>
                <router-link to="/exec/about/form" exact>
                  <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Add Page
                </router-link>
              </li>
              <!-- <li>
                <router-link to="/exec/about/manage" exact>
                  <i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Manage Pages
                </router-link>
              </li> -->
            </ul>
          </li>
          <li class="dropdown">
            <a href="javascript:void(0)" data-toggle="dropdown">
              <i class="fa fa-file fa-fw" aria-hidden="true"></i>
              <span class="hide-menu">Post
                <i class="fa fa-caret-down fa-fw" aria-hidden="true"></i>
              </span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li class="dropdown-header">
                <strong>
                  <i class="fa fa-list fa-fw" aria-hidden="true"></i> Post Menu
                </strong>
              </li>
              <li>
                <router-link to="/exec/post" exact>
                  <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Add Posts
                </router-link>
              </li>
              <li>
                <router-link to="/exec/all" exact>
                  <i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Manage Posts
                </router-link>
              </li>
              <li>
                <router-link to="/exec/post/pinned" exact>
                  <i class="fa fa-thumb-tack fa-fw" aria-hidden="true"></i> Pinned Posts
                </router-link>
              </li>
            </ul>
          </li>
          <li>
            <router-link to="/exec/notice" exact>
              <i class="fa fa-file-word-o fa-fw" aria-hidden="true"></i>
              <span class="hide-menu">Notice Maker</span>
            </router-link>
          </li>
        </ul>
      </nav>
    </div>
    <div class="sidebar-footer">
      <router-link to="#" class="link" data-toggle="tooltip" title="Configuration">
        <i class="fa fa-cogs" aria-hidden="true"></i>
      </router-link>
      <router-link to="#" class="link" data-toggle="tooltip" title="Profile">
        <i class="fa fa-user" aria-hidden="true"></i>
      </router-link>
      <a href="/logout" class="link" data-toggle="tooltip" title="Logout" @click.prevent="logout">
        <i class="fa fa-power-off" aria-hidden="true"></i>
      </a>
    </div>
  </aside>
</template>

<script>
  import helper from '../../services/helper'

  export default {
    mounted() {},
    methods: {
      logout() {
        helper.logout().then(() => {
          this.$store.dispatch('resetAuthUserDetail');
          this.$router.replace('/login')
        })
      },
      getAuthUserFullName() {
        return this.$store.getters.getAuthUserFullName;
      },
      getAuthUser(name) {
        return this.$store.getters.getAuthUser(name);
      }
    },
  }

</script>
