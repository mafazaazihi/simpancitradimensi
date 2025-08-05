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
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Equipment</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Sub location</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="location-tab" data-bs-toggle="tab" data-bs-target="#location" type="button" role="tab" aria-controls="location" aria-selected="false">Location</button>
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
                                                    <th>Serial Number</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($equip as $m): ?>
                                                    <tr id="<?= $m['Equipmentid']; ?>">
                                                        <td><?= $m['Equipmentname']; ?></td>
                                                        <td><?= $m['Serialnumber']; ?></td>
                                                        <td><a href="" class="btn btn-xs btn-info typcn typcn-info-large" data-bs-toggle="modal" title="Detail equipment" data-bs-target="#detaileqModal"></a></td>
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
                                            <a class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="typcn typcn-plus"></i></a>
                                        </div>
                                        <table class="table tabe-sm font-size-sm" id="table2">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($subloc as $m): ?>
                                                    <tr id="<?= $m['Sublocationid']; ?>">
                                                        <td><?= $m['Namesublocation']; ?></td>
                                                        <td><a href="" class="btn btn-xs btn-info typcn typcn-info-large" data-bs-toggle="modal" title="Detail sub location" data-bs-target="#editModal2"></a></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
                                <div class="row">
                                    <div class="col-sm flex-column">
                                        <div class="text-end">
                                            <a class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal3"><i class="typcn typcn-plus"></i></a>
                                        </div>
                                        <table class="table tabe-sm font-size-sm" id="table3">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($loc as $m): ?>
                                                    <tr id="<?= $m['Locationid']; ?>">
                                                        <td><?= $m['Name']; ?></td>
                                                        <td><a href="" class="btn btn-xs btn-info typcn typcn-info-large" data-bs-toggle="modal" title="Detail location" data-bs-target="#editModal2"></a></td>
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
                            <h5 class="modal-title" id="exampleModalLabel">Add equipment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('managements/equipment'); ?>" method="post">
                            <div class="modal-body">
                                <select class="form-select form-select-sm form-control mb-2" id="ssubloc" name="ssubloc" aria-label="form-select-sm example">
                                    <option class="form-control" selected>Open this select sub location</option>
                                    <?php foreach ($subloc as $n): ?>
                                        <option value="<?= $n['Sublocationid']; ?>"><?= $n['Namesublocation']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select class="form-select form-select-sm form-control mb-2" id="ssupl" name="ssupl" aria-label="form-select-sm example">
                                    <option class="form-control" selected>Open this select supplier</option>
                                    <?php foreach ($sup as $n): ?>
                                        <option value="<?= $n['Supplierid']; ?>"><?= $n['Namesupplier']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-floating form-floating-sm mb-3">
                                    <input type="text" class="form-control form-control-sm" id="serial" name="serial" required placeholder="name@example.com">
                                    <label for="serial">Machine srial number</label>
                                </div>
                                <div class="form-floating form-floating-sm mb-3">
                                    <input type="text" class="form-control form-control-sm" id="machine" name="machine" required placeholder="name@example.com">
                                    <label for="machine">Machine name</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="detaileqModal" tabindex="-1" aria-labelledby="detaileqModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detaileqModalLabel">Equipment detail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('managements/equipment'); ?>" method="post">
                            <div class="modal-body">
                                <div class="text-end mb-2">
                                    <button type="button" class="btn btn-sm btn-secondary typcn typcn-edit" id="buttonedit" name="buttonedit" title="Edit details"></button>
                                </div>
                                <input type="text" id="eequipmentid" name="eequipmentid" hidden>
                                <select class="form-select form-select-sm form-control mb-2" id="essubloc" name="essubloc" aria-label="form-select-sm example">
                                    <option class="form-control" selected>Open this select sub location</option>
                                    <?php foreach ($subloc as $n): ?>
                                        <option value="<?= $n['Sublocationid']; ?>"><?= $n['Namesublocation']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select class="form-select form-select-sm form-control mb-2" id="essupl" name="essupl" aria-label="form-select-sm example">
                                    <option class="form-control" selected>Open this select supplier</option>
                                    <?php foreach ($sup as $n): ?>
                                        <option value="<?= $n['Supplierid']; ?>"><?= $n['Namesupplier']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-floating form-floating-sm mb-3">
                                    <input type="text" class="form-control form-control-sm" id="eserial" name="eserial" required placeholder="name@example.com" readonly>
                                    <label for="eserial">Machine srial number</label>
                                </div>
                                <div class="form-floating form-floating-sm mb-3">
                                    <input type="text" class="form-control form-control-sm" id="emachine" name="emachine" required placeholder="name@example.com" readonly>
                                    <label for="emachine">Machine name</label>
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
                            <h5 class="modal-title" id="exampleModalLabel">Add sub location</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('managements/equipment'); ?>" method="post">
                            <div class="modal-body">
                                <select class="form-select form-select-sm form-control mb-2" id="slocname" name="slocname" aria-label="form-select-sm example">
                                    <option class="form-control" selected>Open this select location</option>
                                    <?php foreach ($loc as $n): ?>
                                        <option value="<?= $n['Locationid']; ?>"><?= $n['Name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-control-sm" id="subloc" name="subloc" required placeholder="name@example.com">
                                    <label for="subloc">Sub location</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">Add location</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('managements/equipment'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control form-control-sm" id="locname" name="locname" required placeholder="name@example.com">
                                    <label for="locname">Location</label>
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