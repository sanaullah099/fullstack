<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class authorController extends Controller
{
    public function getAuthor(){
        $author=Author::all();
        return response()->json(['error'=>false, 'message'=> 'Author List', 'data'=> $author],200);
    }

    public function storeAuthor(Request $request)
    {
        $uploadedFile = $request->file('img');
        $filename = time().$uploadedFile->getClientOriginalName();
  
        Storage::disk('local')->putFileAs(
          'uploads/'.$filename,
          $uploadedFile,
          $filename
        );
  
        $upload = new Author;
        $upload->name= $request->name;
        $upload->image = $filename;
        
        
  
        $upload->save();
      }


        // $request->validate([
        //     'name'=>'required',
        //     'file'=>'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf'
        // ]);
        // $author= new Author();
        // if($request->file()){
        //     $file_name=time().'_'.$request->file->getClientOriginalName();
        //     $file_path=$request->file('file')->storeAs('uploads', $file_name, 'public');
        //     $author->name=$request->name;
        //     $author->image = '/storage/' . $file_path;
        //     $author->save();
        //     return response()->json(['error'=> false, 'message'=>'Author Store Successfully', 'data'=>$author], 201);

        // }
        //dd($request->file('img'),$request->name);
        
        
        // return response()->json(['error'=> false, 'message'=>'Author Store Successfully', 'data'=>$author], 201);
    public function updateAuthor($authores, Request $request){
        $authors=Author::find($authores);
        //dd($request->all());
        if(!$authors){
            return response()->json(['error'=>false, 'message'=>'Author does not exist', 'data'=>$authors]);
        }else{
        $authorup = Author::where('id', $authors->id)->first();
        $authorup->name = $request->name;
        $authorup->save();
        return response()->json(['error'=>false, 'message'=>'Author Updated successfully', 'data'=>$authorup]);
        }

    }
    public function delete($author){
        $authors=Author::find($author);
        if($authors){
            $authors->delete();
            return response()->json(['error'=> false, 'message'=>'Author Deleted Successfully', 'data'=>$authors]);
        }else{
            return response()->json(['error'=> false, 'message' =>'Author Does not Exist', 'data'=>$authors]);
        }
    }

}
