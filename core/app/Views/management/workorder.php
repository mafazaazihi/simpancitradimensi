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
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Open</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">Approval <?= notif($pending); ?></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Closed</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-sm flex-column">
                                        <div class="text-end">
                                            <a class="btn btn-xs btn-secondary" data-bs-toggle="modal" data-bs-target="#newtaskModal"><i class="typcn typcn-plus"></i></a>
                                        </div>
                                        <table class="table tabe-sm table-responsive font-size-sm" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Equipment</th>
                                                    <th>Type</th>
                                                    <th>Date</th>
                                                    <th>Period</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($tasko as $m): ?>
                                                    <tr id="<?= $m['Taskid']; ?>">
                                                        <td><?= $m['Equipmentname']; ?></td>
                                                        <td><?= $m['Categoryname']; ?></td>
                                                        <td><?= $m['Duedate']; ?></td>
                                                        <td><?= $m['Periodname']; ?></td>
                                                        <td>
                                                            <a href="" class="btn btn-xs btn-info typcn typcn-info-large" data-bs-toggle="modal" title="Details" data-bs-target="#detailwoModal"></a>
                                                            <a href="<?= base_url('managements/woreport/') . $m['Taskid']; ?>" class="btn btn-xs btn-info typcn typcn-printer" title="Print" target="#blank"></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                <div class="row">
                                    <div class="col-sm flex-column">
                                        <div class="text-end">
                                            <a class="btn btn-xs btn-secondary" data-bs-toggle="modal" data-bs-target="#newtaskModal"><i class="typcn typcn-plus"></i></a>
                                        </div>
                                        <table class="table tabe-sm table-responsive font-size-sm" id="table3">
                                            <thead>
                                                <tr>
                                                    <th>Equipment</th>
                                                    <th>Type</th>
                                                    <th>Date</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pending as $m): ?>
                                                    <tr id="<?= $m['Taskid']; ?>">
                                                        <td><?= $m['Equipmentname']; ?></td>
                                                        <td><?= $m['Categoryname']; ?></td>
                                                        <td><?= dateonly($m['Duedate'], $m['Created']); ?></td>

                                                        <td>
                                                            <a href="<?= base_url('managements/approvewo/') . $m['Taskid']; ?>" class="btn btn-xs btn-success typcn typcn-thumbs-up" title="Approve work order" target="#blank"></a>
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
                                                    <th>Equipment</th>
                                                    <th>Type</th>
                                                    <th>Date</th>
                                                    <th>Period</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($taskc as $m): ?>
                                                    <tr id="<?= $m['Taskid']; ?>">
                                                        <td><?= $m['Equipmentname']; ?></td>
                                                        <td><?= $m['Categoryname']; ?></td>
                                                        <td><?= $m['Duedate']; ?></td>
                                                        <td><?= $m['Periodname']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('managements/woreport/') . $m['Taskid']; ?>" class="btn btn-xs btn-info typcn typcn-printer" title="Print" target="#blank"></a>
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
                    <div class="modal fade" id="newtaskModal" tabindex="-1" aria-labelledby="newtaskModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newtaskModalLabel">Add workorder</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('managements/workorder'); ?>" method="post">
                                    <div class="modal-body text-sm">
                                        <input type="text" id="typeid" name="typeid" hidden>
                                        <div class="form-floating form-floating-sm mb-2">
                                            <input type="text" class="form-control form-control-sm" id="equip" name="equip" required placeholder="name@example.com" require>
                                            <label for="equip">Serial Number</label>
                                        </div>
                                        <div class="mb-2" id="machine"></div>
                                        <div class="form-floating mb-2">
                                            <select class="form-select" id="ttype" name="ttype" aria-label="Floating label select example">
                                                <option></option>
                                                <?php foreach ($cat as $n): ?>
                                                    <option value="<?= $n['Maintcategoryid']; ?>"><?= $n['Categoryname']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label for="equip">Select ctaegory</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <select class="form-select" id="period" name="period" aria-label="Floating label select example">
                                                <option></option>
                                                <?php foreach ($period as $n): ?>
                                                    <option value="<?= $n['Periodid']; ?>"><?= $n['Periodname']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label for="equip">Select period</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <select class="form-select" id="checklist" name="checklist" aria-label="Floating label select example">

                                            </select>
                                            <label for="equip">Select checklist</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <select class="form-select" id="priority" name="priority" aria-label="Floating label select example">
                                                <option></option>
                                                <option value="1">High</option>
                                                <option value="2">Medium</option>
                                                <option value="3">low</option>
                                            </select>
                                            <label for="equip">Select priority</label>
                                        </div>
                                        <div class="form-floating form-floating-sm mb-2">
                                            <input type="text" class="form-control form-control-sm date" id="duedate" name="duedate" required placeholder="name@example.com" require>
                                            <label for="duedate">Work date</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="detailwoModal" tabindex="-1" aria-labelledby="detailwoModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailwoModalLabel">Details workorder</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('managements/workorder'); ?>" method="post">
                                    <div class="modal-body text-sm">
                                        <input type="text" id="etaskid" name="etaskid" hidden>
                                        <div class="form-floating form-floating-sm mb-2">
                                            <input type="text" class="form-control form-control-sm" id="eequip" name="eequip" required placeholder="name@example.com" require readonly>
                                            <label for="eequip">Serial Number</label>
                                        </div>
                                        <div class="mb-2" id="machine"></div>
                                        <div class="form-floating mb-2">
                                            <select class="form-select" id="eng" name="eng" aria-label="Floating label select example">
                                                <option></option>
                                                <?php foreach ($eng as $n): ?>
                                                    <option value="<?= $n['Userid']; ?>"><?= $n['Fullname']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label for="eng">Select Engineer</label>
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