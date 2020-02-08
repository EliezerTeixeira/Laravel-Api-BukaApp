<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Topic;

class TopicController extends Controller
{
    public function getAllTopics(){

        $topics = Topic :: paginate(30);

        return response()->json($topics);
    }

    public function addNewTopic(Request $request){
        $topics = new Topic();
        $topics->name = $request['name'];
        $topics->description = $request['description']->nullable();
        $topics->course_id = $request['course_id']->unique();
        $topics->phone = $request['phone']->unique();
        $topics->save();
    
        return response()->json([
    
            'status_code' => 201,
            'message' => 'Topic created sucessfuly',
            'data' => $topics
        ]);
    }
}
