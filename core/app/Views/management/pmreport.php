<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4"><?= $title; ?></h5>
                <?= session()->getFlashdata('message'); ?>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Spare part#
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form action="<?= base_url('task/'); ?>" method="post">
                                            <div class="row mb-2">
                                                <input type="text" id="taskid" name="taskid" value="<?= $id; ?>" hidden>
                                                <input type="number" id="stockaf" name="stockaf" min="0" hidden>
                                                <input type="text" id="getpn" name="getpn" hidden>
                                                <div class="col mb-2">
                                                    <div class="form-floating form-floating-sm">
                                                        <input type="text" class="form-control form-control-sm" id="partnu" name="partnu" required placeholder="name@example.com" require>
                                                        <label for="partnu">Part Number</label>
                                                    </div>
                                                    <div id="pnumber"></div>
                                                </div>
                                                <div class="col mb-2">
                                                    <div class="form-floating form-floating-sm">
                                                        <input type="text" class="form-control form-control-sm" id="desc" name="desc" required placeholder="name@example.com" readonly>
                                                        <label for="desc">Description</label>
                                                    </div>
                                                </div>
                                                <div class="col mb-2">
                                                    <div class="form-floating form-floating-sm">
                                                        <input type="number" class="form-control form-control-sm" id="qty" name="qty" min="0" required placeholder="name@example.com" require>
                                                        <label for="qty">Quantity</label>
                                                    </div>
                                                </div>
                                                <div class="col mb-2">
                                                    <div class="form-floating form-floating-sm">
                                                        <input type="number" class="form-control form-control-sm" id="stock" name="stock" required placeholder="name@example.com" readonly>
                                                        <label for="stock">Stock</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                        </form>
                                        <hr>
                                        <table class="table tabe-sm table-responsive font-size-sm" id="parttable">
                                            <thead>
                                                <tr>
                                                    <th>Partid</th>
                                                    <th>Desc.</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($usage as $s): ?>
                                                    <tr>
                                                        <td><?= $s['Part_id']; ?></td>
                                                        <td><?= $s['Partname']; ?></td>
                                                        <td><?= $s['Qty']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Checklist#
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="input-group input-group-sm clockpicker col-md">
                                                <span class="input-group-text" id="basic-addon1">Start</span>
                                                <input type="time" class="form-control" id="start" min="00:00" max="23:59">
                                            </div>
                                            <div class="input-group input-group-sm end col-md">
                                                <span class="input-group-text" id="basic-addon1">Finish</span>
                                                <input type="time" class="form-control" id="end" min="00:00" max="23:59">
                                            </div>
                                            <div class="input-group input-group-sm col-md">
                                                <select class="form-select form-select-sm engpm" id="engpm" aria-label="Small select example">
                                                    <option selected>Select Engineer</option>
                                                    <?php foreach ($eng as $s): ?>
                                                        <option value="<?= $s['Userid']; ?>"><?= $s['Fullname']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </div>
                                            <div class="input-group input-group-sm col-md ">
                                                <select class="form-select form-select-sm spvpm" id="spvpm" aria-label="Small select example">
                                                    <option selected>Select supervisor</option>
                                                    <?php foreach ($spv as $s): ?>
                                                        <option value="<?= $s['Userid']; ?>"><?= $s['Fullname']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <table class="table table-sm" id="tbl">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">Taskid</th>
                                                    <th>Checklist Item</th>
                                                    <th>Actual</th>
                                                    <th>Recomended</th>
                                                    <th>Part recomended</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($check as $t) : ?>
                                                    <tr class="entrytable">
                                                        <td style="display: none;"><?= $id; ?></td>
                                                        <td><?= $t['Name']; ?></td>
                                                        <td><input type="text" class="form-control mb-6 form-control-user" style="height: 25px;" id="actual" size="4"></td>
                                                        <td><?= $t['Recomended']; ?></td>
                                                        <td><?= $t['Partrecom']; ?></td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Notes / Comment:</label>
                                            <textarea class="form-control" id="note" rows="3"></textarea>
                                        </div>
                                        <div class="text-end">
                                            <button class="btn btn-sm btn-secondary typcn typcn-input-checked" id="save" title="save"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>