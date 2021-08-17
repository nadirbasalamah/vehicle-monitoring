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
    <div class="container">
        <h1>Daftar Kendaraan</h1>
        <a href="{{ route('admin_index') }}" class="btn btn-primary">Kembali ke Dashboard</a>
        <a href="{{ route('addVehicle') }}" class="btn btn-primary">Tambah Data Kendaraan</a>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Kendaraan</th>
                        <th scope="col">Penggunaan Awal</th>
                        <th scope="col">Penggunaan Akhir</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicles as $vehicle)
                    <tr>
                        <th scope="row">{{$vehicle->id}}</th>
                        <td>{{$vehicle->name}}</td>
                        <td>{{$vehicle->start_date}}</td>
                        <td>{{$vehicle->finish_date}}</td>
                        <td><a href="{{route('vehicleDetail', ['id' => $vehicle->id])}}" class="btn btn-primary">Lihat</a></td>
                        <td>
                            <form action="{{route('addToPool', ['id' => $vehicle->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-info">Tambahkan ke Pool</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>