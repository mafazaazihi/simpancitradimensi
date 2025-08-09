<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Simpan | Report</title>
    <!-- base:css -->
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/src/'); ?>assets/css/style.css">
    <!-- datatablestyle -->
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('assets/vendor/src/'); ?>assets/images/favicon.ico" />
    <style>
        @media print {
            @page {
                size: landscape;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid" id="woreport">
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
                        <p><strong>Supervisor:</strong></p>
                    </div>
                    <div class="col">
                        <p><?= $task['AssignTo']; ?></p>
                        <p><?= $task['Supervisor']; ?></p>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <div class="panel panel-default">
                    <p><strong>#Work items:</strong> <?= $cat['Categoryname']; ?></p>
                    <hr>
                    <div class="panel-body mb-2">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td><strong>Item</strong></td>
                                        <td class="text-center"><strong>Recomended</strong></td>
                                        <td class="text-center"><strong>Part Recomended</strong></td>
                                        <td class="text-center"><strong>Actual</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($det as $c): ?>
                                        <tr>
                                            <td><?= $c['ChecklistName']; ?></td>
                                            <td class="text-center"><?= $c['Recomended']; ?></td>
                                            <td class="text-center"><?= $c['Partrecom']; ?></td>
                                            <td class="text-center"><?= $c['Actual']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p><strong>Notes: </strong><?= $task['Notes']; ?></p>
                    <hr>
                    <p><strong>#Parts</strong></p>
                    <div class="panel-body mb-2">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td><strong>Item</strong></td>
                                        <td class="text-center"><strong>Quantity</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usage as $c): ?>
                                        <tr>
                                            <td><?= $c['Part_id']; ?></td>
                                            <td class="text-center"><?= $c['Quantity']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php if ($task['Status'] == 3): ?>
                        <p><strong>Checked by.</strong></p>
                        <p><strong>Supervisor: </strong><?= getperson($task['Approval1']); ?> @ <?= $task['ApprovalDate2']; ?></p>
                        <p><strong>Manager: </strong><?= getperson($task['Approval2']); ?> @ <?= $task['ApprovalDate2']; ?></p>
                </div>
            <?php else: ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>