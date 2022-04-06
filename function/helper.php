<?php

define("BASE_URL", "http://localhost/project_ssip/project_ssip/");

function rupiah($nilai = 0)
{
    $string = "Rp." . number_format($nilai);
    return $string;
}
