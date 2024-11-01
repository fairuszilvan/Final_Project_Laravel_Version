@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">General</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            
            <!-- Form Start -->
            <form action="{{ route('defecta.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <!-- Input Hidden untuk User ID -->
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <!-- Defecta Name -->
                    <div class="form-group">
                        <label for="defecta_name">Defecta Name</label>
                        <input type="text" id="defecta_name" name="defecta_name" class="form-control" value="{{ old('defecta_name') }}" required>
                    </div>

                    <!-- Demand Date -->
                    <div class="form-group">
                        <label for="demand_date">Demand Date</label>
                        <input type="date" id="demand_date" name="demand_date" class="form-control" value="{{ old('demand_date') }}" required>
                    </div>
                    
                    <!-- Month -->
                    <div class="form-group">
                        <label for="month">Month</label>
                        <input type="number" id="month" name="month" class="form-control" value="{{ old('month') }}" required min="1" max="12" readonly>
                    </div>

                    <!-- Year -->
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" id="year" name="year" class="form-control" value="{{ old('year') }}" required min="1000" max="9999" readonly>
                    </div>

                    <!-- Warehouse ID Dropdown -->
                    <div class="form-group">
                        <label for="warehouse_id">Warehouse</label>
                        <select id="warehouse_id" name="warehouse_id" class="form-control custom-select" required>
                            <option selected disabled>Select a Warehouse</option>
                            @foreach($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}" {{ old('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                    {{ $warehouse->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <!-- Submit Button -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success float-right">Create new Project</button>
                </div>
            </form>
            <!-- /.form -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
<!-- JavaScript to Update Month and Year -->
@push('scripts')
<script>
    document.getElementById('demand_date').addEventListener('change', function() {
        const demandDate = new Date(this.value); // Ambil nilai dari input date
        const monthInput = document.getElementById('month');
        const yearInput = document.getElementById('year');

        if (!isNaN(demandDate.getTime())) { // Periksa apakah tanggal valid
            monthInput.value = demandDate.getMonth() + 1; // Bulan dimulai dari 0, jadi tambahkan 1
            yearInput.value = demandDate.getFullYear(); // Ambil tahun
        } else {
            monthInput.value = ''; // Jika tidak valid, kosongkan
            yearInput.value = ''; // Jika tidak valid, kosongkan
        }
    });
</script>
@endpush
