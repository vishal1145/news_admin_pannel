<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Neighbour;

class NeighbourController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([]);

        $tid = $request->input('tid');

        $isEdit = $tid != -1;

        if ($isEdit) {
            $student = Neighbour::findOrFail($tid);
            $student->source = $request->input('source');
            $student->target = $request->input('target');
            $student->save();
        } else {
            $image = new Neighbour;
            $image->source = $request->input('source');
            $image->target = $request->input('target');
            $image->save();
        }
        $text = $isEdit ? 'edited' : 'added';
        return redirect()->route('login-example')->with('success', 'Neighbour has been ' . $text . ' successfully');
    }

    public function destroy(Neighbour $result)
    {
        $result->delete();
        return redirect()->route('login-example')->with('success', 'Neighbour has been deleted successfully');
    }
}
