<?php

// app/Http/Controllers/PageController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; 


class PageController extends Controller
{
    public function home()
    {
        return view('home'); 
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:500',
        ]);

        

        Mail::raw($validated['message'], function ($message) use ($validated) {
            $message->to('admin@mywebsite.com')
                    ->subject('New Contact Us Message')
                    ->from($validated['email'], $validated['name']);
        });

        return redirect()->route('contact')->with('success', 'Thank you for contacting us!');
    }
    
}

