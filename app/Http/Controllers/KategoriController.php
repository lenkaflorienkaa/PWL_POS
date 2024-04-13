<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KategoriController extends Controller
{
    /**
     * Show the form to create a new post.
     */
    public function create(): View
    {
        return view('kategori.create');
    }

    /**
     * Store a new post.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'kategori_kode' => 'bail|required',
            'kategori_nama' => 'required',
        ]);

        // The post is valid...
        return redirect('/kategori');
    }
}

