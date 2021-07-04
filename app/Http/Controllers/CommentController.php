<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required',
            'score' => 'required',
            'movie_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'code' => 2
            ]);
        }

        $comment = new Comment([
            'movie_id' => $request->movie_id,
            'comment' => $request->comment,
            'score' => $request->score
        ]);

        $user = Auth::user();
        // $user = User::where('id', $user_id)->get();
        
        if ($user->comments()->save($comment)) {
            session()->flash('add_comment_success', 'เพิ่มความคิดเห็นของคุณสำเร็จเเล้ว');
            return response()->json([
                'status' => 'success',
                'code' => 0
            ]);
        } else {
            return response()->json([
                'status' => 'fail',
                'code' => 1
            ]);
        }
        
    }
}
