<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4"><?= $title; ?></h5>
                <?= session()->getFlashdata('message'); ?>
                <div class="card shadow">
                    <div class="card-body">
                        <table class="table sm font-size-sm" id="table1">
                            <thead>
                                <tr>
                                    <th>Menu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($menu as $m): ?>
                                    <tr id="<?= $m['Menuid']; ?>">
                                        <td><?= $m['Menuname']; ?></td>
                                        <td>
                                            <input class="form-check-input access" type="checkbox" id="checkboxNoLabel" <?= checkaccess($role['Roleid'], $m['Menuid']); ?> data-m="<?= uacmid($role['Roleid'], $m['Menuid']); ?>" data-x="<?= $role['Roleid']; ?>" data-y="<?= $m['Menuid']; ?>">
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