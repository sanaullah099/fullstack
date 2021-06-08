<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Contact;

class contactController extends Controller
{
    public function getContact(){
    	$contacts= Contact::all();
        //dd($contacts);
    	return response()->json(['error'=>false,'message'=>'contact list','data'=>$contacts],200);
    }
    public function createContact(Request $request){
    	$contact=new Contact();
    	$contact->name=$request->name;
    	$contact->email=$request->email;
    	$contact->contact_no=$request->contact;
    	$contact->bio=$request->bio;
    	$contact->designation=$request->designation;
    	$contact->save();
    	return response()->json(['error'=>false,'message'=>'Contact created successfully','data'=>$contact],201);

    }
    public function delete($contact){
    	$contact=Contact::find($contact);
    	if($contact){
    		$contact->delete();
    		return response()->json(['error'=>false,'message'=>'Contact deleted successfully','data'=>$contact],200);
    	}else{
    			return response()->json(['error'=>false,'message'=>'Contact not exists','data'=>$contact],404);
    	}
    }
    public function update($contact,Request $request){
    	$contacts=Contact::find($contact);
    	if(!$contacts){
    			return response()->json(['error'=>false,'message'=>'Contact not exists','data'=>$contacts],404);
    	}


    	$contactap=Contact::where('id',$contacts->id)->first();
    	$contactap->name=$request->name;
    	$contactap->email=$request->email;
    	$contactap->contact_no=$request->contact;
    	$contactap->bio=$request->bio;
    	$contactap->designation=$request->designation;
    	$contactap->save();
    	return response()->json(['error'=>false,'message'=>'Contact updated successfully','data'=>$contactap],200);
    }

    public function showContact(Request $request, $id){
        $contacts=Contact::find($id);
        return response()->json(['error'=>false, 'message'=>'details of contact', 'data'=>$contacts], 200);
    }
}
