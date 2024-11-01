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
                  <tr>
                    <td>
                    </td>
                  </tr>
              </tbody>
          </table>
        </div>
      </div>
      @endsection