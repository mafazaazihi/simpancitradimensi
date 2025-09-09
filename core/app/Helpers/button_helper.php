<?php

function deletebutton($url)
{
    return '<a href="' . $url . '" class="btn btn-xs btn-danger typcn typcn-trash" data-bs-toggle="modal" title="Delete" data-bs-target="#editModal"></a>';
}

function editbutton($target)
{
    return '<a href="" class="btn btn-xs btn-success typcn typcn-edit" data-bs-toggle="modal" title="Edit" data-bs-target="' . $target . '"></a>';
}
function infobutton($target)
{
    return '<a href="" class="btn btn-xs btn-info typcn typcn-info-large" data-bs-toggle="modal" title="Details" data-bs-target="' . $target . '">';
}
