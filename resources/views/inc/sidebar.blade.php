<div class="card">
  <ul class="collection">
    <li class="collection-item avatar">
      <a href="#" class="button-collapse tooltipped" data-activates="slide-out" data-position="right" data-delay="50" data-tooltip="Menu"><i class="material-icons circle grey">menu</i></a>
    </li>
    <li class="collection-item avatar">
      <a href="/shared" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Documentos Compartidos"><i class="material-icons circle purple lighten-1">share</i></a>
    </li>
    <li class="collection-item avatar">
      <a href="/documents" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Documentos"><i class="material-icons circle blue darken-1">folder</i></a>
    </li>
    <li class="collection-item avatar">
      <a href="/categories" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Categorías"><i class="material-icons circle brown">class</i></a>
    </li>
    @hasanyrole('Root|Admin')
    <li class="collection-item avatar">
      <a href="/users" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Usuarios"><i class="material-icons circle green">person</i></a>
    </li>
    @hasrole('Root')
    <li class="collection-item avatar">
      <a href="/departments" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Áreas"><i class="material-icons circle red darken-1">group</i></a>
    </li>
    <li class="collection-item avatar">
      <a href="/roles" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Roles &amp; Permisos"><i class="material-icons circle cyan darken-1">assignment_ind</i></a>
    </li>
    <!-- <li class="collection-item avatar">
      <a href="/backup" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Backup Manager"><i class="material-icons circle indigo assent-1">backup</i></a>
    </li> -->
    <li class="collection-item avatar">
      <a href="/logs" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Logs"><i class="material-icons circle orange">view_list</i></a>
    </li>
    @endhasrole
    @endhasanyrole
    @hasanyrole('Admin|User')
    <li class="collection-item avatar">
      <a href="/mydocuments" class="tooltipped" data-position="right" data-delay="50" data-tooltip="My Documents"><i class="material-icons circle pink darken-1">folder_shared</i></a>
    </li>
    @endhasanyrole
  </ul>
</div>
<!-- ======================================================================= -->
<ul id="slide-out" class="side-nav">
  <li><div class="user-view">
    <div class="background">
      <img src="/storage/images/ytu.jpg" width="100%">
    </div>
  </div></li>
  <li><a href="/shared"><i class="material-icons">share</i>Documentos compartidos</a></li>
  <li><a href="/documents"><i class="material-icons">folder</i>Documentos</a></li>
  <li><a href="/categories"><i class="material-icons">class</i>Categorías</a></li>
  @hasanyrole('Root|Admin')
  <li><a href="/users"><i class="material-icons">person</i>Usuarios</a></li>
  @hasrole('Root')
  <li><a href="/departments"><i class="material-icons">group</i>Áreas</a></li>
  <li><div class="divider"></div></li>
  <li><a href="/roles"><i class="material-icons">assignment_ind</i>Roles &amp; Permisos</a></li>
  <!-- <li><a href="/backup"><i class="material-icons">backup</i>Backup Manager</a></li> -->
  <li><a href="/logs"><i class="material-icons">view_list</i>Logs</a></li>
  @endhasrole
  @endhasanyrole
  @hasanyrole('Admin|User')
  <li>
    <a href="/mydocuments"><i class="material-icons">folder_shared</i>Mis documentos</a>
  </li>
  @endhasanyrole
</ul>
