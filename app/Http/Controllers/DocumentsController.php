<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use Illuminate\Support\Facades\Storage;
class DocumentsController extends Controller
{

    public function isleUpdate(Request $request){
        return $request;

    }

    public function search(Request $request){
        $documents = Document::where('title',$request->search)->get();
        return view('pages.admin.searchDocuments')->with('documents',$documents);

    }

    public function adminLife(){
        $documents = Document::where('department','Life')->orderBy('created_at','DESC')->get();
        return view('pages.admin.dashboard')->with('documents',$documents);
    }
    public function adminNonLife(){
        $documents = Document::where('department','Non-Life')->orderBy('created_at','DESC')->get();
        return view('pages.admin.dashboard')->with('documents',$documents);
    }

    public function nonLive(){
        $documents = Document::where('department','Non-Life')->get();
        return view('pages.non-live.nonLiveDashboard')->with('documents',$documents);
    }
    public function live(){
        $documents = Document::where('department','Life')->get();
        return view('pages.live.liveDashboard')->with('documents',$documents);
    }


    public function store(Request $request){

        $extension = $request->file->extension();
        $originalName = $request->file->getClientOriginalName();
        if($extension == 'pdf'){
            $data = new Document;
            if($request->file('file')){
                $file = $request->file('file');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $request->file('file')->move('storage/',$filename);
                $data->file=$filename;
            }
            $data->department = $request->dept;
            $data->branch = $request->branch;
            $data->title = $request->title;
            $data->description = $request->desc;
            $data->folder = $request->folder;
            $data->file_name = $originalName;
            $data->save();
            return back()->with('success','File Uploaded Successfully');
        }else{
            return back()->with('error','Please Upload PDF file');
        }
       
    }




    #temporary funtionalities
    public function folder1(){
        $documents = Document::where('folder','folder_1')->get();
        return view('pages.folder1_main')->with('documents',$documents);
    }

    public function show($id){
        $document = Document::where('title',$id)->get();
        return view('pages.folder1_show_doc')->with('document',$document);
    }
    
    public function download($file){
        return response()->download('storage/'.$file);
    }

    

    public function update(Request $request){
        
        $id = $request->id;
        $old = $request->old_file;
        
        if($request->file != null){
            unlink(public_path('storage\\'.$old));
            $extension = $request->file->extension();
            $originalName = $request->file->getClientOriginalName();
            if($extension == 'pdf'){
                $document = Document::find($id);
                if($request->file('file')){
                    $file = $request->file('file');
                    $filename = time().'.'.$file->getClientOriginalExtension();
                    $request->file('file')->move('storage/',$filename);
                    $document->file=$filename;
                }
                $document->title = $request->title;
                $document->description = $request->desc;
                $document->folder = $request->folder;
                $documet->file_name = $originalName;
                $document->save();
                return back()->with('success','File Updated Successfully');
            }else{
                return back()->with('error','Please Upload PDF file');
            }
        }else{
            $document = Document::find($id);
            $document->title = $request->title;
            $document->description = $request->desc;
            $document->folder = $request->folder;
            $document->save();
            return back()->with('success','File Updated Successfully');
        }
        
        
    }


    public function folder2(){
        $documents = Document::where('folder','folder_2')->get();
        return view('pages.folder2.folder2Document')->with('documents',$documents);
    }

}
