<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Carbon\Carbon;

class ImageController extends Controller
{

    /**
     * Summary of store
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function store(Request $request)
    {
        $image = new Image;
        if ($request->input('Title')) {
            $image->Title = $request->Title;
        } else {
            return response("* This field is required.");
        }

        if ($request->hasFile('Image')) {
            $OriginalName = $request->file('Image')->getClientOriginalName();
            $NewName = Carbon::now()->timestamp . '_' . $OriginalName;
            $toFolder = './gallery/' . $request->input('photogallery_id') . '/images/';
            $request->file('Image')->move($toFolder, $NewName);

            $image->ImagePath = ltrim($toFolder,'.' ) . $NewName;

            $image->save();

            $data = [
                'record' => $image,
                'message' => 'The image has been saved successfully.',
            ];

            return response()->json($data, 200);
        } else {
            return response("* This field is required.");
        }



    }

    /**
     * Summary of show
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $image = Image::find($id);
        return response()->json($image, 200);
    }
    /**
     * Summary of update
     * @param Request $request
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $image = Image::where('id','=', $id);
        if ($request->input('Title')) {
            $image->Title = $request->Title;
        }

        if ($request->hasFile('Image')) {
            $OriginalName = $request->file('Image')->getClientOriginalName();
            $NewName = Carbon::now()->timestamp . '_' . $OriginalName;
            $toFolder = './gallery/' . $request->input('photogallery_id') . '/images/';
            $request->file('Image')->move($toFolder, $NewName);

            $image->ImagePath = ltrim($toFolder, '.') . $NewName;

            $image->save();

            $data = [
                'record' => $image,
                'message' => 'The image has been updated successfully.',
            ];

            return response()->json($data, 200);
        }
    }

    public function destroy($id)
    {
        $image = Image::where('id', '=', $id)->first();
        $image->delete();
        return response('The image has been deleted successfully.');
    }

}
