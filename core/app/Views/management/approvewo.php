<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4"><?= $title; ?></h5>
                <?= session()->getFlashdata('message'); ?>
                <div class="card shadow">
                    <div class="card-body">
                        <input type="text" id="woapprove" value="<?= $task['Taskid']; ?>" hidden>
                        <div class="row">
                            <div class="col-lg">
                                <div class="row">
                                    <div class="col-4 text-start">
                                        <img src="<?= base_url('assets/vendor/src/'); ?>assets/images/sl.svg" alt="logo" height="50rem" width="50rem" />
                                    </div>
                                    <div class="invoice-title  col-8">
                                        <h2>Work Order Report #<?= $task['Taskid']; ?></h2>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <p><strong>Location:</strong></p>
                                        <p><strong>Sub location:</strong></p>
                                        <p><strong>Equipment:</strong></p>
                                        <p><strong>Period:</strong></p>
                                    </div>
                                    <div class="col-3">
                                        <p><?= $equip['Equipmentname']; ?></p>
                                        <p><?= $loc['Name']; ?></p>
                                        <p><?= $subloc['Namesublocation']; ?></p>
                                        <p><?= $period['Periodname']; ?></p>
                                    </div>
                                    <div class="col">
                                        <p><strong>Date:</strong></p>
                                        <p><strong>Start:</strong></p>
                                        <p><strong>Finish:</strong></p>
                                        <p><strong>Duration:</strong></p>
                                    </div>
                                    <div class="col">
                                        <?php if ($task['NStart']): ?>
                                            <p><?= dateonly($task['NStart']); ?></p>
                                            <p><?= startdate($task['NStart']); ?></p>
                                            <p><?= startdate($task['NEnd']); ?></p>
                                            <p><?= timedifern($task['NStart'], $task['NEnd']); ?></p>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col">
                                        <p><strong>Engineer:</strong></p>
                                    </div>
                                    <div class="col">
                                        <p><?= $task['AssignTo']; ?></p>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="panel panel-default">
                                    <div class="row">
                                        <div class="panel-heading col-auto">
                                            <h4 class="panel-title">Work items: </h4>
                                        </div>
                                        <div class="col-auto">
                                            <p><?= $cat['Categoryname']; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="panel-body mb-2">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <td><strong>Item</strong></td>
                                                        <td class="text-center"><strong>Recomended</strong></td>
                                                        <td class="text-center"><strong>Actual</strong></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($det as $c): ?>
                                                        <tr>
                                                            <td><?= $c['ChecklistName']; ?></td>
                                                            <td class="text-center"><?= $c['Recomended']; ?></td>
                                                            <td class="text-center"><?= $c['Actual']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <p><strong>Notes: </strong><?= $task['Notes']; ?></p>
                                    <hr>
                                    <?php if ($task['Status'] == 1 and $role['Rolename'] == 'Supervisor'): ?>
                                        <div class="row">
                                            <div class="col text-start">
                                                <a class="btn btn-sm btn-info typcn typcn-printer" id="printwo" title="Print report" target="#blank" href="<?= base_url('managements/woreport/') . $task['Taskid']; ?>"></a>
                                            </div>
                                            <div class="col text-end">
                                                <button class="btn btn-sm btn-primary typcn typcn-thumbs-up" id="approvewo" title="Approve"></button>
                                            </div>
                                        </div>
                                    <?php elseif ($task['Status'] == 2 and $role['Rolename'] == 'Manager'): ?>
                                        <div class="row">
                                            <div class="col text-start">
                                                <a class="btn btn-sm btn-info typcn typcn-printer" id="printwo" title="Print report" target="#blank" href="<?= base_url('managements/woreport/') . $task['Taskid']; ?>"></a>
                                            </div>
                                            <div class="col text-end">
                                                <button class="btn btn-sm btn-primary typcn typcn-thumbs-up" id="approvewo" title="Approve"></button>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="row">
                                            <div class="col text-start">
                                                <a class="btn btn-sm btn-info typcn typcn-printer" id="printwo" title="Print report" target="#blank" href="<?= base_url('managements/woreport/') . $task['Taskid']; ?>"></a>
                                            </div>
                                            <div class="col text-end">

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>