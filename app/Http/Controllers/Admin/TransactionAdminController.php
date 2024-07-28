<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Transaction;

class TransactionAdminController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'product' => 'required',
            'package' => 'required',
            'price' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'notes' => 'nullable',
            'grand_total' => 'required',
            'proof_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload file bukti pembayaran jika ada
        $filePath = null;
        if ($request->hasFile('proof_path')) {
            $file = $request->file('proof_path');
            $fileName = $request->name . '_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('payment_proofs', $fileName, 'public');
        }

        // Simpan data transaksi baru
        Transaction::create([
            'product' => $request->product,
            'package' => $request->package,
            'price' => $this->formatCurrencyToDecimal($request->price),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'grand_total' => $this->formatCurrencyToDecimal($request->grand_total),
            'proof_path' => $filePath,
        ]);

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction created successfully');
    }

    public function update(Request $request, Transaction $transaction)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'product' => 'required',
            'package' => 'required',
            'price' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'notes' => 'nullable',
            'grand_total' => 'required',
            'proof_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload file bukti pembayaran jika ada
        if ($request->hasFile('proof_path')) {
            $file = $request->file('proof_path');
            $fileName = $request->name . '_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('payment_proofs', $fileName, 'public');

            // Hapus file bukti lama jika ada
            if ($transaction->proof_path) {
                Storage::disk('public')->delete($transaction->proof_path);
            }

            $transaction->update([
                'product' => $request->product,
                'package' => $request->package,
                'price' => $this->formatCurrencyToDecimal($request->price),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'notes' => $request->notes,
                'grand_total' => $this->formatCurrencyToDecimal($request->grand_total),
                'proof_path' => $filePath,
            ]);
        } else {
            // Jika tidak ada file bukti baru, update data transaksi tanpa mengubah bukti
            $transaction->update([
                'product' => $request->product,
                'package' => $request->package,
                'price' => $this->formatCurrencyToDecimal($request->price),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'notes' => $request->notes,
                'grand_total' => $this->formatCurrencyToDecimal($request->grand_total),
            ]);
        }

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction updated successfully');
    }

    public function destroy(Transaction $transaction)
    {
        // Hapus file bukti jika ada sebelum menghapus transaksi
        if ($transaction->proof_path) {
            Storage::disk('public')->delete($transaction->proof_path);
        }

        $transaction->delete();

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction deleted successfully');
    }

    private function formatCurrencyToDecimal($currency)
    {
        // Hapus simbol mata uang dan pemisah ribuan
        $number = str_replace(['Rp', '.', ',00', ' '], '', $currency);
        // Ganti koma dengan titik untuk nilai desimal
        $number = str_replace(',', '.', $number);
        return (float) $number;
    }

    public function updateStatus(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'id' => 'required|integer',
            'status' => 'required|in:Belum Terbit Invoice,Terbit Invoice',  // Sesuaikan dengan pilihan status Anda
        ]);

        // Dapatkan transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($request->id);

        // Update status transaksi
        $transaction->status = $request->status;
        $transaction->save();

        // Kirim respons JSON
        return response()->json(['message' => 'Status transaksi berhasil diperbarui']);
    }
}
