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

