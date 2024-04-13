<?php
use Psr\Http\Message\ResponseInterface as Response;


$app-> get   ('api/caps/', [\App\Controllers\CapController::class,'getCaps']);
$app-> post  ('api/cap', [\App\Controllers\CapController::class, 'addCap']);
$app-> delete('api/cap/{id}',[\App\Controllers\CapController::class,'delCap']);
$app-> put   ('api/cap/{id}',[\App\Controllers\CapController::class,'updateCap']);