<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4"><?= $title; ?></h5>
                <?= session()->getFlashdata('message'); ?>
                <div class="card shadow">
                    <?php if ($typ): ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm flex-column">
                                    <div class="text-end">
                                        <a class="btn btn-xs btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="typcn typcn-plus"></i></a>
                                    </div>
                                    <table class="table tabe-sm font-size-sm" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Items</th>
                                                <th>Recomended</th>
                                                <th>Part Recomended</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($check as $m): ?>
                                                <tr id="<?= $m['Checklistid']; ?>">
                                                    <td><?= $m['Name']; ?></td>
                                                    <td><?= $m['Recomended']; ?></td>
                                                    <td><?= $m['Partrecom']; ?></td>
                                                    <td><a href="" class="btn btn-xs btn-info typcn typcn-info-large" data-bs-toggle="modal" title="Details" data-bs-target="#detailitmModal"></a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <form action="<?= base_url('managements/addchecklist'); ?>" method="post" name="addcheck" id="myForm">
                            <div class="card-body">
                                <div class="text-end mb-2">
                                    <button type="submit" class="btn btn-sm btn-secondary" title="save"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                </div>
                                <input type="text" id="typeid" name="typeid" value="<?= $typ['Typeid']; ?>" hidden>
                                <div class="table-responsive-sm col-54">
                                    <table class="table table-sm text-nowrap" id="dynamic_field">
                                        <tr>
                                            <td><input class="form-control form-control-sm type=" text" name="check[]" class="input-text" id="check[]" placeholder="Enter Checklist"></td>
                                            <td><input class="form-control form-control-sm name=" recomended[]" class="input-text" id="recomended[]" placeholder="Enter recomended"></td>
                                            <td><input class="form-control form-control-sm name=" part[]" class="input-text" id="part[]" placeholder="Part recomended"></td>
                                            <td><button type="button" name="add" id="add" class="btn btn-success btn-sm" title="Add More">+</button></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add checklist</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('managements/addchecklist'); ?>" method="post">
                                <div class="modal-body text-sm">
                                    <input type="text" id="typeid" name="typeid" value="<?= $typ['Typeid']; ?>" hidden>
                                    <table class="table table-sm text-nowrap" id="dynamic_field">
                                        <tr>
                                            <td><input class="form-control form-control-sm" type="text" name="check[]" class="input-text" id="check[]" placeholder="Enter Checklist"></td>
                                            <td><input class="form-control form-control-sm" type="text" name="recomended[]" class="input-text" id="recomended[]" placeholder="Enter recomended"></td>
                                            <td><input class="form-control form-control-sm" type="text" name="part[]" class="input-text" id="part[]" placeholder="Part recomended"></td>
                                            <td><button type="button" name="add" id="add" class="btn btn-success btn-sm" title="Add More">+</button></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="detailitmModal" tabindex="-1" aria-labelledby="detailitmModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailitmModalLabel">Add checklist</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('managements/addchecklist'); ?>" method="post">
                                <div class="modal-body text-sm">
                                    <div class="text-end mb-2">
                                        <button type="button" class="btn btn-sm btn-secondary typcn typcn-edit" id="buttonedit" name="buttonedit" title="Edit details"></button>
                                    </div>
                                    <input type="text" id="etypeid" name="etypeid" value="<?= $typ['Typeid']; ?>" hidden>
                                    <input type="text" id="checkid" name="checkid" hidden>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="echeck" name="echeck" required placeholder="name@example.com" require readonly>
                                        <label for="echeck">Item</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="erecomended" name="erecomended" required placeholder="name@example.com" require readonly>
                                        <label for="erecomended">Recomendation</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="epartrecom" name="epartrecom" required placeholder="name@example.com" require readonly>
                                        <label for="epartrecom">Part Recomendation</label>
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