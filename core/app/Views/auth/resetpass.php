<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-start py-5 px-4 px-sm-5">
                        <div class="brand-logo text-center">
                            <img src="<?= base_url('assets/vendor/src'); ?>/assets/images/ll.svg" alt="logo">
                        </div>
                        <?= session()->getFlashdata('message'); ?>
                        <form class="pt-3" method="post" action="<?= base_url('auth/resetpass'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="userid" name="userid" placeholder="Userid" required>
                            </div>
                            <div class="mt-3 d-grid gap-2">
                                <button type="submit" class="btn btn-sm btn-primary">Request reset password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>