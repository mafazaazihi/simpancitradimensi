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
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Spare part</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Request <?= notif($req); ?></button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-sm flex-column">
                                        <div class="text-end">
                                            <a class="btn btn-xs btn-secondary" data-bs-toggle="modal" data-bs-target="#newstockModal"><i class="typcn typcn-plus"></i></a>
                                        </div>
                                        <table class="table tabe-sm table-responsive font-size-sm" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Part number</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                    <th>Stock</th>
                                                    <th>Obsolete?</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($stock as $m): ?>
                                                    <tr id="<?= $m['Partid']; ?>">
                                                        <td><?= $m['Partid']; ?></td>
                                                        <td><?= $m['Partname']; ?></td>
                                                        <td><?= $m['Price']; ?></td>
                                                        <td><?= $m['Quantity']; ?></td>
                                                        <td class="text-center"><input class="form-check-input obsolete" type="checkbox" id="obsolete" <?= obsolte($m['Isobsolete']); ?> data-x="<?= $m['Partid']; ?>"></td>
                                                        <td>
                                                            <a href="" class="btn btn-xs btn-info typcn typcn-info-large" data-bs-toggle="modal" title="Details" data-bs-target="#detailpartModal"></a>
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
                                                    <th>Part number</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($req as $m): ?>
                                                    <tr id="<?= $m['Partusageid']; ?>">
                                                        <td><?= $m['Part_id']; ?></td>
                                                        <td><?= $m['Quantity']; ?></td>
                                                        <td>
                                                            <a href="" class="btn btn-xs btn-info typcn typcn-info-large" data-bs-toggle="modal" title="Details" data-bs-target="#requestModal"></a>
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
                    <div class="modal fade" id="detailpartModal" tabindex="-1" aria-labelledby="detailpartModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailpartModalLabel">Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('managements/workorder'); ?>" method="post">
                                    <div class="modal-body text-sm">
                                        <div class="text-end mb-2">
                                            <button type="button" class="btn btn-sm btn-secondary typcn typcn-edit" id="buttonedit" name="buttonedit" title="Edit details"></button>
                                        </div>
                                        <div class="form-floating form-floating-sm mb-2">
                                            <input type="text" class="form-control form-control-sm" id="partid" name="partid" required placeholder="name@example.com" readonly>
                                            <label for="partid">Part number</label>
                                        </div>
                                        <div class="form-floating form-floating-sm mb-2">
                                            <input type="text" class="form-control form-control-sm" id="partname" name="partname" required placeholder="name@example.com" readonly>
                                            <label for="partname">Description</label>
                                        </div>
                                        <div class="form-floating form-floating-sm mb-2">
                                            <input type="text" class="form-control form-control-sm" id="minqty" name="minqty" required placeholder="name@example.com" readonly>
                                            <label for="minqty">Min. qty</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <select class="form-select" id="addr" name="addr" aria-label="Floating label select example" disabled>
                                                <option></option>
                                                <?php foreach ($addr as $n): ?>
                                                    <option value="<?= $n['Addresid']; ?>"><?= $n['Addressname']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label for="addr">Select address</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <select class="form-select" id="supp" name="supp" aria-label="Floating label select example" disabled>
                                                <option></option>
                                                <?php foreach ($supp as $n): ?>
                                                    <option value="<?= $n['Supplierid']; ?>"><?= $n['Namesupplier']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label for="supp">Select supplier</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="newstockModal" tabindex="-1" aria-labelledby="newstockModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newstockModalLabel">Add new stock</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <?= form_open_multipart('managements/sparepart'); ?>
                                <div class="modal-body text-sm">
                                    <div class="text-end mb-2">
                                        <button type="button" class="btn btn-sm btn-secondary typcn typcn-edit" id="buttonedit" name="buttonedit" title="Edit details"></button>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="partidl" name="partidl" required placeholder="name@example.com" require>
                                        <label for="partidl">Par number</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="partname" name="partname" required placeholder="name@example.com" require>
                                        <label for="partname">Description</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <select class="form-select" id="supp" name="supp" aria-label="Floating label select example">
                                            <option></option>
                                            <?php foreach ($supp as $n): ?>
                                                <option value="<?= $n['Supplierid']; ?>"><?= $n['Namesupplier']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <label for="supp">Select supplier</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="opb" name="opb" min="0" require>
                                        <label for="opb">OPB number</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="number" class="form-control form-control-sm" step=".2" id="price" name="price" min="0" require>
                                        <label for="price">Price</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <select class="form-select" id="addr" name="addr" aria-label="Floating label select example">
                                            <option></option>
                                            <?php foreach ($addr as $n): ?>
                                                <option value="<?= $n['Addresid']; ?>"><?= $n['Addressname']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <label for="addr">Select address</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <select class="form-select" id="equip" name="equip" aria-label="Floating label select example">
                                            <option></option>
                                            <?php foreach ($equip as $n): ?>
                                                <option value="<?= $n['Equipmentid']; ?>"><?= $n['Equipmentname']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <label for="addr">Select equipment</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="number" class="form-control form-control-sm" step=".2" id="qtyl" name="qtyl" min="0" require>
                                        <label for="qtyl">Quantity</label>
                                    </div>
                                    <input type="number" name="currstkl" id="currstkl" class="form-control" hidden>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="number" class="form-control form-control-sm" id="minqtyl" name="minqtyl" min="0">
                                        <label for="minqtyl">Minimum qty</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" accept="image/*" id="image" name="image">
                                        <label class="input-group-text" for="image"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="requestModalLabel">Detail request</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body text-sm">
                                    <input type="text" class="form-group" id="usageid" name="usageid" hidden>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="rpartid" name="rpartid" required placeholder="name@example.com" require readonly>
                                        <label for="rpartid">Part number</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="rpartname" name="rpartname" required placeholder="name@example.com" require readonly>
                                        <label for="rpartname">Description</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="text" class="form-control form-control-sm" id="rrequest" name="rrequest" required placeholder="name@example.com" require readonly>
                                        <label for="rrequest">User</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <select class="form-select" id="raddr" name="raddr" aria-label="Floating label select example" disabled>
                                            <option></option>
                                            <?php foreach ($addr as $n): ?>
                                                <option value="<?= $n['Addresid']; ?>"><?= $n['Addressname']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <label for="addr">Select address</label>
                                    </div>
                                    <input type="text" id="total" name="total" class="form-control" hidden>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="number" class="form-control form-control-sm" step=".2" id="rqtyl" name="rqtyl" min="0" require readonly>
                                        <label for="rqtyl">Quantity</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="reject" name="reject" class="btn btn-sm btn-danger" title="reject"><i class="typcn typcn-times desktop-icon"></i></button>
                                    <button id="approve" name="approve" class="btn btn-sm btn-secondary" title="approve"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>