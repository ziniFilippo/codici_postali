<?php
use Psr\Http\Message\ResponseInterface as Response;

$app->get('', function (Response $response) {
    $response->getBody()->write(file_get_contents('index.html'));
    return $response;
});

$app->get('api/get', function (Response $response) {
    $response->getBody()->write(file_get_contents('api/get.html'));
    return $response;
});
$app->get('api/add', function (Response $response) {
    $response->getBody()->write(file_get_contents('api/addForm.html'));
    return $response;
});
$app->get('api/update/{id}', function (Response $response) {
    $response->getBody()->write(file_get_contents('api/updateForm.html'));
    return $response;
});

$app-> get('api/caps', [\App\Controllers\CapController::class,'getCaps']);
$app-> post('api/cap', [\App\Controllers\CapController::class, 'addCap']);
$app-> delete('api/cap/{id}',[\App\Controllers\CapController::class,'delCap']);
$app-> post('api/cap/{id}',[\App\Controllers\CapController::class,'updateCap']);