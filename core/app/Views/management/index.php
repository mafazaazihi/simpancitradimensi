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