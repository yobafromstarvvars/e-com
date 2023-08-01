<?php
// GET ROOTURL WITH 'GET' REQUEST. USED IN JS

session_start();
header('Content-Type: application/json; charset=utf-8');
// If ROOTPATH is not initiated, send 'not available'
try {
    echo json_encode(["ROOTPATH" => ROOTPATH]);
} catch (\Throwable $th) {
    echo json_encode(["ROOTPATH" => "not available"]);
}
exit;