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
        <h1>Tambah Data Kendaraan</h1>
        <form action="{{ route('addNewVehicle') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="vehicle_name" class="form-label">Nama Kendaraan</label>
                <input type="text" class="form-control" id="vehicle_name" name="name" required>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Select vehicle ownership" name="vehicle_type" required>
                    <option selected>Pilih Jenis Kendaraan</option>
                    <option value="angkutan">Angkutan Orang</option>
                    <option value="barang">Angkutan Barang</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fuel_consumption" class="form-label">Konsumsi BBM</label>
                <input type="number" class="form-control" id="fuel_consumption" name="fuel_consumption" required>
            </div>
            <div class="mb-3">
                <label for="service_schedule" class="form-label">Jadwal Service</label>
                <input type="date" class="form-control" id="service_schedule" name="service_schedule" required>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Select vehicle ownership" name="vehicle_ownership_type" required>
                    <option selected>Pilih Jenis Kepemilikan Kendaraan</option>
                    <option value="perusahaan">Milik Perusahaan</option>
                    <option value="sewa">Sewa</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>