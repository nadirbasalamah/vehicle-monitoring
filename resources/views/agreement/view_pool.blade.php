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
        <h1>Data Pool Kendaraan</h1>
        @foreach($pool as $p)
        <p>Nama: {{ $p->name }}</p>
        <p>Jenis Kendaraan: {{ $p->vehicle_type }}</p>
        <p>Konsumsi BBM: {{ $p->fuel_consumption }}</p>
        <p>Jadwal Service: {{ $p->service_schedule }}</p>
        <p>Nama Driver: {{ $p->driver }}</p>
        <p>Tanggal Mulai Penggunaan: {{ $p->start_date }}</p>
        <p>Tanggal Selesai Penggunaan: {{ $p->finish_date }}</p>
        <p>Status: {{ $p->status }}</p>
        <br />
        <h3>Pilihan</h3>
        <form action="{{ route('verifyVehicle', ['id' => $p->id]) }}" method="post">
            @csrf
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="agree" checked value="agree">
                <label class="form-check-label" for="agree">
                    Setuju
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="rejected" value="rejected">
                <label class="form-check-label" for="rejected">
                    Tolak
                </label>
            </div>
            <div class="form-check">
                <label for="notes" class="form-label">Catatan</label>
                <input class="form-control" type="text" name="notes" id="notes" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        @endforeach
        <a href="{{ route('pools') }}" class="btn btn-primary">Kembali ke Daftar Pool</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>