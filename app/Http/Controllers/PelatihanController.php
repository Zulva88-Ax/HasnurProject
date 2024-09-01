<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil parameter filter dari request
        $tanggal = $request->input('tanggal');
        $sesi = $request->input('sesi');

        // Query untuk mendapatkan data pelatihan
        $query = Pelatihan::query();

        if ($tanggal) {
            $query->whereDate('tanggal', $tanggal);
        }

        if ($sesi) {
            $query->where('sesi', $sesi);
        }

        // Mengambil data pelatihan dengan filter yang diterapkan
        $pelatihan = $query->get();

        $pelatihan = $query->paginate(10);

        // Mengirim data ke view
        return view('index', compact('pelatihan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_trainer' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'sesi' => 'required|integer',
            'waktu' => 'required',
            'topik' => 'required|string|max:100',
        ]);

        // Menyimpan data ke database
        Pelatihan::create([
            'nama_trainer' => $request->nama_trainer,
            'tanggal' => $request->tanggal,
            'sesi' => $request->sesi,
            'waktu' => $request->waktu,
            'topik' => $request->topik,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Pelatihan berhasil ditambahkan.');
    }

    public function edit(Request $request, $id)
    {
        $pelatihan = Pelatihan::find($id);
        return view('pelatihan.edit', compact('pelatihan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_trainer' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'sesi' => 'required|integer',
            'waktu' => 'required',
            'topik' => 'required|string|max:255',
        ]);

        // Mencari pelatihan berdasarkan ID
        $pelatihan = Pelatihan::findOrFail($id);

        // Memperbarui data pelatihan
        $pelatihan->update([
            'nama_trainer' => $request->nama_trainer,
            'tanggal' => $request->tanggal,
            'sesi' => $request->sesi,
            'waktu' => $request->waktu,
            'topik' => $request->topik,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Pelatihan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Mencari pelatihan berdasarkan ID dan menghapusnya
        $pelatihan = Pelatihan::findOrFail($id);
        $pelatihan->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Pelatihan berhasil dihapus.');
    }

    public function exportPdf()
    {
        $pelatihan = Pelatihan::all();

        $pdf = Pdf::loadView('Rekap_pelatihan.pdf', compact('pelatihan'));

        return $pdf->download('Rekap_pelatihan.pdf');

    }
}
