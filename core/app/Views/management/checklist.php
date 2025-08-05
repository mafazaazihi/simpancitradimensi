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
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">PM check list</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">PM Period</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-sm flex-column">
                                        <div class="text-end">
                                            <a class="btn btn-xs btn-secondary" data-bs-toggle="modal" data-bs-target="#cheklistnewModal"><i class="typcn typcn-plus"></i></a>
                                        </div>
                                        <table class="table tabe-sm font-size-sm" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($typ as $m): ?>
                                                    <tr id="<?= $m['Typeid']; ?>">
                                                        <td><?= $m['Typename']; ?></td>
                                                        <td>
                                                            <a href="" class="btn btn-xs btn-info typcn typcn-info-large" data-bs-toggle="modal" title="Detail checklist" data-bs-target="#detailcheckModal"></a>
                                                            <a href="<?= base_url('managements/checklist/') . $m['Typeid']; ?>" class="btn btn-xs btn-warning typcn typcn-document-text" title="Checklist items"></a>
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
                                            <a class="btn btn-xs btn-secondary" data-bs-toggle="modal" data-bs-target="#periodModal"><i class="typcn typcn-plus"></i></a>
                                        </div>
                                        <table class="table tabe-sm font-size-sm" id="table2">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Days</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($period as $m): ?>
                                                    <tr id="<?= $m['Periodid']; ?>">
                                                        <td><?= $m['Periodname']; ?></td>
                                                        <td><?= $m['Days']; ?></td>
                                                        <td><a href="" class="btn btn-xs btn-info typcn typcn-info-large" data-bs-toggle="modal" title="Details" data-bs-target="#perioddtModal"></a></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="cheklistnewModal" tabindex="-1" aria-labelledby="cheklistnewModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="cheklistnewModalLabel">Add checklist</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('managements/checklist'); ?>" method="post">
                                    <div class="modal-body text-sm">
                                        <div class="form-floating form-floating-sm mb-2">
                                            <input type="text" class="form-control form-control-sm" id="checklist" name="checklist" required placeholder="name@example.com" require>
                                            <label for="checklist">Checklist Name</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <select class="form-select" id="equip" name="equip" aria-label="Floating label select example">
                                                <option selected></option>
                                                <?php foreach ($equip as $n): ?>
                                                    <option value="<?= $n['Equipmentid']; ?>"><?= $n['Equipmentname']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label for="equip">Select equipment</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <select class="form-select" id="period" name="period" aria-label="Floating label select example">
                                                <option selected></option>
                                                <?php foreach ($period as $n): ?>
                                                    <option value="<?= $n['Periodid']; ?>"><?= $n['Periodname']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label for="period">Select PM period</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="detailcheckModal" tabindex="-1" aria-labelledby="detailcheckModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailcheckModalLabel">Details checklist</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('managements/checklist'); ?>" method="post">
                                    <div class="modal-body text-sm">
                                        <div class="text-end mb-2">
                                            <button type="button" class="btn btn-sm btn-secondary typcn typcn-edit" id="buttonedit" name="buttonedit" title="Edit details"></button>
                                        </div>
                                        <input type="text" id="typeid" name="typeid" hidden>
                                        <div class="form-floating form-floating-sm mb-2">
                                            <input type="text" class="form-control form-control-sm" id="echecklist" name="echecklist" required placeholder="name@example.com" require readonly>
                                            <label for="echecklist">Checklist Name</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <select class="form-select" id="eequip" name="eequip" aria-label="Floating label select example">
                                                <option selected></option>
                                                <?php foreach ($equip as $n): ?>
                                                    <option value="<?= $n['Equipmentid']; ?>"><?= $n['Equipmentname']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label for="eequip">Select equipment</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <select class="form-select" id="eperiod" name="eperiod" aria-label="Floating label select example">
                                                <option selected></option>
                                                <?php foreach ($period as $n): ?>
                                                    <option value="<?= $n['Periodid']; ?>"><?= $n['Periodname']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label for="eperiod">Select PM period</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="periodModal" tabindex="-1" aria-labelledby="periodModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="periodModalLabel">Add PM period</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('managements/checklist'); ?>" method="post">
                                    <div class="modal-body text-sm">
                                        <input type="text" id="" name="" hidden>
                                        <div class="form-floating form-floating-sm mb-2">
                                            <input type="text" class="form-control form-control-sm" id="periodname" name="periodname" required placeholder="name@example.com" require>
                                            <label for="periodname">Period Name</label>
                                        </div>
                                        <div class="form-floating form-floating-sm mb-2">
                                            <input type="number" min="0" class="form-control form-control-sm" id="days" name="days" required placeholder="name@example.com" require>
                                            <label for="days">Days</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="perioddtModal" tabindex="-1" aria-labelledby="perioddtModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="perioddtModalLabel">Detail PM period</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('managements/checklist'); ?>" method="post">
                                    <div class="modal-body text-sm">
                                        <div class="text-end mb-2">
                                            <button type="button" class="btn btn-sm btn-secondary typcn typcn-edit" id="buttonedit2" name="buttonedit2" title="Edit details"></button>
                                        </div>
                                        <input type="text" id="periodid" name="periodid" hidden>
                                        <div class="form-floating form-floating-sm mb-2">
                                            <input type="text" class="form-control form-control-sm" id="eperiodname" name="eperiodname" required placeholder="name@example.com" require readonly>
                                            <label for="eperiodname">Period Name</label>
                                        </div>
                                        <div class="form-floating form-floating-sm mb-2">
                                            <input type="number" min="0" class="form-control form-control-sm" id="edays" name="edays" required placeholder="name@example.com" require readonly>
                                            <label for="edays">Days</label>
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
</div>