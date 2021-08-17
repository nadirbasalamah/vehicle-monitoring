<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vehicle Monitoring</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>

<body>
    <h1>Selamat Datang Admin</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Lihat Data Kendaraan</h5>
                        <p class="card-text">Melihat daftar kendaraan</p>
                        <a href="{{ route('listVehicle') }}" class="btn btn-primary">Kunjungi</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Lihat Data Pool</h5>
                        <p class="card-text">Melihat data di dalam pool kendaraan</p>
                        <a href="{{ route('listPool') }}" class="btn btn-primary">Kunjungi</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Monitoring Data Kendaraan</h5>
                        <p class="card-text">Memantau data penggunaan kendaraan</p>
                        <a href="{{ route('monitoringData') }}" class="btn btn-primary">Kunjungi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>