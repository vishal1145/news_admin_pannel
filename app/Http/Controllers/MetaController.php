<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meta;

class MetaController extends Controller
{
    public function store(Request $request)
    {

        $tid = $request->input('tid');

        $isEdit = $tid != -1;


        if ($isEdit) {
            $student = Meta::findOrFail($tid);
            $student->domain_id = $request->input('domain_id');
            $student->facebook = $request->input('facebook');
            if ($request->hasFile('favicon')) {
                $faviconFile = $request->file('favicon');
                $faviconExtension = $faviconFile->getClientOriginalExtension();
                $faviconFilename = time() . '.' . $faviconExtension;
                $faviconFile->move('storage/', $faviconFilename);
                $student->favicon = $faviconFilename;
            }
            $student->desc = $request->input('desc');
            $student->twitter = $request->input('twitter');
            if ($request->hasFile('image')) {
                $imageFile = $request->file('image');
                $imageExtension = $imageFile->getClientOriginalExtension();
                $imageFilename = time() . '.' . $imageExtension;
                $imageFile->move('storage/', $imageFilename);
                $student->image = $imageFilename;
            }
            $student->author = $request->input('author');
            $student->instagram = $request->input('instagram');
            $student->title = $request->input('title');
            $student->keyword = $request->input('keyword');
            $student->pinterest = $request->input('pinterest');
            $student->youtube = $request->input('youtube');
            $student->analytics_id = $request->input('analytics_id');
            $student->adsense_id = $request->input('adsense_id');
            $student->punchline = $request->input('punchline');
            $student->punchdesc = $request->input('punchdesc');
            $student->who_we_are = $request->input('who_we_are');
            $student->design = $request->input('design');
            $student->company = $request->input('company');
            $student->how_we_help = $request->input('how_we_help');
            $student->privacy = $request->input('privacy');
            $student->terms = $request->input('terms');
            $student->facebook_id = $request->input('facebook_id');
            if ($request->hasFile('punchlogo')) {
                $imageFile = $request->file('punchlogo');
                $imageExtension = $imageFile->getClientOriginalExtension();
                $imageFilename = time() . '.' . $imageExtension;
                $imageFile->move('storage/', $imageFilename);
                $student->punchlogo = $imageFilename;
            }
            if ($request->hasFile('hover_image')) {
                $imageFile = $request->file('hover_image');
                $imageExtension = $imageFile->getClientOriginalExtension();
                $imageFilename = time() . '.' . $imageExtension;
                $imageFile->move('storage/', $imageFilename);
                $student->hover_image = $imageFilename;
            }
            $student->save();
            $student->save();
        } else {
            $image = new Meta;
            $image->domain_id = $request->input('domain_id');
            $image->facebook = $request->input('facebook');
            if ($request->hasFile('favicon')) {
                $faviconFile = $request->file('favicon');
                $faviconExtension = $faviconFile->getClientOriginalExtension();
                $faviconFilename = 'favicon-'.time() . '.' . $faviconExtension;
                $faviconFile->move('storage/', $faviconFilename);
                $image->favicon = $faviconFilename;
            }
            $image->desc = $request->input('desc');
            $image->twitter = $request->input('twitter');
            if ($request->hasFile('image')) {
                $imageFile = $request->file('image');
                $imageExtension = $imageFile->getClientOriginalExtension();
                $imageFilename = 'image-'.time() . '.' . $imageExtension;
                $imageFile->move('storage/', $imageFilename);
                $image->image = $imageFilename;
            }
            $image->author = $request->input('author');
            $image->instagram = $request->input('instagram');
            $image->title = $request->input('title');
            $image->keyword = $request->input('keyword');
            $image->pinterest = $request->input('pinterest');
            $image->youtube = $request->input('youtube');
            $image->analytics_id = $request->input('analytics_id');
            $image->adsense_id = $request->input('adsense_id');
            $image->punchline = $request->input('punchline');
            $image->punchdesc = $request->input('punchdesc');
            $image->who_we_are = $request->input('who_we_are');
            $image->design = $request->input('design');
            $image->company = $request->input('company');
            $image->how_we_help = $request->input('how_we_help');
            $image->privacy = $request->input('privacy');
            $image->terms = $request->input('terms');
            $image->facebook_id = $request->input('facebook_id');

            if ($request->hasFile('punchlogo')) {
                $imageFile = $request->file('punchlogo');
                $imageExtension = $imageFile->getClientOriginalExtension();
                $imageFilename = 'punchlogo-'.time() . '.' . $imageExtension;
                $imageFile->move('storage/', $imageFilename);
                $image->punchlogo = $imageFilename;
            }
            $image->save();
        }

        //return redirect()->route('forms')->with('success','Teacher has been added successfully.');
        $text = $isEdit ? 'edited' : 'added';
        return redirect()->route('typography')->with('success', 'DomainMeta has been ' . $text . ' successfully');
    }

    public function destroy(Meta $live)
    {
        $live->delete();
        return redirect()->route('typography')->with('success', 'DomainMeta has been deleted successfully');
    }

    
}
