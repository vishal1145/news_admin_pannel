<?php

namespace App\Http\Controllers;

use App\Models\HeaderNews;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public $header;

    public function uploadimage(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        if ($request->hasFile('upload')) {
            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);
            $url = url('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    public function store(Request $request)
    {

        $request->validate([
            // 'Type' => 'required',
            // 'sno' => 'required',
            // 'employee' => 'required',
            // 'designation' => 'required',
            // 'qualification' => 'required',
            // 'department' => 'required',
        ]);

        $tid = $request->input('tid');
        $isEdit = $tid != -1;

        if ($isEdit) {
            $news = HeaderNews::findOrFail($tid);
            $news->display_title = $request->input('display_title');
            $news->publish_status = $request->has('publish_status');
            $news->domain_id = $request->input('domain_id');
            $news->category_id = $request->input('category_id');
            $news->domain_name = $request->input('domain_name');
            $news->Slug = $request->input('Slug');
            $news->Title = $request->input('Title');
            if ($request->hasfile('photos')) {
                $file = $request->file('photos');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extenstion;
                $file->move('storage/', $filename);
                $news->photos = $filename;
            }
            // else {
            //     $news['photos'] = null;
            // }
            $news->Date = $request->input('Date');
            $news->Name = $request->input('Name');
            $news->SubCatName = $request->input('SubCatName');
            $news->youtube = $request->input('youtube');
            $news->tags = json_encode($request->input('tags'));
            $news->Display_in_front = $request->has('Display_in_front');
            $news->Content = $request->input('Content');
            $news->save();
        } else {
            $image = new HeaderNews;
            $image->display_title = $request->input('display_title');
            $image->publish_status = $request->has('publish_status');
            $image->domain_id = $request->input('domain_id');
            $image->category_id = $request->input('category_id');
            $image->domain_name = $request->input('domain_name');
            $image->Slug = $request->input('Slug');
            $image->Title = $request->input('Title');
            if ($request->hasfile('photos')) {
                $file = $request->file('photos');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extenstion;
                $file->move('storage/', $filename);
                $image->photos = $filename;
            }
            // else {
            //     $image['photos'] = null;
            // }
            $image->Date = $request->input('Date');
            $image->Name = $request->input('Name');
            $image->SubCatName = $request->input('SubCatName');
            $image->youtube = $request->input('youtube');

            $image->tags = json_encode($request->input('tags'));

            $image->Display_in_front = $request->has('Display_in_front');
            $image->Content = $request->input('Content');
            $image->save();
        }

        //return redirect()->route('forms')->with('success','News has been added successfully.');
        $text = $isEdit ? 'edited' : 'added';
        return redirect()->route('500')->with('success', 'Header News has been ' . $text . ' successfully');
    }

    public function destroy(HeaderNews $header)
    {
        $header->delete();
        return redirect()->route('500')->with('success', 'Header News has been deleted successfully');
    }
}
