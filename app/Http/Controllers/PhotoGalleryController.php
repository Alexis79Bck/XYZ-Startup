<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use App\Models\Image;


class PhotoGalleryController extends Controller
{
    /**
     * Summary of getAllGalleries
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $galleries = PhotoGallery::all();

        return response()->json($galleries, 200);
    }

    /**
     * Summary of getGallery
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id) {
        $gallery = PhotoGallery::find($id);
        return response()->json($gallery, 200);
    }

    /**
     * Summary of getImagesCollection
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getImagesCollection($id){
        $gallery = PhotoGallery::find($id);
        $imageCollection = $gallery->imagesCollection()->get();

        return response()->json($imageCollection, 200);
    }

    public function store(Request $request)
    {
        $gallery = new PhotoGallery;
        if ($request->input('Name')) {
            $gallery->Name = $request->Name;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('Type')) {
            $gallery->Type = $request->Type;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('Model_id')) {
            $gallery->Model_id = $request->Model_id;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('Model_Type')) {
            $gallery->Model_Type = $request->Model_Type;
        } else {
            return response("* This field is required.");
        }


        $gallery->save();

        $data = [
            'record' => $gallery,
            'message' => 'The gallery has been saved successfully.',
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $gallery = PhotoGallery::where('id', '=', $id)->first();

        if ($request->input('Name')) {
            $gallery->Name = $request->Name;
        }

        if ($request->input('Type')) {
            $gallery->Type = $request->Type;
        }

        if ($request->input('Model_id')) {
            $gallery->Model_id = $request->Model_id;
        }

        if ($request->input('Model_Type')) {
            $gallery->Model_Type = $request->Model_Type;
        }

        $gallery->save();

        $data = [
            'record' => $gallery,
            'message' => 'The gallery has been updated successfully.',
        ];
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $gallery = PhotoGallery::where('id', '=', $id)->first();
        $gallery->delete();
        return response('The gallery has been deleted successfully.');
    }


}
