<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4"><?= $title; ?></h5>
                <?= session()->getFlashdata('message'); ?>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="panel-body mb-2">
                            <div class="table-responsive">
                                <table class="table table-sm text-xs table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <td><strong>Part Number</strong></td>
                                            <td class="text-center"><strong>Description</strong></td>
                                            <td class="text-center"><strong>Machine</strong></td>
                                            <td class="text-center"><strong>Picture</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($catalog as $c): ?>
                                            <tr id="<?= base_url('assets/public/parts/') . $c['Image']; ?>">
                                                <td><?= $c['Partid']; ?></td>
                                                <td class="text-center"><?= $c['Partid']; ?></td>
                                                <td class="text-center"><?= equipmentname($c['Equipment_id']); ?></td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-xs btn-secondary typcn typcn-image" data-bs-toggle="modal" title="Picture" data-bs-target="#pictureModal"></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="pictureModal" tabindex="-1" aria-labelledby="pictureModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pictureModalLabel">Picture</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-sm">
                                <div id="imageContainer" class="text-center"></div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>