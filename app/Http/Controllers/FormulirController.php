<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FormulirController extends Controller
{
    /**
     * Get all data formulir
     */
    public function index()
    {
        try {
            $formulir = Formulir::orderBy('created_at', 'desc')->get();
            return response()->json([
                'success' => true,
                'data' => $formulir,
                'total' => $formulir->count()
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Get single data formulir by ID
     */
    public function show($id)
    {
        try {
            $formulir = Formulir::find($id);

            if (!$formulir) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan'
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->json([
                'success' => true,
                'data' => $formulir
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


/**
 * Create new formulir
 */
public function store(Request $request) {
    try {
        $this->validate($request, [
            // 'no_pendaftaran' => 'required|string|max:255', // DIHAPUS karena digenerate otomatis
            'jenis_pendaftaran'  => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'nama_sekolah_alamat' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'nisn' => 'required|string|max:255|unique:formulir,nisn',
            'nik' => 'required|string|max:255|unique:formulir,nik',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'nama_wali' => 'nullable|string|max:255',
            'alamat_ortu' => 'required|string|max:255',
            'no_hp_ortu' => 'required|string|max:255',
        ]);

        // Validasi manual tambahan untuk pastikan tidak ada duplikat
        $existingNisn = Formulir::where('nisn', $request->nisn)->exists();
        if ($existingNisn) {
            return response()->json([
                'success' => false,
                'message' => 'NISN sudah terdaftar dalam sistem',
                'error_field' => 'nisn'
            ], Response::HTTP_CONFLICT);
        }

        $existingNik = Formulir::where('nik', $request->nik)->exists();
        if ($existingNik) {
            return response()->json([
                'success' => false,
                'message' => 'NIK sudah terdaftar dalam sistem',
                'error_field' => 'nik'
            ], Response::HTTP_CONFLICT);
        }

        // === GENERATE NOMOR PENDAFTARAN OTOMATIS ===
        $tahun = '2627'; // Tahun pelajaran 2026-2027
        $prefix = 'OL' . $tahun;

        // Cari nomor urut terakhir
        $lastFormulir = Formulir::where('no_pendaftaran', 'like', $prefix . '%')
            ->orderBy('no_pendaftaran', 'desc')
            ->first();

        $nextNumber = 1; // Default mulai dari 001
        if ($lastFormulir) {
            // Ambil 3 digit terakhir dari nomor pendaftaran terakhir
            $lastNumber = intval(substr($lastFormulir->no_pendaftaran, -3));
            $nextNumber = $lastNumber + 1;
        }

        // Format nomor urut 3 digit (001, 002, ...)
        $nomorUrut = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        $noPendaftaran = $prefix . $nomorUrut;

        // Log info
        \Log::info('Generated No Pendaftaran:', [
            'last_number' => $lastFormulir ? $lastFormulir->no_pendaftaran : 'none',
            'next_number' => $nextNumber,
            'no_pendaftaran' => $noPendaftaran
        ]);

        // Gabungkan dengan data dari request
        $data = $request->all();
        $data['no_pendaftaran'] = $noPendaftaran;

        // Create data
        $formulir = Formulir::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data formulir berhasil dibuat',
            'data' => $formulir,
            'no_pendaftaran' => $noPendaftaran // Kirim kembali ke FE
        ], Response::HTTP_CREATED);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validasi gagal',
            'errors' => $e->errors()
        ], Response::HTTP_BAD_REQUEST);
    } catch (\Exception $e) {
        // Log error
        \Log::error('Formulir Store Error:', [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Gagal membuat data: ' . $e->getMessage()
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
    /**
     * Update formulir data
     */
    public function update(Request $request, $id)
    {
        try {
            $formulir = Formulir::find($id);

            if (!$formulir) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan'
                ], Response::HTTP_NOT_FOUND);
            }

            $this->validate($request, [
                'nama_lengkap' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|email|unique:formulir,email,' . $id,
                'nomor_telepon' => 'sometimes|required|string|max:15',
                'alamat' => 'sometimes|required|string',
                'kota' => 'sometimes|required|string|max:100',
                'provinsi' => 'sometimes|required|string|max:100',
                'kode_pos' => 'sometimes|required|string|max:10',
                'tanggal_lahir' => 'sometimes|required|date',
                'jenis_kelamin' => 'sometimes|required|in:L,P',
                'keterangan' => 'nullable|string',
                'status' => 'sometimes|boolean'
            ]);

            $formulir->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Data formulir berhasil diupdate',
                'data' => $formulir
            ], Response::HTTP_OK);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal update data',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Delete formulir data
     */
    public function destroy($id)
    {
        try {
            $formulir = Formulir::find($id);

            if (!$formulir) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan'
                ], Response::HTTP_NOT_FOUND);
            }

            $formulir->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data formulir berhasil dihapus'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Search formulir by nama atau email
     */
    public function search($keyword)
    {
        try {
            $formulir = Formulir::where('nama_lengkap', 'like', "%{$keyword}%")
                ->orWhere('email', 'like', "%{$keyword}%")
                ->orWhere('kota', 'like', "%{$keyword}%")
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $formulir,
                'total' => $formulir->count()
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mencari data',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Get formulir by status
     */
    public function getByStatus($status)
    {
        try {
            $statusBool = filter_var($status, FILTER_VALIDATE_BOOLEAN);
            $formulir = Formulir::where('status', $statusBool)
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $formulir,
                'total' => $formulir->count()
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
