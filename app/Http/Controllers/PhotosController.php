<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PhotosController extends Controller
{
    public function index()
    {
        return view('photos');
    }

    public function create(Request $request, $id)
    {
        $validated = $request->validate([
            'image' => 'string'
        ]);


        $user = User::find($id);

        $user->addMediaFromBase64($validated['image'])->toMediaCollection('photos');

        return $user;

    }

    public function destroy(Request $request)
    {
        return $request;
        // Media::where('id');
    }
    
    
}
