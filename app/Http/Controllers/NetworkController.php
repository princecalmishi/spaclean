<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Network_Profiles;
use Auth;
use Session;
use Illuminate\Support\Facades\Response;


class NetworkController extends Controller
{
    //
    public function index()
    {
        $id = Auth()->user()->id;
        $row = Network_Profiles::where('user_id',$id)->get();
        //$data = Network_profiles::where('user_id',$id)->get();
        $userprof = Network_profiles::where('user_id',$id)->pluck('Profile_image');
        foreach($userprof as $userprof)

        $outgoing_id = Network_profiles::where('user_id',$id)->pluck('unique_id');
        foreach($outgoing_id as $outgoing_id)
        
        $users = Network_Profiles::where('unique_id', '!=', $outgoing_id)->orderBy('user_id', 'DESC')->get();
        
        $output = "";
        
        if ($users->count() == 0) {
            $output .= "No users are available to chat";
        } elseif ($users->count() > 0) {
            foreach ($users as $user) {
                $messages = Message::where(function ($query) use ($user, $outgoing_id) {
                        $query->where('incoming_msg_id', $user->unique_id)
                              ->orWhere('outgoing_msg_id', $user->unique_id);
                    })
                    ->where(function ($query) use ($user, $outgoing_id) {
                        $query->where('outgoing_msg_id', $outgoing_id)
                              ->orWhere('incoming_msg_id', $outgoing_id);
                    })
                    ->orderBy('msg_id', 'DESC')
                    ->limit(1)
                    ->get();
        
                if ($messages->count() > 0) {
                    $message = $messages->first();
                    $result = $message->msg;
                } else {
                    $result = "No message available";
                }
        
                $msg = (strlen($result) > 28) ? substr($result, 0, 28) . '...' : $result;
        
                $you = "";
                if ($messages->count() > 0 && isset($message->outgoing_msg_id)) {
                    $you = ($outgoing_id == $message->outgoing_msg_id) ? "You: " : "";
                }
        
                $offline = ($user->status == "Offline now") ? "offline" : "";
                $hid_me = ($outgoing_id == $user->unique_id) ? "hide" : "";
        
                $output .= '<a href="'. route('chat', ['user_id' => $user->unique_id]) .'">
                                <div class="content">
                                    <img src="/storage/images/' . $user->Profile_image . '" alt="">
                                    <div class="details">
                                        <span>' . $user->Name .'</span>
                                        <p>' . $you . $msg . '</p>
                                    </div>
                                </div>
                                <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                            </a>';
            }
        }
        
        // echo $output;
        


        return view('network.index',compact('output','userprof','id','outgoing_id'));
    }

    public function chat($user_id)
    {

        Session::put('user_id', $user_id);
        $user_id1234 = $user_id;
        $userprof = Network_profiles::where('unique_id', $user_id)->pluck('Profile_image');
        foreach ($userprof as $userprof) ;
    
        $userprofname = Network_profiles::where('unique_id', $user_id)->pluck('Name');
        foreach ($userprofname as $userprofname) ;
    
        return view('network.chat', compact('userprofname', 'userprof', 'user_id','user_id1234'));
    }
    public function getMessages(Request $request)
    {
        $userid = Auth::id();
        $uniqid = Network_Profiles::where('user_id',$userid)->pluck('unique_id');
        foreach($uniqid as $uniqid)

        $outgoing_id = $uniqid;
        $incoming_id = Session::get('user_id');
    
        $messages = Message::leftJoin('network_profiles', 'network_profiles.unique_id', '=', 'messages.outgoing_msg_id')
            ->where(function ($query) use ($outgoing_id, $incoming_id) {
                $query->where('outgoing_msg_id', $outgoing_id)
                    ->where('incoming_msg_id', $incoming_id);
            })
            ->orWhere(function ($query) use ($outgoing_id, $incoming_id) {
                $query->where('outgoing_msg_id', $incoming_id)
                    ->where('incoming_msg_id', $outgoing_id);
            })
            ->orderBy('msg_id')
            ->get();
    
        $output = "";
    
        if ($messages->count() > 0) {
            foreach ($messages as $row) {
                if ($row->outgoing_msg_id == $outgoing_id) {
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $row->msg .'</p>
                                    </div>
                                </div>';
                } else {
                    $output .= '<div class="chat incoming">
                                    <img src="/storage/images/'. $row->Profile_image .'" alt="image">
                                    <div class="details">
                                        <p>'. $row->msg .'</p>
                                    </div>
                                </div>';
                }
            }
        } else {
            $output .= '<div class="text">No messages are available. Once you send a message, it will appear here.</div>';
        }

    
        return response()->json($output);
    }
        

    public function getMessagesworking(Request $request)
    {
        $userid = Auth::id();
        $uniqid = Network_Profiles::where('user_id',$userid)->pluck('unique_id');
        foreach($uniqid as $uniqid)

        $outgoing_id = $uniqid;
        $incoming_id = Session::get('user_id');
    
        $messages = Message::leftJoin('network_profiles', 'network_profiles.unique_id', '=', 'messages.outgoing_msg_id')
            ->where(function ($query) use ($outgoing_id, $incoming_id) {
                $query->where('outgoing_msg_id', $outgoing_id)
                    ->where('incoming_msg_id', $incoming_id);
            })
            ->orWhere(function ($query) use ($outgoing_id, $incoming_id) {
                $query->where('outgoing_msg_id', $incoming_id)
                    ->where('incoming_msg_id', $outgoing_id);
            })
            ->orderBy('msg_id')
            ->get();
    
        return Response::json($messages);
    }
    


    public function insertMessage(Request $request)
    {
        $userid = Auth::id();
        $incoming_id = Session::get('user_id');

        $uniqid = Network_Profiles::where('user_id',$userid)->pluck('unique_id');
        foreach($uniqid as $uniqid)

       $incomingId = $request->input('incoming_id');
       $outgoingId = $uniqid;
       $message = $request->input('message');

       // Insert data into the messages table
       $post = new Message;        
        $post->incoming_msg_id = $incoming_id;
        $post->outgoing_msg_id = $uniqid;
        $post->msg = $request->input('message');
        $post->save();

       return response()->json(['status' => 'success']);
    }

    public function searchUsers(Request $request)
    {
        $outgoing_id = Network_Profiles::where('user_id',$userid)->pluck('unique_id');
        foreach($outgoing_id as $outgoing_id)

        $searchTerm = $request->input('searchTerm');

        $users = Network_Profiles::where('unique_id', '!=', $outgoing_id)
            ->where(function ($query) use ($searchTerm) {
                $query->where('Name', 'LIKE', '%' . $searchTerm . '%');
                     
            })
            ->get();

        $output = "";

        if ($users->count() > 0) {
            // Assuming "data.php" includes a Blade partial to render user data
            $output = route('network', compact('users'))->render();
        } else {
            $output = 'No user found related to your search term';
        }

        return response()->json(['output' => $output]);
    }


    
}
