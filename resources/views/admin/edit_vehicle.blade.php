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
        <h1>Ubah Data Kendaraan</h1>
        @foreach($vehicle as $v)
        <form action="{{ route('updateVehicle', ['id' => $v->id]) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="vehicle_name" class="form-label">Nama Kendaraan</label>
                <input type="text" class="form-control" id="vehicle_name" name="name" required value="{{ $v->name }}">
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Select vehicle ownership" name="vehicle_type" required>
                    <option value="angkutan" @if ($v->vehicle_type == 'angkutan') selected="selected" @endif>Angkutan Orang</option>
                    <option value="barang" @if ($v->vehicle_type == 'barang') selected="selected" @endif>Angkutan Barang</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fuel_consumption" class="form-label">Konsumsi BBM</label>
                <input type="number" class="form-control" id="fuel_consumption" name="fuel_consumption" required value="{{ $v->fuel_consumption }}">
            </div>
            <div class="mb-3">
                <label for="service_schedule" class="form-label">Jadwal Service</label>
                <input type="date" class="form-control" id="service_schedule" name="service_schedule" required value="{{ $v->service_schedule }}">
            </div>

            <div class="mb-3">
                <select class="form-select" aria-label="Select vehicle ownership" name="vehicle_ownership_type" required>
                    <option value="perusahaan" @if ($v->vehicle_ownership_type == 'perusahaan') selected="selected" @endif>Milik Perusahaan</option>
                    <option value="sewa" @if ($v->vehicle_ownership_type == 'sewa') selected="selected" @endif>Sewa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>