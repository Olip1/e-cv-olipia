<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CvController extends Controller
{
    /**
     * Display the interactive E-CV website.
     */
    public function index()
    {
        $cv = config('cv');
        return view('cv.index', compact('cv'));
    }

    /**
     * Display the print-friendly clean A4 CV.
     */
    public function print()
    {
        $cv = config('cv');
        return view('cv.print', compact('cv'));
    }

    /**
     * Handle incoming contact form messages.
     */
    public function contact(Request $request)
    {
        $validated = $request->validate([
            'sender_name' => 'required|string|max:100',
            'sender_email' => 'nullable|email|max:100',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:1000',
            'direct_whatsapp' => 'nullable|boolean',
        ]);

        if ($request->boolean('direct_whatsapp')) {
            $text = "Halo Olipia, saya {$validated['sender_name']} (" . ($validated['sender_email'] ?? 'No Email') . ").\n"
                  . "Perihal: {$validated['subject']}\n\n"
                  . "Pesan:\n{$validated['message']}";
            
            $waUrl = 'https://wa.me/6285879042470?text=' . urlencode($text);
            return redirect()->away($waUrl);
        }

        return back()->with('success', 'Terima kasih, pesan Anda berhasil dikirimkan! Olipia akan segera membalas melalui email atau WhatsApp.');
    }
}

