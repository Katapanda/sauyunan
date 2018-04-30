<?php

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


// Route::get('/', function () {
//     return view('modules.home');
// });

// FRONTEND

Route::get('/', 'Frontend\BerandaController@index')->name('beranda');
Route::get('/sejarah', 'Frontend\SejarahController@index')->name('sejarah');
Route::get('/dasar-hukum', 'Frontend\DasarHukumController@index')->name('dasar-hukum');
Route::get('/struktur-organisasi', 'Frontend\StrukturOrganisasiController@index')->name('struktur-organisasi');
Route::get('/tugas-pokok-dan-fungsi', 'Frontend\TupoksiController@index')->name('tugas-pokok-dan-fungsi');
Route::get('/visi-misi', 'Frontend\VisiMisiController@index')->name('visi-misi');
Route::get('/berita', 'Frontend\BeritaController@index')->name('berita');
Route::get('/berita/{id}/detail', 'Frontend\BeritaController@detail')->name('berita.detail');
Route::get('/artikel', 'Frontend\ArtikelController@index')->name('artikel');
Route::get('/artikel/{id}/detail', 'Frontend\ArtikelController@detail')->name('artikel.detail');
Route::get('/agenda', 'Frontend\AgendaController@index')->name('agenda');
Route::get('/agenda/{id}/detail', 'Frontend\AgendaController@detail')->name('agenda.detail');
Route::get('/pengumuman', 'Frontend\PengumumanController@index')->name('pengumuman');
Route::get('/pengumuman/{id}/detail', 'Frontend\PengumumanController@detail')->name('pengumuman.detail');
Route::get('/foto', 'Frontend\FotoController@index')->name('foto');
Route::get('/video', 'Frontend\VideoController@index')->name('video');
Route::get('/peta', 'Frontend\PetaController@index')->name('peta');
Route::get('/kontak', 'Frontend\KontakController@index')->name('kontak');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
	Route::group(['prefix' => 'admin'], function() {
	    Route::get('dashboard', 'DashboardController@admin_index')->name('dashboard');

	    Route::resource('user', 'UserController');
		Route::get('api/user', 'UserController@apiUser')->name('admin.api.user');

	    Route::resource('user_role', 'UserRoleController');
	    Route::get('api/user_role', 'UserRoleController@apiUserRole')->name('admin.api.user_role');
		// Route Barang Asli
		Route::resource('produk', 'ProdukController');
		Route::get('api/produk', 'ProdukController@apiProduk')->name('admin.api.produk');
		Route::resource('video', 'VideoController');
		Route::get('api/video', 'VideoController@apiVideo')->name('admin.api.video');
		// Route Barang Asli
		Route::resource('multi', 'MultiController');
		Route::get('api/multi', 'MultiController@apiMulti')->name('admin.api.multi');

		Route::resource('kategori', 'KategoriBeritaController');
		Route::get('api/kategori', 'KategoriBeritaController@apiKategoriBerita')->name('admin.api.kategori');

		Route::get('artikel/editisi/{id}', 'ArtikelController@editisi');
		Route::patch('artikel/editisi/{id}', 'ArtikelController@ubah');
		Route::resource('artikel', 'ArtikelController');
		Route::get('api/artikel', 'ArtikelController@apiArtikel')->name('admin.api.artikel');


		Route::get('agenda/editisi/{id}', 'AgendaController@editisi');
		Route::patch('agenda/editisi/{id}', 'AgendaController@ubah');
		Route::resource('agenda', 'AgendaController');
		Route::get('api/agenda', 'AgendaController@apiAgenda')->name('admin.api.agenda');

		Route::get('berita/editisi/{id}', 'BeritaController@editisi');
		Route::patch('berita/editisi/{id}', 'BeritaController@ubah');
		Route::resource('berita', 'BeritaController');
		Route::get('api/berita', 'BeritaController@apiBerita')->name('admin.api.berita');

		Route::resource('gambaranumum', 'GambaranUmumController');
		Route::get('api/gambaranumum', 'GambaranUmumController@apiGambaranUmum')->name('admin.api.gambaranumum');
		Route::get('api/ajaxtampil/{id}', 'GambaranUmumController@ajax_tampil');

		Route::resource('tupoksi', 'TupoksiController');
		Route::get('api/tupoksi', 'TupoksiController@apiTupoksi')->name('admin.api.tupoksi');
		Route::get('api/tupoksi/ajaxtampil/{id}', 'TupoksiController@ajax_tampil');

		Route::resource('sambutan', 'SambutanController');
		Route::get('api/sambutan', 'SambutanController@apiSambutan')->name('admin.api.sambutan');
		Route::get('api/sambutan/ajaxtampil/{id}', 'SambutanController@ajax_tampil');

		Route::resource('programkerja', 'ProgramKerjaController');
		Route::get('api/programkerja', 'ProgramKerjaController@apiProgramKerja')->name('admin.api.programkerja');
		Route::get('api/programkerja/ajaxtampil/{id}', 'ProgramKerjaController@ajax_tampil');

		Route::resource('visimisi', 'VisiMisiController');
		Route::get('visimisi/editisi/{id}', 'VisiMisiController@editisi');
		Route::patch('visimisi/editisi/{id}', 'VisiMisiController@ubah');
		Route::get('api/visimisi', 'VisiMisiController@apiVisiMisi')->name('admin.api.visimisi');
		Route::get('api/visimisi/ajaxtampil/{id}', 'VisiMisiController@ajax_tampil');

		Route::resource('sejarah', 'SejarahController');
		Route::get('api/sejarah', 'SejarahController@apiSejarah')->name('admin.api.sejarah');
		Route::get('api/sejarah/ajaxtampil/{id}', 'SejarahController@ajax_tampil');

		Route::resource('dasar_hukum', 'DasarHukumController');
		Route::get('api/dasar_hukum', 'DasarHukumController@apidasar_hukum')->name('admin.api.dasar_hukum');
		Route::get('api/dasar_hukum/ajaxtampil/{id}', 'DasarHukumController@ajax_tampil');

		Route::resource('kontak', 'KontakController');
		Route::get('api/kontak', 'KontakController@apiKontak')->name('admin.api.kontak');
		Route::get('api/kontak/ajaxtampil/{id}', 'KontakController@ajax_tampil');

		Route::get('album/detail/{id}', 'AlbumController@detailalbum');
		Route::post('api/imgalbum', 'AlbumController@uploadfoto');
		Route::resource('album', 'AlbumController');
		Route::get('api/album', 'AlbumController@apiAlbum')->name('admin.api.album');

		// Route::resource('sodetail', 'SoDetailController');
		Route::resource('so', 'StrukturOrganisasiController');
		Route::get('/so/show/{jabatan}', 'StrukturOrganisasiController@detail');
		Route::group(['prefix' => 'so'], function() {
			Route::get('detail/{id}', 'SoDetailController@index');
			Route::post('detail/{id}', 'SoDetailController@store');
			Route::get('detail/{id}/edit/{id_detail}', 'SoDetailController@edit');
			Route::patch('detail/{id}/{id_detail}', 'SoDetailController@update');
			Route::delete('detail/{id}/{id_detail}', 'SoDetailController@destroy');
		});
		Route::get('api/so', 'StrukturOrganisasiController@apiSO')->name('admin.api.so');
		Route::get('api/sodetail/{id}', 'SoDetailController@apiSODetail')->name('admin.api.sodetail');
	});
});
// API FRONTEND
Route::get('api/home', 'Frontend\HomeController@index')->name('api.home');


Route::get('api/tes', 'Frontend\HomeController@tes')->name('api.tes');
