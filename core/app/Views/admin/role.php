<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4"><?= $title; ?></h5>
                <?= session()->getFlashdata('message'); ?>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="col-sm flex-column">
                            <div class="text-end">
                                <a class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="typcn typcn-plus"></i></a>
                            </div>
                            <table class="table tabe-sm font-size-sm" id="table1">
                                <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th>Default page</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($role as $m): ?>
                                        <tr id="<?= $m['Roleid']; ?>">
                                            <td><?= $m['Rolename']; ?></td>
                                            <td><?= $m['Defaultpage']; ?></td>
                                            <td class="icon">
                                                <?= editbutton('#roleeditModal'); ?>
                                                <a href="<?= base_url('admin/role/') . $m['Roleid']; ?>" title="Access" class="btn btn-xs btn-warning typcn typcn-lock-open-outline"></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add role</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('admin/role'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-floating form-floating-sm mb-3">
                                        <input type="text" class="form-control form-control-sm" id="role" name="role" required placeholder="name@example.com">
                                        <label for="role">Role</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-sm" id="defpage" name="defpage" required placeholder="Password">
                                        <label for="defpage">Default Page</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="roleeditModal" tabindex="-1" aria-labelledby="roleeditModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="roleeditModalLabel">Edit sub menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('admin/role'); ?>" method="post">
                                <div class="modal-body">
                                    <input type="text" class="form-control" id="roleid" name="roleid" hidden required placeholder="name@example.com">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="erole" name="erole" required placeholder="name@example.com">
                                        <label for="erole">Role</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="edefpage" name="edefpage" required placeholder="name@example.com">
                                        <label for="edefpage">Default page</label>
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
</div>