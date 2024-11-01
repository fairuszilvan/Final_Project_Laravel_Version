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
            <form action="{{ route('warehouse.update', $warehouse->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" name="name" class="form-control" 
                             value="{{ old('name', $warehouse->name) }}" required>
                  </div>
                  <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" class="form-control" 
                           value="{{ old('location', $warehouse->location) }}" required>
                </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-success float-right">Update Project</button>
              </div>
          </form>          
            <!-- /.form -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
