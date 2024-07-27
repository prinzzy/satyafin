<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    public function storePaymentProof(Request $request)
    {

        $request->validate([
            'paymentProof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $product = $request->input('product');
        $package = $request->input('package');
        $price = $this->formatCurrencyToDecimal($request->input('price'));
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $notes = $request->input('notes');
        $grandTotal = $this->formatCurrencyToDecimal($request->input('grandTotal'));

        if ($request->hasFile('paymentProof')) {
            $file = $request->file('paymentProof');
            $fileName = $name . '_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('payment_proofs', $fileName, 'public');

            $transaction = new Transaction();
            $transaction->product = $product;
            $transaction->package = $package;
            $transaction->price = $price;
            $transaction->name = $name;
            $transaction->email = $email;
            $transaction->phone = $phone;
            $transaction->notes = $notes;
            $transaction->grand_total = $grandTotal;
            $transaction->proof_path = $filePath;
            $transaction->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Bukti transfer berhasil diunggah!',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Terjadi kesalahan saat mengunggah bukti transfer.',
        ], 500);
    }

    private function formatCurrencyToDecimal($currency)
    {
        // Hapus simbol mata uang, non-breaking space, dan pemisah ribuan
        $number = str_replace(['Rp', '.', ',00', ' ', ' '], '', $currency);

        // Ganti koma dengan titik untuk nilai desimal
        $number = str_replace(',', '.', $number);

        return (float) $number;
    }
}
