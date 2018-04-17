<template>
  <div class="sidebar">
    <div class="sidebar-title">
      Dashboard
    </div>
    <nav class="sidebar-nav">
      <ul class="nav">
        <li class="nav-item">
          <router-link :to="'/partner'" class="nav-link">Partner CRUD<span class="badge badge-info">NEW</span></router-link>
        </li>
        <li class="nav-item">
          <router-link :to="'/partnerfields'" class="nav-link">PartnerFields CRUD<span class="badge badge-info">NEW</span></router-link>
        </li>
        <li class="nav-item">
          <router-link :to="'/mapper/partner-picker'" class="nav-link">PartnerFieldTransforms CRUD<span class="badge badge-info">NEW</span></router-link>
        </li>
      </ul>
    </nav>
  </div>
</template>
<script>

export default {
  name: 'sidebar',
  methods: {
  }
}
</script>

<style lang="sass">
  .nav-link
    cursor:pointer
  .sidebar-title
    background: #33444c
    padding: 10px
    font-size: 17px
  .sidebar
    position: absolute
    width: 270px
    height: 100%
    background: #29363d
    color: #fff
  .nav > li > a:hover
    background: #20a8d8 !important
</style>