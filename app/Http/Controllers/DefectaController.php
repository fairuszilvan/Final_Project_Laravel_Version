<?php

namespace App\Http\Controllers;

use App\Models\Defecta;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;


class DefectaController extends Controller
{
    public function index(Request $request)
    {
        $defecta = Defecta::all();
        return view('defecta.index', compact('defecta'));
    }
    public function add(Request $request)
    {
        $warehouses = Warehouse::all();
        return view('defecta.add',compact('warehouses'));
    }
    public function edit($id)
    {
        $defecta = Defecta::findOrFail($id);

        return view('defecta.edit', compact('defecta'))->with('success', 'pasien has been Edited successfully.');
    }
    public function show($id)
    {
        $defecta = Defecta::findOrFail($id);
        return view('defecta.show', compact('defecta'));
    }// Pastikan Carbon diimport jika belum

    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'defecta_name' => 'required|string|min:3|max:999',
        'demand_date' => 'required|date', // Ubah menjadi validasi tanggal
        'month' => 'required|integer|min:1|max:12', // Validasi month
        'year' => 'required|integer|min:1000|max:9999', // Validasi year
        'warehouse_id' => 'required|exists:warehouses,id',
    ]);

    // Membuat instance baru dari Defecta
    $defecta = new Defecta();
    $defecta->user_id = $validatedData['user_id'];
    $defecta->defecta_name = $validatedData['defecta_name'];
    $defecta->demand_date = $validatedData['demand_date'];
    $defecta->month = $validatedData['month']; // Ambil dari input yang sudah ada
    $defecta->year = $validatedData['year']; // Ambil dari input yang sudah ada
    $defecta->warehouse_id = $validatedData['warehouse_id'];

    // Simpan data ke database
    $defecta->save();

    // Redirect setelah berhasil
    return redirect()->route('defecta.index')->with('success', 'Data Sudah Disimpan');
}
public function destroy($id)
{
    // Cari data warehouse berdasarkan ID
    $defecta = Defecta::findOrFail($id);

    // Hapus data warehouse
    $defecta->delete();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('defecta.index')->with('success', 'Data berhasil dihapus');
}   
public function update(Request $request, $id)
{
    // Temukan Defecta berdasarkan ID
    $defecta = Defecta::findOrFail($id);

    // Validasi input
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'defecta_name' => 'required|string|min:3|max:999',
        'demand_date' => 'required|date',
        'month' => 'required|integer|min:1|max:12',
        'year' => 'required|integer|min:1000|max:9999',
        'warehouse_id' => 'required|exists:warehouses,id',
    ]);

    // Memperbarui data
    $defecta->user_id = $validatedData['user_id'];
    $defecta->defecta_name = $validatedData['defecta_name'];
    $defecta->demand_date = $validatedData['demand_date'];
    $defecta->month = $validatedData['month'];
    $defecta->year = $validatedData['year'];
    $defecta->warehouse_id = $validatedData['warehouse_id'];

    // Simpan perubahan
    $defecta->save();

    // Redirect setelah berhasil
    return redirect()->route('defecta.index')->with('success', 'Data Sudah Diperbarui');
}
}
