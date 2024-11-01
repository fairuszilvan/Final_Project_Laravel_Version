@extends('layouts.app')
@section('content')
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Nama Defecta
                      </th>
                      <th style="width: 30%">
                          Tanggal Permintaan
                      </th>
                      <th>
                          Gudang Asal
                      </th>
                      <th style="width: 8%">
                          Bulan
                      </th>
                      <th style="width: 20%">
                        Tahun
                      </th>
                      <th style="width: 20%">
                        Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($defecta as $defectas)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $defectas->defecta_name }}</td>
                  <td>{{ $defectas->demand_date }}</td>
                  <td>{{ $defectas->month }}</td>
                  <td>{{ $defectas->year }}</td>
                  <td>
                    <!-- Show Button -->
                    <a href="{{ route('defecta.show', $defectas->id) }}" class="btn btn-info btn-sm">
                        Show
                    </a>

                    <!-- Edit Button -->
                    <a href="{{ route('defecta.edit', $defectas->id) }}" class="btn btn-primary btn-sm">
                        Edit
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('defecta.destroy', $defectas->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                            Delete
                        </button>
                    </form>
                </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
      @endsection