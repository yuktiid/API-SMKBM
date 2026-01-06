<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
// ini ruternya

$router->get('/cek', 'ImageController@cek');

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// ==================== FORMULIR ROUTES ====================
$router->group(['prefix' => 'formulir'], function () use ($router) {
    // GET /formulir - Get all data formulir
    $router->get('/', 'FormulirController@index');


    // GET /formulir/{id} - Get single data formulir
    $router->get('/{id}', 'FormulirController@show');

    // POST /formulir - Create new formulir
    $router->post('/', 'FormulirController@store');


    // PUT /formulir/{id} - Update formulir
    $router->put('/{id}', 'FormulirController@update');

    // DELETE /formulir/{id} - Delete formulir
    $router->delete('/{id}', 'FormulirController@destroy');

    // Additional custom routes untuk formulir
    $router->get('/search/{keyword}', 'FormulirController@search');
    $router->get('/status/{status}', 'FormulirController@getByStatus');
});

// ==================== EXISTING ROUTES ====================

// post news
$router->post('/news', 'ImageController@insert');
$router->post('/update-news/{id}', 'ImageController@update');
$router->post('/hapus-news/{id}', 'ImageController@hapusb');
$router->get('/newss', 'ImageController@shown');
$router->get('/newsss', 'ImageController@showjudul');
$router->get('/news/{id}', 'ImageController@data');
$router->get('/news1/{id}', 'ImageController@datax');

// where kategori
$router->get('/kategoriid', 'ImageController@kategoriid');

// guru
$router->post('/insert-guru', 'guruController@insert');
$router->post('/update-guru/{id}', 'guruController@update');
$router->post('/hapus-guru/{id}', 'guruController@hapus');
$router->get('/show-guru/{id}', 'guruController@show');
$router->get('/guru', 'guruController@all');

// kategori
$router->get('/kategori', 'ImageController@kategori');
$router->post('/input-kategori', 'ImageController@inputkategori');
$router->post('/update-kategori/{id}', 'ImageController@updatekategori');
$router->post('/hapus-kategori/{id}', 'ImageController@hapuskategori');

// insert / menambah data ke database
$router->post('/dataPPDB', 'PpdbController@insert');

//view / menampilkan data atau mengirim data pada client (data siswa)
$router->get('/viewDataSiswa', 'DataSiswaController@index');
$router->get('/joinsiswa/{id}', 'DataSiswaController@datajoin');

//view / menampilkan data atau mengirim data pada client (data siswa)
$router->get('/viewDataAyah', 'DataAyahController@index');

//view / menampilkan data atau mengirim data pada client (data siswa)
$router->get('/viewDataIbu', 'DataIbuController@index');

//view menghitung jumlah data tabel
$router->get('idLast', 'JmlDsController@getLastDataId');

// fitur searcing
$router->post('/key', 'ImageController@key');

// extra
// logo
$router->get('/logosh', 'ExtraController@logo');
$router->post('/logos', 'ExtraController@logos');
$router->post('/logou', 'ExtraController@logou');
$router->post('/logoh/{id}', 'ExtraController@logoh');

// media
$router->get('/medias', 'ExtraController@media');
$router->post('/upmedia', 'ExtraController@mediaup');
$router->get('/images', 'ExtraController@getImages');