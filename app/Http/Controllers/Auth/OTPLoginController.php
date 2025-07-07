<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OTPLoginController extends Controller
{
    public function showOtpForm()
    {
        return view('auth.login-otp');
    }

    public function sendOtp(Request $request)
    {
        $phone = $request->isJson() ? $request->json('phone') : $request->input('phone');

        if (!preg_match('/^[0-9]{10}$/', $phone)) {
            return response()->json(['success' => false, 'message' => 'Invalid phone number.'], 422);
        }

        $user = User::where('phone', $phone)->first();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Phone number not registered.'], 404);
        }

        $apiKey = env('TWOFACTOR_API_KEY');
        $fullPhone = '91' . $phone;

        $response = Http::get("https://2factor.in/API/V1/{$apiKey}/SMS/{$fullPhone}/AUTOGEN");

        if ($response->successful() && isset($response['Details'])) {
            Session::put('otp_session_id', $response['Details']);
            Session::put('otp_phone', $phone);

            return response()->json(['success' => true, 'message' => 'OTP sent successfully.']);
        }

        \Log::error('2Factor API error', [
            'status' => $response->status(),
            'body' => $response->body(),
            'url' => "https://2factor.in/API/V1/{$apiKey}/SMS/{$fullPhone}/AUTOGEN"
        ]);

        return response()->json(['success' => false, 'message' => 'Failed to send OTP.'], 500);
    }

    public function verifyOtp(Request $request)
{
    $request->validate([
        'otp' => 'required|digits:6',
        'phone' => 'required|digits:10'
    ]);

    $phone = $request->input('phone');
    $otp = $request->input('otp');
    $apiKey = env('TWOFACTOR_API_KEY');
    $fullPhone = '91' . $phone;

    // Reconstruct session ID from phone number if missing
    $sessionId = Session::get('otp_session_id');

    if (!$sessionId) {
        return back()->withErrors(['otp' => 'Session expired or not found. Please resend OTP.']);
    }

    // Use VERIFY endpoint instead of VERIFY3
    $verifyResponse = Http::timeout(20)->get("https://2factor.in/API/V1/{$apiKey}/SMS/VERIFY/{$sessionId}/{$otp}");

    if ($verifyResponse->successful() && $verifyResponse['Details'] === 'OTP Matched') {
        $user = User::where('phone', $phone)->first();

        if ($user) {
            Auth::login($user);
            Session::forget(['otp_session_id', 'otp_phone']);
            return redirect()->intended('/');
        }

        return back()->withErrors(['phone' => 'User not found.']);
    }

    \Log::error('OTP verification failed', [
        'session_id' => $sessionId,
        'phone' => $phone,
        'otp' => $otp,
        'response' => $verifyResponse->body()
    ]);

    return back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
}
}
