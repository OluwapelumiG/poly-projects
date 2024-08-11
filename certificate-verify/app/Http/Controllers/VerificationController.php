<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;

class VerificationController extends Controller
{
    //

    public function showVerificationForm($qr)
    {
        $result = Result::where('qr', $qr)->first();
        return view('verify-qr', compact('result'));
    }

    public function verifyQR(Request $request)
    {
        $request->validate([
            'serial_no' => 'required',
        ]);

        $result = Result::where('serial_no', $request->serial_no)
            ->where('id', $request->result)
            ->first();

        if ($result) {
            // Result found, handle verification success
            return view('verification-success', compact('result'));
        } else {
            // Result not found or QR code doesn't match, handle verification failure
            return view('verification-failure');
        }
    }
}
