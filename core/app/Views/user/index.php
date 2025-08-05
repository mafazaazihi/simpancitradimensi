<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4"><?= $title; ?></h5>
                <?= session()->getFlashdata('message'); ?>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="contact-card bg-white rounded-4 shadow-sm overflow-hidden">
                            <div class="row g-0">
                                <div
                                    class="col-md-4 bg-primary bg-gradient d-flex align-items-center justify-content-center p-4">
                                    <img src="<?= base_url('assets/vendor/src/'); ?>assets/images/faces/<?= $prof['Image']; ?>" class="rounded-circle shadow-sm" width="130" height="150" alt="Profile Image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h3 class="card-title mb-0 text-primary fw-bold"><?= $prof['Fullname']; ?></h3>
                                            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                                                <?= $role['Rolename']; ?>
                                            </span>
                                        </div>
                                        <p class="card-text text-muted mb-4">last login :<?= $prof['Lastlogin']; ?></p>
                                        <p class="card-text text-muted mb-4">Email :<?= $prof['Email']; ?></p>
                                        <div class="d-flex gap-3 mb-4">
                                            <button class="btn btn-sm btn-primary px-4" data-bs-toggle="modal" title="Change password" data-bs-target="#changeModal">
                                                <i class="fa fa-key me-2"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary px-4" data-bs-toggle="modal" title="Edit information" data-bs-target="#editprofModal">
                                                <i class="fa fa-info me-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="changeModal" tabindex="-1" aria-labelledby="changeModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changeModalLabel">Change password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('user/changepass'); ?>" method="post">
                                <div class="modal-body text-sm">
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="password" class="form-control form-control-sm" id="prevpass" name="prevpass" required placeholder="name@example.com">
                                        <label for="prevpass">Old password</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="password" class="form-control form-control-sm" id="password" name="password" required placeholder="name@example.com">
                                        <label for="password">New password</label>
                                    </div>
                                    <div class="form-floating form-floating-sm mb-2">
                                        <input type="password" class="form-control form-control-sm" id="cpassword" name="cpassword" required placeholder="name@example.com">
                                        <label for="cpassword">Old password</label>
                                    </div>
                                    <div class="text-sm">
                                        <div id="alert"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-sm btn-secondary"><i class="typcn typcn-input-checked desktop-icon"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editprofModal" tabindex="-1" aria-labelledby="editprofModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editprofModalLabel">Edit profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <?= form_open_multipart('user/edit'); ?>
                            <div class="modal-body text-sm">
                                <input type="text" name="useridl" id="useridl" hidden value="<?= $prof['Userid']; ?>">
                                <div class="form-floating form-floating-sm mb-2">
                                    <input type="text" class="form-control form-control-sm" id="fullname" name="fullname" required placeholder="name@example.com">
                                    <label for="fullname">Full name</label>
                                </div>
                                <div class="form-floating form-floating-sm mb-2">
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" required placeholder="name@example.com">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" accept="image/*" id="image" name="image">
                                    <label class="input-group-text" for="image"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                </div>
                                <div class="text-sm">
                                    <div id="alert"></div>
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