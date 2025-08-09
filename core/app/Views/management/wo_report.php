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
                    <div class="col-5 text-start">
                        <img src="<?= base_url('assets/vendor/src/'); ?>assets/images/sl.svg" alt="logo" height="50rem" width="50rem" />
                    </div>
                    <div class="invoice-title  col-7">
                        <h2>Work Order Report #<?= $task['Taskid']; ?></h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-2">
                        <p><strong>Location:</strong></p>
                        <p><strong>Sub location:</strong></p>
                        <p><strong>Equipment:</strong></p>
                        <p><strong>Period:</strong></p>
                    </div>
                    <div class="col-2">
                        <p><?= $equip['Equipmentname']; ?></p>
                        <p><?= $loc['Name']; ?></p>
                        <p><?= $subloc['Namesublocation']; ?></p>
                        <p><?= $period['Periodname']; ?></p>
                    </div>
                    <div class="col-2">
                        <p><strong>Start:</strong></p>
                        <p><strong>Finish:</strong></p>
                        <p><strong>Duration:</strong></p>
                    </div>
                    <div class="col-2">
                        <?php if ($task['NStart']): ?>
                            <p><?= $task['NStart']; ?>.</p>
                            <p><?= $task['NEnd']; ?>.</p>
                            <p><?= timedifern($task['NStart'], $task['NEnd']); ?>.</p>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-2">
                        <p><strong>Engineer:</strong></p>
                        <p><strong>Supervisor:</strong></p>
                        <p><strong>Tipe:</strong></p>
                    </div>
                    <div class="col-2">
                        <p><?= $task['AssignTo']; ?>.</p>
                        <p><?= $task['Supervisor']; ?>.</p>
                        <p><?= $cat['Categoryname']; ?>.</p>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Work items</h5>
                    </div>
                    <div class="panel-body">
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
                                    <?php foreach ($checklist as $c): ?>
                                        <tr>
                                            <td><?= $c['Name']; ?></td>
                                            <td class="text-center"><?= $c['Recomended']; ?></td>
                                            <td class="text-center"><?= $c['Partrecom']; ?></td>
                                            <td class="text-center"></td>
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
    <script>
        window.print();
    </script>
</body>

</html>