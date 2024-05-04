1. Pengertian Controller
controller adalah bagian kode program yang mengatur logika serta lalu
lintas data

Controller berada di pusat MVC. Pada saat user mengetik sebuah alamat di web browser,
route akan membaca alamat tersebut dan (idealnya) memanggil controller yang sesuai

Di dalam controller inilah logika program kita tulis. Apabila butuh mengambil data dari
database, controller akan mengakses model. Hasil dari model dikembalikan ke controller yang
bisa diolah lebih lanjut untuk kemudian dikirim ke view. Sesampainya di view, data tinggal
ditampilkan ke web browser.
Apa yang bisa di lakukan controller sangat banyak.

2. Cara Mengakses Controlle
di laravel yang menangin untuk bisa ke controller adalah melalui route dan url nya akan mengarah ke controller yang kita tentukan 

Route::get('/',[PageController::class,'index']);
Route::get('/tampil',[PageController::class,'tampil']);

untuk membuat controller dengan perintah php artisan make:controller NamaController dan usahaka menggunakan hurup Kapital di Awal dan di awal Kata Controller nya. atau Camel case {link kamel case}

dan akan di buatkan sebuah file bernama NamaController posisi nya berada di folder app/http/controller

sebelum kita membuat nya sudah ada file controller default bawaan laravel nya sendiri

akan tetapi di route nya jangan lupa untuk menginport file controller yang sudah di buat tadi

use App\Http\Controllers\NamaController;
Route::get('/',[NamaController::class,'index']);
Route::get('/tampil',[NamaController::class,'tampil']);

untuk tester nya buatlah sebuah function index dan tampil di controller nya yang mengembalikan nilai 
<!-- kode di sembunyikan -->i
    public function index(){
       return 'Halamang Home';
    }

    public function tampil() {
        return 'Data Mahasiswa';
    }

yang perlu di ingat ada  2 cara penulisan controller 
cara pertama memanggil controller seperti di atas atau 
seperti ini. jika seperti ini tidak perlu lagi mengimport seperti di atas minus nya kode sedikit panjang

Route::get('/', [App\Http\Controllers\NamaController::class,'index']);

3. bagaimana sih cara mengakses view dari controller
sebelum nya kita sudah belajar bagaimana cara mengakses view dari routes.  atau mengembalikan nilai dari controller atau lebih tepat nya menampilkan logika atau data yang di dapat dari controller

public function <nama fungsi>(){
    return view('');
} 

yang di maksud kan adalah nama class yang di berikan dari routes nya
Route::get('/tampil',[NamaController::class,'tampil']);

melakukan pengiriman data dari controller ke view
    public function tampil() {
        $arrayangka = ["1", "2", "3", "4", "5", "6"];
        return view('tampil')->with('angka',$arrayangka);
        // angka ini harus sama dengan yang di panggil di view tampil
    }

    disini kita akan mengirim data dari controller ke view
    yang pertama ada variable $arrayangka yang menampung data kemudian di kembalikan ke view (di kirim ke view) dengan method width() yang sudah kita pelajri di route (link belajar nya)
Selain metode with(), beberapa metode umum lainnya yang digunakan di dalam controller Laravel antara lain:

findOrFail(): Digunakan untuk menemukan entitas berdasarkan ID, dan jika tidak ditemukan, akan melempar pengecualian.
orderBy(): Digunakan untuk mengurutkan hasil query berdasarkan kolom tertentu.
where(): Digunakan untuk menambahkan kriteria ke query.
paginate(): Digunakan untuk membagi hasil query menjadi beberapa halaman.
first(): Digunakan untuk mendapatkan hanya satu entitas pertama yang cocok dengan kriteria.

dan

