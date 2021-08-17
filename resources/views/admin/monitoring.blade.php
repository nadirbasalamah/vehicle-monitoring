<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    <title>Vehicle Monitoring</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1>Monitoring Data Kendaraan</h1>
        <h2>Daftar Penggunaan Kendaraan</h2>
        <a href="{{ route('admin_index') }}" class="btn btn-primary">Kembali ke Dashboard</a>
        <form action="{{ route('exportToExcel') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-success">Ekspor ke File Excel</button>
        </form>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Kendaraan</th>
                        <th scope="col">Penggunaan BBM (Liter)</th>
                        <th scope="col">Penggunaan Awal</th>
                        <th scope="col">Penggunaan Akhir</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pools as $pool)
                    <tr>
                        <th scope="row">{{$pool->id}}</th>
                        <td>{{$pool->name}}</td>
                        <td>{{$pool->fuel_consumption}}</td>
                        <td>{{$pool->start_date}}</td>
                        <td>{{$pool->finish_date}}</td>
                        <td>{{$pool->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="width: 50%">
            {!! $vehiclesCart->container() !!}
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    @if($vehiclesCart)
    {!! $vehiclesCart->script() !!}
    @endif
</body>

</html>