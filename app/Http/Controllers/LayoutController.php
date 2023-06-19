<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Layout;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([]);

        $tid = $request->input('tid');

        $isEdit = $tid != -1;


        if ($isEdit) {
            $student = Layout::findOrFail($tid);
            $student->Display_in_layout = $request->input('Display_in_layout');

            if ($request->hasfile('icon')) {
                $file = $request->file('icon');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extenstion;
                $file->move('storage/', $filename);
                $student->icon = $filename;
            }
            $student->slug = $request->input('slug');
            $student->save();
        } else {
            $image = new Layout;
            $image->Display_in_layout = $request->input('Display_in_layout');
            if ($request->hasfile('icon')) {
                $file = $request->file('icon');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extenstion;
                $file->move('storage/', $filename);
                $image->icon = $filename;
            }
            $image->slug = $request->input('slug');
            $image->save();
        }

        //return redirect()->route('forms')->with('success','Teacher has been added successfully.');
        $text = $isEdit ? 'edited' : 'added';
        return redirect()->route('lock')->with('success', 'Layout has been ' . $text . ' successfully');
    }

    public function destroy(Layout $layout)
    {
        $layout->delete();
        return redirect()->route('lock')->with('success', 'Layout has been deleted successfully');
    }
}
