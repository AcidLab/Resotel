<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    
    public function addComment (Request $request)
    {
    	$content = $request->input('content');
    	$hotel_id = $request->input('hotel_id');
    	$agency_id = $request->input('agency_id');

    	$comment = new Comment;
    	$comment->content=$content;
    	$comment->hotel_id=$hotel_id;
    	$comment->agency_id=$agency_id;
    	//$comment = Comment::create([
    		//'content'=> $content, 'hotel_id'=> $hotel_id, 'agency_id'=>$agency_id
    	//]);
    	$comment->save();

    	return $comment;
 	}

    public function showCommentsById(Request $request)
    {

		$id = $request->input('hotel_id');
    	$comments = Comment::where('hotel_id',$id)->get();
    	return $comments;
    }

    public function deleteComment(Request $request)
    {	

    	$id = $request->input('id');
    	$comment = Comment::find($id);
    	$comment -> delete();

    	return 'ok';
    }
}
