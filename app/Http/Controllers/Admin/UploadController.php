<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $image->storeAs('products/tmp/' . $folder, $fileName);

            TemporaryFile::create([
                'folder' => $folder,
                'file_name' => $fileName
            ]);


            return $folder;
        }

        return 'no data';
    }

    public function delete()
    {
        $tmp_file = TemporaryFile::where('folder', request()->getContent())->first();

        if ($tmp_file) {
            Storage::deleteDirectory('products/tmp/' . $tmp_file->folder);
            $tmp_file->delete();

            return response('');
        }
    }
}
