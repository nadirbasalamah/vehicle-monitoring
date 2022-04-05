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
        <h1>Tambah Pool Pemesanan Kendaraan</h1>
        <form action="{{ route('createPool') }}" method="post">
            @csrf
            <div class="mb-3">
                <select class="form-select" aria-label="Select vehicle" name="vehicle_id" required>
                    <option selected>Pilih Kendaraan</option>
                    @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="driver" class="form-label">Nama Pengemudi</label>
                <input type="text" class="form-control" id="driver" name="driver" required>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Select agreement" name="agreement_id" required>
                    <option selected>Pilih Pihak Penyetuju</option>
                    @foreach($agreements as $agreement)
                    <option value="{{ $agreement->id }}">{{ $agreement->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Tanggal Mulai Pemakaian</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="mb-3">
                <label for="finish_date" class="form-label">Tanggal Selesai Pemakaian</label>
                <input type="date" class="form-control" id="finish_date" name="finish_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>