@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Defecta</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            
            <!-- Form Start -->
            <form action="{{ route('defecta.update', $defecta->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Menunjukkan bahwa ini adalah permintaan update -->
                <div class="card-body">
                    <!-- Input Hidden untuk User ID -->
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <!-- Defecta Name -->
                    <div class="form-group">
                        <label for="defecta_name">Defecta Name</label>
                        <input type="text" id="defecta_name" name="defecta_name" class="form-control" 
                               value="{{ old('defecta_name', $defecta->defecta_name) }}" required>
                    </div>

                    <!-- Demand Date -->
                    <div class="form-group">
                        <label for="demand_date">Demand Date</label>
                        <input type="date" id="demand_date" name="demand_date" class="form-control" 
                               value="{{ old('demand_date', $defecta->demand_date) }}" required>
                    </div>

                    <!-- Month (Dihitung dari demand_date) -->
                    <div class="form-group">
                        <label for="month">Month</label>
                        <input type="number" id="month" name="month" class="form-control" 
                               value="{{ old('month', $defecta->month) }}" required min="1" max="12" readonly>
                    </div>

                    <!-- Year (Dihitung dari demand_date) -->
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" id="year" name="year" class="form-control" 
                               value="{{ old('year', $defecta->year) }}" required min="1000" max="9999" readonly>
                    </div>

                    <!-- Warehouse ID Dropdown -->
                    <div class="form-group">
                        <label for="warehouse_id">Warehouse</label>
                        <select id="warehouse_id" name="warehouse_id" class="form-control custom-select" required>
                            <option selected disabled>Select a Warehouse</option>
                            @foreach($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}" {{ old('warehouse_id', $defecta->warehouse_id) == $warehouse->id ? 'selected' : '' }}>
                                    {{ $warehouse->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <!-- Submit Button -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success float-right">Update Defecta</button>
                </div>
            </form>
            <!-- /.form -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
