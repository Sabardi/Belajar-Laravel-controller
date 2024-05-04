<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Coba\Foo;
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

    public function coba(){
        $foo = new Foo;
        echo $foo->bar();
    }
}
