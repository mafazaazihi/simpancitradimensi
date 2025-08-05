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
                                            <th>Supplier</th>
                                            <th>Pic</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sup as $m): ?>
                                            <tr id="<?= $m['Supplierid']; ?>">
                                                <td><?= $m['Namesupplier']; ?></td>
                                                <td><?= $m['Pic']; ?></td>
                                                <td>
                                                    <a href="" class="btn btn-xs btn-success typcn typcn-edit" data-bs-toggle="modal" title="Edit supplier" data-bs-target="#editsupModal"></a>
                                                    <a href="" class="btn btn-xs btn-info typcn typcn-info-large sup" data-x="<?= $m['Supplierid']; ?>" data-bs-toggle="modal" data-bs-target="#supdetailModal" title="Details supplier"></a>
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
                                <h5 class="modal-title" id="exampleModalLabel">Add supplier</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('managements/supplier'); ?>" method="post">
                                <div class="modal-body text-sm">
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="supname" name="supname" required placeholder="name@example.com" require>
                                        <label for="supname">Supplier Name</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="addr" name="addr" required placeholder="name@example.com" require>
                                        <label for="addr">Address</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="pic" name="pic" required placeholder="name@example.com" require>
                                        <label for="pic">PIC</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="email" class="form-control form-control-sm" id="email" name="email" required placeholder="Password" require>
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="phone" name="phone" required placeholder="name@example.com" require>
                                        <label for="phone">Telephone</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="fax" name="fax" required placeholder="name@example.com" require>
                                        <label for="fax">Fax</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editsupModal" tabindex="-1" aria-labelledby="editsupModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editsupModalLabel">Edit supplier</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('managements/supplier'); ?>" method="post">
                                <div class="modal-body text-sm">
                                    <input type="text" id="esupid" name="esupid" hidden>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="esupname" name="esupname" required placeholder="name@example.com" require>
                                        <label for="esupname">Supplier Name</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="eaddr" name="eaddr" required placeholder="name@example.com" require>
                                        <label for="eaddr">Address</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="epic" name="epic" required placeholder="name@example.com" require>
                                        <label for="epic">PIC</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="email" class="form-control form-control-sm" id="eemail" name="eemail" required placeholder="Password" require>
                                        <label for="eemail">Email</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="ephone" name="ephone" required placeholder="name@example.com" require>
                                        <label for="ephone">Telephone</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="efax" name="efax" required placeholder="name@example.com" require>
                                        <label for="efax">Fax</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="supdetailModal" tabindex="-1" aria-labelledby="supdetailModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="supdetailModalLabel">Supplier detail</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-sm">
                                <div class="form-floating form-floating-sm mb-2">
                                    <input type="text" class="form-control form-control-sm" id="nsup" name="nsup" required placeholder="nsup" readonly>
                                    <label for="nsup">Supplier Name</label>
                                </div>
                                <div class="form-floating form-floating-sm mb-2">
                                    <input type="text" class="form-control form-control-sm" id="naddr" name="naddr" required placeholder="naddr" readonly>
                                    <label for="naddr">Address</label>
                                </div>
                                <div class="form-floating form-floating-sm mb-2">
                                    <input type="text" class="form-control form-control-sm" id="npic" name="npic" required placeholder="npic" readonly>
                                    <label for="npic">Pic</label>
                                </div>
                                <div class="form-floating form-floating-sm mb-2">
                                    <input type="text" class="form-control form-control-sm" id="nphone" name="nphone" required placeholder="nphone" readonly>
                                    <label for="nphone">Telephone</label>
                                </div>
                                <div class="form-floating form-floating-sm mb-2">
                                    <input type="text" class="form-control form-control-sm" id="nfax" name="nfax" required placeholder="nfax" readonly>
                                    <label for="nfax">Fax</label>
                                </div>
                                <div class="form-floating form-floating-sm mb-2">
                                    <input type="text" class="form-control form-control-sm" id="nmail" name="nmail" required placeholder="nmail" readonly>
                                    <label for="nmail">Email</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>