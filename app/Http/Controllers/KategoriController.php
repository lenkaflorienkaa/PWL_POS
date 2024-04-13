<?php
namespace App\Http\Controllers;
use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }
    public function create()
    {
        return view('kategori.create');
    }
    public function store(Request $request): RedirectResponse{
        $validated = $request->validate([
            'kategori_kode'=> 'bail|required',
            'kategori_nama'=> 'required'
        ]);
        // $validated = $request->validate([
        //     'kategori_kode'=> 'bail|required',
        //     'kategori_nama'=> 'required'
        // ]);
        $validated = $request->validated();
        $validated = $request->safe()->only(['kategori_kode', 'kategori_nama']);
        $validated = $request->safe()->except(['kategori_kode', 'kategori_nama']);
        // KategoriModel::create($validated);
        return redirect('/kategori');
    }

    public function edit($id) {
        $data = KategoriModel::find($id);
        return view('kategori.edit', ['data' => $data]);
    }
    public function update(Request $request, $id) {
        $data = KategoriModel::find($id);
        $data->kategori_kode = $request->kategori_kode;
        $data->kategori_nama = $request->kategori_nama;
        $data->save();
        return redirect('/kategori');
    }
    public function destroy(string $id) {
        KategoriModel::destroy($id);
        return redirect('/kategori');
    }
}