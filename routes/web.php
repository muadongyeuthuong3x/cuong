<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('trang-dang-nhap-admin.abc', 'fontend\Loginuser@dangnhapadmin' )->name('dangnhapadmin');
Route::post('trang-dang-nhap-admin.abc', 'fontend\Loginuser@vaotrangadmin' )->name('trove');
Route::get('quayve.abc', 'fontend\Loginuser@ratrangadmin' )->name('loginadmin');


Route::group(['prefix' => 'admin' ], function () {
    Route::get('Trang-chu-admin','BackEnd\Trangchu@index')->name('trangchuadmin');
    Route::resource('them-hang-san-pham','BackEnd\ThemhangspController1');
    Route::resource('them-ten-muc-san-pham','BackEnd\MucSanPham');
    Route::resource('them-user-admin','BackEnd\UserController');

    Route::get('/them-tensp','BackEnd\tensps@create')->name('themsp');
    Route::post('/them-tensp','BackEnd\tensps@store')->name('khoitaosp');
    Route::get('/danh-sach-ten-sp','BackEnd\tensps@index')->name('list-sp');
    Route::get('/sua-ten-sp/{id}', 'BackEnd\tensps@edit');
    Route::post('/sua-ten-sp/{id}', 'BackEnd\tensps@update');
    Route::get('/xoa-ten-sp/{id}', 'BackEnd\tensps@delete');

    Route::get('Setting-thong-tin/1', 'BackEnd\thongtinlh@index')->name('ttlhadmin');
    Route::post('Setting-thong-tin/1', 'BackEnd\thongtinlh@updatett')->name('updatettlhadmin');

    Route::get('/Danh-sach-don-hang', 'BackEnd\thongtindonhang@index')->name('sanphammua');

    Route::get('/xuatsp/{id}', 'BackEnd\thongtindonhang@show');

    Route::get('/donhang/{id}', 'BackEnd\thongtindonhang@PDFxuat');

    Route::get('/quyentable', 'BackEnd\quyentable@index')->name('hienthitable');

    Route::get('/them-nhom-quyen', 'BackEnd\quyentable@khoitao');

    Route::post('/them-nhom-quyen', 'BackEnd\quyentable@luu');

    Route::get('/danh-sach-quyen', 'BackEnd\quyentable@danhsach')->name('listquyen');

    Route::get('/sua-nhom-quyen/{id}', 'BackEnd\quyentable@edit');

    Route::post('/sua-nhom-quyen/{id}', 'BackEnd\quyentable@updatequyen');


    Route::delete('/xoanhomquyen/{id}','BackEnd\quyentable@delete');


 });




 Route::get('dangki-thanhvien.html','FontEnd\Loginuser@create')->name('dangki');
 Route::post('dangki-thanhvien.html','FontEnd\Loginuser@store')->name('dangnhap');
 Route::get('dangnhaptrang.html','FontEnd\Loginuser@dangnhap')->name('dangnhaptrang');
 Route::post('dangnhaptrang.html','FontEnd\Loginuser@index')->name('dangnhaptrang1');
 Route::get('trangchu','FontEnd\Loginuser@Logout')->name('dangxuat');


 Route::group(['prefix' => 'trang-gioi-thieu-sanpham'], function () {

    Route::get('trangchu.html','FontEnd\Trangchu@index')->name('trangchu');
    Route::post('trangchu.html','FontEnd\Trangchu@store');

     Route::group(['prefix' => 'cart'], function () {

    Route::get('sanphammua','FontEnd\cart@index')->name('muasanpham');
    Route::get('checkout','FontEnd\checkout@index')->name('checkout');

    Route::get('danhsachsanpham','FontEnd\cartlist@index')->name('cartlist');

    Route::post('danhsachsanpham','FontEnd\cartlist@store');


    Route::get('sanphammua/{id}','FontEnd\muahang@index');

    Route::post('sanphammua/{id}','FontEnd\muahang@store');

    Route::get('/XoaItemCar/{id}', 'FontEnd\muahang@delete'  );





  });
});
