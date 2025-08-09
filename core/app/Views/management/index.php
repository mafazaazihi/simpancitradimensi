<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4"><?= $title; ?></h5>
                <?= session()->getFlashdata('message'); ?>
                <div class="row">
                    <div class="col-sm-6 grid-margin stretch-card flex-column">
                        <h5 class="mb-2 text-titlecase mb-4">PM statistics</h5>
                        <div class="row">
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <p class="mb-0 text-muted">Scheduled</p>
                                        </div>
                                        <h6><?= count($sch); ?></h6>
                                        <i class="text-center text-info fa fa-calendar fa-5x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div>
                                                <p class="mb-2 text-muted">Pending Approval</p>
                                                <h6 class="mb-0"><?= count($pend); ?></h6>
                                            </div>
                                        </div>
                                        <i class="text-center text-warning fa fa-pencil-square-o fa-5x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row h-100">
                            <div class="col-md-6 stretch-card grid-margin grid-margin-md-0">
                                <div class="card">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <p class="text-muted">Completed</p>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-"><?= count($close); ?></h6>
                                        </div>
                                        <i class="text-center text-success fa fa-calendar-check-o fa-5x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 stretch-card grid-margin grid-margin-md-0">
                                <div class="card">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <p class="text-muted">Inprogress</p>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-"><?= count($inpro); ?></h6>
                                        </div>
                                        <i class="text-center text-danger fa fa-hourglass-start fa-5x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 grid-margin stretch-card flex-column">
                        <h5 class="mb-2 text-titlecase mb-4">Calendar</h5>
                        <div class="row h-100">
                            <div class="col-md-12 stretch-card">
                                <div class="card">
                                    <div class="card-body text-sm">
                                        <style>
                                            .fc .fc-toolbar-title {
                                                font-size: .8em;
                                                margin: 0px;
                                            }

                                            .fc .fc-button {
                                                border: 1px solid transparent;
                                                border-radius: 0.25em;
                                                display: inline-block;
                                                font-size: .7em;
                                                font-weight: 400;
                                                line-height: 1.5;
                                                padding: 0.4em 0.65em;
                                                text-align: center;
                                                user-select: none;
                                                vertical-align: middle;
                                            }
                                        </style>
                                        <div id="pmcalendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h5 class="mb-2 text-titlecase mb-4">PM backlog</h5>
                    <div class="col-xl-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-2 mb-md-0 text-uppercase fw-medium">Overall PM</h6>
                                    <div class="dropdown">
                                        <button class="btn bg-white p-0 pb-1 text-muted btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Annual
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                                            <a class="dropdown-item" href="<?= base_url('managements/lsw'); ?>">Last week</a>
                                            <a class="dropdown-item" href="<?= base_url('managements/tsw'); ?>">This week</a>
                                            <a class="dropdown-item" href="<?= base_url('managements/tsm'); ?>">This month</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="daoughnut-chart-sm">
                                    <canvas id="sales-chart-x" class="mt-2"></canvas>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3 mt-4">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <p class="text-muted">Open</p>
                                        <h5><?= count($scho); ?></h5>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-info mb-0"><?= round((count($scho) / (count($scho) + count($close) + count($backlog))) * 100); ?>%</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <p class="text-muted">Closed</p>
                                        <h5><?= count($close); ?></h5>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-success mb-0"><?= round((count($close) / (count($scho) + count($close) + count($backlog))) * 100); ?>%</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <p class="text-muted">Backlog</p>
                                        <h5><?= count($backlog); ?></h5>
                                        <div class="d-flex align-items-baseline">
                                            <p class="text-danger mb-0"><?= round((count($backlog) / (count($scho) + count($close) + count($backlog))) * 100); ?>%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md stretch-card grid-margin grid-margin-md-0">
                        <div class="card">
                            <style>
                                .form-control-sm {
                                    min-height: 1rem;
                                    padding: 0.1rem 0.1rem;
                                    font-size: 0.875rem;
                                    border-radius: var(--bs-border-radius-sm);
                                }

                                div.dtsb-searchBuilder button.dtsb-button,
                                div.dtsb-searchBuilder select {
                                    font-size: 0.7em;
                                }

                                .btn,
                                .ajax-upload-dragdrop .ajax-file-upload {
                                    font-size: 0.875rem;
                                    line-height: 0.1;
                                    font-weight: 400;
                                }

                                div.dtsb-searchBuilder div.dtsb-group div.dtsb-criteria select.dtsb-dropDown,
                                div.dtsb-searchBuilder div.dtsb-group div.dtsb-criteria input.dtsb-input {
                                    padding: 0.1em;
                                    margin-right: 0.8em;
                                    min-width: 5em;
                                    max-width: 20em;
                                    color: inherit;
                                    font-size: 0.8em;
                                }
                            </style>
                            <div class="card-body">
                                <table class="table table-sm table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Equipment</th>
                                            <th>Type</th>
                                            <th>Date</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($backlog as $m): ?>
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
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('pmcalendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                center: 'dayGridMonth,timeGridWeek,timeGridDay',
            },
            initialView: 'dayGridMonth',
            events: [<?php $i = 1; ?>
                <?php foreach ($sch as $p) : ?> {
                        id: '<?= $p['Taskid']; ?>',
                        title: '<i class="fa fa-thumb-tack" title="<?= 'PM' . ' ' . $p['Equipmentname'] . ' ' . $p['Periodname']; ?>"> <?= 'PM' . ' ' . $p['Equipmentname'] . ' ' . $p['Periodname']; ?></i>',
                        start: '<?= date("Y-m-d", strtotime($p['Duedate'])); ?>'
                    },
                <?php endforeach; ?>
                <?php $i++; ?>
            ],
            eventContent: function(info) {
                return {
                    html: info.event.title
                };
            },
            height: 350,
            slotDuration: '06:00:00',
            themeSystem: 'bootstrap5',
            eventInteractive: true,
            editable: true,
            droppable: true,
            eventDrop: function(info) {
                console.log(info.event.start);
                $.ajax({
                    url: "<?= base_url('ajax/changetskduedate'); ?>",
                    method: 'post',
                    data: {
                        taskid: info.event.id,
                        due: calendar.formatIso(info.event.start)
                    },
                    success: function() {
                        Swal.fire({
                                text: "Activity changed successfully",
                                icon: "success"
                            })
                            .then(() => {
                                location.reload()
                            });
                    },
                    error: function() {
                        Swal.fire({
                                text: "Activity failed to change",
                                icon: "warning"
                            })
                            .then(() => {
                                location.reload()
                            });
                    }
                });
            }
        });
        calendar.render();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        var openpm = '<?= count($scho); ?>',
            closedpm = '<?= count($close); ?>',
            backlog = '<?= count($backlog); ?>';
        var salesChartCCanvas = $("#sales-chart-x").get(0).getContext("2d");
        var salesChartC = new Chart(salesChartCCanvas, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [openpm, closedpm, backlog],
                    backgroundColor: [
                        '#5DE2E7',
                        '#7DDA58',
                        '#E4080A'
                    ],
                    borderColor: [
                        '#5DE2E7',
                        '#7DDA58',
                        '#E4080A'
                    ],
                    legend: false,
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    'Open',
                    'Closed',
                    'Backlog'
                ]
            },
            options: {
                responsive: true,
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        });
    })
</script>