<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- mengambil data dari controller nya --}}
    @forelse ( $angka as $angka )
    <h1>{{ $angka }}</h1>
    @empty
    {{-- jika tidak ada data ini yang akan di jalankan --}}
        <h1>tidak ada data</h1>
    @endforelse
</body>
</html>