store(Request $request): Metode ini digunakan untuk menyimpan data baru ke dalam basis data. Misalnya, menambahkan pengguna baru ke dalam sistem berdasarkan data yang diterima dari formulir.
edit($id): Metode ini biasanya digunakan untuk menampilkan formulir untuk mengedit sumber daya yang sudah ada. Misalnya, menampilkan formulir untuk mengubah informasi pengguna.
update(Request $request, $id): Metode ini digunakan untuk memperbarui data yang sudah ada di basis data berdasarkan data yang diterima dari formulir. Misalnya, mengubah informasi pengguna yang sudah ada.
destroy($id): Metode ini digunakan untuk menghapus data dari basis data berdasarkan ID atau kriteria lainnya. Misalnya, menghapus pengguna dari sistem.
otherMethods(): Selain metode-metode CRUD yang umum digunakan, Anda juga dapat menambahkan metode kustom sesuai kebutuhan aplikasi Anda. Metode-metode ini dapat melakukan tindakan khusus atau operasi yang diperlukan untuk aplikasi Anda.

4. memindahkan file controller 
tujuan dari memindahkan file controller iini adalah jika projek yang sudah di kerjakan sudah kompleks atau besar

Namun kita tidak bisa sekedar memindahkan file controller karena ada beberapa hal yang
mesti disiapkan.

pertama tama buatlah folder dengan nama yang sesui dengan projek yang kalian buat cth nya saya adalah admin
kemudian pindah file controller nya
seteruktur folder nya Controllers\Admin\NamaController.php
nah di folder admin ini seolah olah kita 
menampung semua controller nya yang berkaitan dengan pemerosesan admin hehhe. 

Karena file ini sudah di pindah, ada beberapa hal yang harus kita ubah. Pertama, penulisan
namespace di baris 3 harus disesuaikan dengan alamat path yang baru, yakni menjadi:
namespace App\Http\Controllers\Admin;

Karena namespace sudah berubah, kita juga tidak bisa langsung mengakses class Controller
untuk di extends di baris 5. Alasannya karena class Controller tersebut tersimpan di file
Controller.php yang berada di namespace App\Http\Controllers, bukan App\Http\ Controllers\Admin.

jadi nya perlu di import terlebih dahulu 
yang jadi pertanyaan di route nya perlu di ubah juga? jawaban nya perlu banget hehe

# controllernya
<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PageController extends Controller
{
    //
    public function index(){
       return 'Halamang Home';
    }

    public function tampil() {
        $arrayangka = ["1", "2", "3", "4", "5", "6"];
        return view('tampil')->with('angka',$arrayangka);
        // angka ini harus sama dengan yang di panggil di view tampil
    }
}

# route nya
// sebelum di pindah file controller nya
// use App\Http\Controllers\PageController;

// sesudah di pindah 
use App\Http\Controllers\admin\PageController;

// Route::get('<url>',[App\Http\Controllers\Nama_Controller::class,'nama_method']);
Route::get('/',[PageController::class,'index']);
Route::get('/tampil',[PageController::class,'tampil']);


5. mengakses ekternal class 
untuk projek besar dan kompleks terkadang kita perlu membuatkan class sendiri kemudian di akses dari contoller. yang kita lakukan hanya mengatur namespace nya.

buatlah folder di dalam controller dan dengan nama bebas, kemudian buat file bernama Foo.php. struktur folder nya seperti ini App\Http\Controllers\Coba\Foo.php.

kemudian definiskan  namespace App\Http\Controllers\Coba; nya. class Foo
{
    public function bar(){
        return 'Ini berasal dari Method Bar di dalam class Foo';
        // atau mengunakan echo 'pesan nya '
    }
}

selanjut nya kita mencoba mengakses kelas yg baru kita buat ini di admin/PageController nya akan tetapi sebelum nya kita belom membuatkan route nya di web.php route nya sama seperi sebelum sebelum nya.

Route::get('/coba/kelas',[PageController::class,'coba']);

kemudian kita buat di controller nya seperi sebelum sebelum nya 

    public function coba(){
        $foo = new \App\Http\Controllers\Coba\Foo();
        echo $foo->bar();
    }
di sini kita membuat $foo = new \App\Http\Controllers\Coba\Foo(); ini bertujuan untuk mengakses kelas yang kita buat dan seharus nya mengakses namespace nya kemudian di panggil untuk di tampilkan ke layar
akan tetapi ada car lain nya yaitu langsung mendefiniskan kelas yang di buat dengan cara

use App\Http\Controllers\Coba\Foo;

sekarang tinggal kita pake saja dan panggil
    
    public function coba(){
        $foo = new Foo;
        echo $foo->bar();
    }

