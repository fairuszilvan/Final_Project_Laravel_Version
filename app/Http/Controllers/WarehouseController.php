<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        $warehouse = Warehouse::all();
        return view('warehouse.index', compact('warehouse'));
    }
    public function add(Request $request)
    {
        return view('warehouse.add');
    }
    public function edit($id)
    {
        $warehouse = Warehouse::findOrFail($id);

        return view('warehouse.edit', compact('warehouse'))->with('success', 'pasien has been Edited successfully.');
    }
    public function show($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        return view('warehouse.show', compact('warehouse'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:999',
            'location' => 'required|string|min:1|max:999',
        ]);
        $warehouse = new Warehouse();
        $warehouse->name = $validatedData['name'];
        $warehouse->location = $validatedData['location'];
        $warehouse->save();

        return redirect()->route('warehouse.index')->with('success', 'Data Sudah Disimpan');
    }
    public function destroy($id)
{
    // Cari data warehouse berdasarkan ID
    $warehouse = Warehouse::findOrFail($id);

    // Hapus data warehouse
    $warehouse->delete();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('warehouse.index')->with('success', 'Data berhasil dihapus');
}
public function update(Request $request, $id)
{
    // Validasi input
    $validatedData = $request->validate([
        'name' => 'required|string|min:3|max:255',
        'location' => 'required|string|min:1|max:999',
    ]);

    // Cari data warehouse berdasarkan ID
    $warehouse = Warehouse::findOrFail($id);

    // Update data warehouse
    $warehouse->name = $validatedData['name'];
    $warehouse->location = $validatedData['location'];
    $warehouse->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('warehouse.index')->with('success', 'Data berhasil diperbarui');
}

}
