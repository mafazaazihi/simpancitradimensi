<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <?php
    $db = \Config\Database::connect();
    $roleid = session()->get('roleid');
    $sql = 'select um.Menuid,um.Menuname,um.Icon from usermenu um inner join useraccessmenu ua on um.Menuid=ua.Menu_id where ua.Role_id=?';
    $menu = $db->query($sql, $roleid)->getResultArray();
    $sg = request()->getUri()->getSegment(1);
    ?>
    <?php foreach ($menu as $m): ?>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#<?= $m['Menuname']; ?>" aria-expanded="<?= ($sg == $m['Menuname']) ? 'true' : 'false'; ?>" aria-controls="<?= $m['Menuname']; ?>">
          <i class="typcn <?= $m['Icon']; ?> menu-icon"></i>
          <span class="menu-title"><?= $m['Menuname']; ?></span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse <?= ($sg == $m['Menuname']) ? 'show' : ''; ?>" id="<?= $m['Menuname']; ?>">
          <ul class="nav flex-column sub-menu">
            <?php
            $db = \Config\Database::connect();
            $sql = 'select *from submenu where Menu_id=?';
            $sub = $db->query($sql, $m['Menuid'])->getResultArray();
            ?>
            <?php foreach ($sub as $s): ?>
              <li class="nav-item"> <a class="nav-link" href="<?= base_url() . $s['Url']; ?>"><?= $s['Tittle']; ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>