<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'comment' => 'required|string|max:255',
            ]);

            Log::info('Comment Request:', $request->all()); // Log the request

            if (Auth::check()) {
                // Create a new comment in the database
                $comment = Comment::create([
                    'user_id' => Auth::id(),  // Get the logged-in user ID
                    'comment' => $request->input('comment'),
                ]);

                // Return a JSON response with the newly created comment
                return response()->json([
                    'message' => 'Comment added successfully!',
                    'username' => Auth::user()->name, // Display logged-in user's name
                    'comment' => $comment->comment,
                ], 200);
            }

            return response()->json(['message' => 'You must be logged in to comment.'], 401);
        } catch (\Exception $e) {
            Log::error('Error adding comment: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred.'], 500);
        }
    }

    public function index()
    {
        // Fetch comments along with the associated user's username
        $comments = Comment::with('user:id,username')  // Ensure 'user' relationship exists
            ->latest()
            ->paginate(10);  // Paginate comments

        return view('pages.comment', ['comments' => $comments]);
    }

    
}
