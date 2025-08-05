<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4"><?= $title; ?></h5>
                <?= session()->getFlashdata('message'); ?>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm flex-column">
                                <div class="text-end">
                                    <a class="btn btn-xs btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="typcn typcn-plus"></i></a>
                                </div>
                                <table class="table tabe-sm font-size-sm" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $m): ?>
                                            <tr id="<?= $m['Userid']; ?>">
                                                <td><?= $m['Fullname']; ?></td>
                                                <td><?= $m['Rolename']; ?></td>
                                                <td>
                                                    <?php if ($m['Resetpass'] == 1): ?>
                                                        <a href="<?= base_url('admin/users/') . $m['Userid']; ?>" class="btn btn-xs btn-danger typcn typcn-trash" title="Delete"></a>
                                                        <a href="" class="btn btn-xs btn-warning typcn typcn-key" data-bs-toggle="modal" data-bs-target="#rpassModal" title="Request reset password active"></a>
                                                    <?php else: ?>
                                                        <a href="<?= base_url('admin/users/') . $m['Userid']; ?>" class="btn btn-xs btn-danger typcn typcn-trash" title="Delete"></a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('admin/users'); ?>" method="post">
                                <div class="modal-body text-sm">
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="userid" name="userid" required placeholder="name@example.com" require>
                                        <label for="userid">Userid</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="fullname" name="fullname" required placeholder="name@example.com" require>
                                        <label for="fullname">Full name</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="email" class="form-control form-control-sm" id="email" name="email" required placeholder="Password" require>
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <select class="form-select  form-control-lg mb-2" id="role" name="role" aria-label="form-select-sm example">
                                            <option></option>
                                            <?php foreach ($role as $n): ?>
                                                <option value="<?= $n['Roleid']; ?>"><?= $n['Rolename']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <label for="role">Select role</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="password" class="form-control form-control-sm" id="password" name="password" required placeholder="Password" require>
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="password" class="form-control form-control-sm" onkeyup="verifyPassword()" id="cpassword" name="cpassword" required placeholder="Password" require>
                                        <label for="cpassword">Confirm password</label>
                                    </div>
                                    <div class="text-sm">
                                        <div id="alert"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="rpassModal" tabindex="-1" aria-labelledby="rpassModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rpassModalLabel">Reset Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('admin/users'); ?>" method="post">
                                <div class="modal-body text-sm">
                                    <input type="text" class="form-control form-control-sm" id="ruserid" name="ruserid" required placeholder="name@example.com" hidden>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="password" class="form-control form-control-sm" id="rpassword" name="rpassword" required placeholder="rpassword" require>
                                        <label for="rpassword">Password</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="password" class="form-control form-control-sm" onkeyup="rverifyPassword()" id="rcpassword" name="rcpassword" required placeholder="Password" require>
                                        <label for="rcpassword">Confirm password</label>
                                    </div>
                                    <div class="text-sm">
                                        <div id="ralert"></div>
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