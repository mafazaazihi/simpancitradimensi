<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4"><?= $title; ?></h5>
                <?= session()->getFlashdata('message'); ?>
                <div class="card shadow">
                    <div class="card-body text-xs">
                        <div class="mb-2">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Menu</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Sub menu</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-sm flex-column">
                                        <div class="text-end">
                                            <a class="btn btn-xs btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="typcn typcn-plus"></i></a>
                                        </div>
                                        <table class="table tabe-sm font-size-sm" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Icon</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($menu as $m): ?>
                                                    <tr id="<?= $m['Menuid']; ?>">
                                                        <td><?= $m['Menuname']; ?></td>
                                                        <td><i class="typcn <?= $m['Icon']; ?> icon-desktop"></i></td>
                                                        <td>
                                                            <?= editbutton('#editModal'); ?>
                                                            <?= deletebutton(current_url() . '/' . $m['Menuid']); ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-sm flex-column">
                                        <div class="text-end">
                                            <a class="btn btn-xs btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="typcn typcn-plus"></i></a>
                                        </div>
                                        <table class="table tabe-sm font-size-sm" id="table2">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Menu</th>
                                                    <th>Url</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($submenu as $m): ?>
                                                    <tr id="<?= $m['Submenuid']; ?>">
                                                        <td><?= $m['Tittle']; ?></td>
                                                        <td><?= $m['Menuname']; ?></td>
                                                        <td><?= $m['Url']; ?></td>
                                                        <td>
                                                            <?= editbutton('#editModal2'); ?>
                                                            <?= deletebutton(current_url() . '/submenu/' . $m['Submenuid']); ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('admin/menu'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-floating form-floating-sm mb-3">
                                    <input type="text" class="form-control form-control-sm" id="menuname" name="menuname" required placeholder="name@example.com">
                                    <label for="menuname">Menu</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-sm" id="icon" name="icon" required placeholder="Password">
                                    <label for="icon">Icon</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add sub menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('admin/submenu'); ?>" method="post">
                            <div class="modal-body">
                                <select class="form-select form-select-sm form-control mb-2" id="menu" name="menu" aria-label="form-select-sm example">
                                    <option class="form-control" selected>Open this select menu</option>
                                    <?php foreach ($menu as $n): ?>
                                        <option value="<?= $n['Menuid']; ?>"><?= $n['Menuname']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-control-sm" id="submenu" name="submenu" required placeholder="name@example.com">
                                    <label for="submenu">Sub menu</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-sm" id="url" name="url" required placeholder="Password">
                                    <label for="url">Url</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('admin/menu'); ?>" method="post">
                            <div class="modal-body">
                                <input type="text" class="form-control" id="menuid" name="menuid" required hidden placeholder="name@example.com">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="emenuname" name="emenuname" required placeholder="name@example.com">
                                    <label for="emenuname">Menu</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="editModal2Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModal2Label">Edit sub menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('admin/submenu'); ?>" method="post">
                            <div class="modal-body">
                                <input type="text" class="form-control" id="submenuid" name="submenuid" hidden required placeholder="name@example.com">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="esubmenu" name="esubmenu" required placeholder="name@example.com">
                                    <label for="esubmenu">Submenu</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="eurl" name="eurl" required placeholder="name@example.com">
                                    <label for="eurl">Url</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>