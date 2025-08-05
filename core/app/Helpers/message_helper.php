<?php

function success_message($data = null)
{
    session()->setFlashdata('message', '<div class="alert alert-success alert-dismissible fade show mb-2" role="alert">' . $data . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
}
function fail_message($data = null)
{
    session()->setFlashdata('message', '<div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">' . $data . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
}
