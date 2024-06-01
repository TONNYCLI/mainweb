<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DataFeed;
use App\Models\photo;
use App\Models\photosCategory;

use Illuminate\Http\Request;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;






class photosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $photos = photo::get();



        return view('pages/dashboard/photos', compact('photos'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = photosCategory::all();

        return view('pages/dashboard/newphoto', compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $request->validate([
            'photosCategories_id' => 'required|exists:photosCategories,id',
            'title' => 'required',
            'details' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,mp4,mov,avi',
        ]);



        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/' . $fileName;

            $file->move(public_path('uploads'), $fileName);


        $media = new photo();
        $media->photoscategories_id = $request->input('photosCategories_id');
        $media->title = $request->input('title');
        $media->details = $request->input('details');
        $media->file_path = $filePath;
        $media->type = $file->getClientOriginalExtension() === 'mp4' || $file->getClientOriginalExtension() === 'mov' || $file->getClientOriginalExtension() === 'avi' ? 'video' : 'photo';
        $media->save();

        return back()->with('success', 'File uploaded successfully');
        }

        return back()->with('error', 'File upload failed');

    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $photo = photo::FindOrFail($id);

        $category = photosCategory::all();



        return view('pages/dashboard/editphoto', compact('photo', 'category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $delImage = photo::FindOrFail($id);

        $request->validate([
            'photosCategories_id' => 'required|exists:photosCategories,id',
            'title' => 'required',
            'details' => 'required',
        ]);



        if ($request->hasFile('image')) {

            if (file_exists(public_path($delImage->file_path))) {
                unlink(public_path($delImage->file_path));
            }

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/' . $fileName;

            $file->move(public_path('uploads'), $fileName);



        $delImage->photoscategories_id = $request->input('photosCategories_id');
        $delImage->title = $request->input('title');
        $delImage->details = $request->input('details');
        $delImage->file_path = $filePath;
        $delImage->type = $file->getClientOriginalExtension() === 'mp4' || $file->getClientOriginalExtension() === 'mov' || $file->getClientOriginalExtension() === 'avi' ? 'video' : 'photo';
        $delImage->update();

        return back()->with('success', 'File uploaded successfully');
        }else{
            $delImage->photoscategories_id = $request->input('photosCategories_id');
            $delImage->title = $request->input('title');
            $delImage->details = $request->input('details');
            $delImage->update();

            return back()->with('success', 'File uploaded successfully');

        }

        return back()->with('error', 'File update failed');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = photo::FindOrFail($id);

        $delete->delete();
        return back()->with('success', 'File delete successfully');

    }
}
