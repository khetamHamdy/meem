<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Block;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Auth;
use Image;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatUsers;
use App\Models\ChatFreeze;
use App\Models\Product;
use App\Models\Order;
use App\Models\ChatMessages;
use App\Models\ChatMessageDelete;
use App\Models\Setting;
use App\Models\Token;
use Throwable;


class ChatController extends Controller
{
    protected $paginateTotal = '';

    public function __construct()
    {
        $settings = Setting::orderBy('id', 'desc')->first();
        $this->paginateTotal = $settings->paginateTotal;
    }

    public function blcokUser($blockUser_id)
    {

        $user_id = \Illuminate\Support\Facades\Auth::guard('api')->id();
        if (Block::where('user_id', auth('api')->id())->where('blockUser_id ', $blockUser_id)->exists()) {
            $message = __('api.whoops');
            return response()->json(['status' => false, 'code' => 200, 'message' => $message]);
        } else {
            $block = new Block();
            $block->user_id = $user_id;
            $block->blockUser_id = $blockUser_id;
            $block->save();
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message]);
        }
        $message = __('api.you_must_pay');
        return response()->json(['status' => false, 'code' => 200, 'message' => $message]);
    }

    public function unblcokUser($blockUser_id)
    {
        $user_id = auth('api')->user()->id;

        if (Block::where('user_id', $user_id)->where('blockUser_id', $blockUser_id)->exists()) {
            Block::where('user_id', $user_id)->where('blockUser_id', $blockUser_id)->delete();
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message]);
        } else {
            $message = __('api.not_found');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message]);
        }
    }

    public
    function getBlcokUser()
    {
        $user_id = auth('api')->user()->id;
        $item = auth('api')->user();
        $blockUser_id = $item->blocks->pluck('blockUser_id')->toArray();
        $block_users = User::whereIn('id', $blockUser_id)->get();

        if (!$block_users) {
            $message = __('api.whoops');
            return response()->json(['status' => false, 'code' => 200, 'message' => $message]);
        } else {

            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'data' => $block_users]);

        }
    }

    public
    function getNotifications()
    {
        $user = auth('api')->user();
        $get_notifications = $user->notifications()->get()->makeHidden(['id', 'type', 'notifiable_type', 'notifiable_id', 'read_at', 'updated_at']);
        $count_notifications = $user->unreadNotifications()->count();

        if (!$get_notifications) {
            $message = __('api.whoops');
            return response()->json(['status' => false, 'code' => 200, 'message' => $message]);
        } else {
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'data' => $get_notifications, 'count unread notifications' => $count_notifications]);
        }
    }

    public function chatsList(Request $request)
    {
        $user = auth('api')->user();
        $blockUser_id = $user->blocks->pluck('blockUser_id')->toArray();

        $chatsIds1 = Chat::where(['user1' => auth('api')->id()])->whereNotIn('user1', $blockUser_id)
            ->where('user_deleted', '!=', auth('api')->id())->pluck('id')->toArray();

        $chatsIds2 = Chat::where('user2', auth('api')->id())->whereNotIn('user2', $blockUser_id)
            ->where('user_deleted', '!=', auth('api')->id())->pluck('id')->toArray();

        $array = array_unique(array_merge($chatsIds1, $chatsIds2));


        $allUnSeenMsgs = ChatMessages::whereIn('chat_id', $array)
            ->where('sender_id', '!=', auth('api')->id())
            ->where('seen', 0)->count();

        $chats = Chat::whereIn('id', $array)->where('user_deleted', '!=', auth('api')->id())
            ->orderByDesc('last_used')
            ->paginate($this->paginateTotal)->items();

        $is_more = ($this->paginateTotal > count($chats)) ? false : true;
//        updateFirebaseChat('reset', auth('api')->id());
        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => '', 'chats' => $chats, 'unSeenCount' => $allUnSeenMsgs, 'is_more' => $is_more]);
    }

    public function checkChat($user_id)
    {
        $chatsIds = Chat::where('user1', auth('api')->id())->where('user2', $user_id)->pluck('id')->toArray();
        $check = Chat::whereIn('id', $chatsIds)->orderByDesc('id')->first();
        if ($check) {
            return response()->json(['status' => true, 'code' => 200, 'message' => '', 'chat_id' => $check->id]);
        }
        return response()->json(['status' => false, 'code' => 201, 'message' => '', 'chat_id' => 0]);
    }

    public function chatDetails($chat_id)
    {
        $user_id = auth('api')->id();
        $chat = Chat::where('id', $chat_id)->where(function ($q) use ($user_id) {
            $q->where('user2', $user_id)->orwhere('user1', $user_id);
        })->first();
        if ((!isset($chat))) {
            $message = __('api.not_found');
            return response()->json(['status' => false, 'code' => 201, 'message' => $message]);
        }
        ChatMessages::where(['chat_id' => $chat->id, 'seen' => 0])->where('sender_id', '<>', auth('api')->id())->update(['seen' => 1]);

        $messages = ChatMessages::where('chat_id', $chat->id)->where('delete', '<>', auth('api')->id())->orderByDesc('id')
            ->paginate($this->paginateTotal)->items();
        $is_more = ($this->paginateTotal > count($messages)) ? false : true;
        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'messages' => $messages, 'user' => $chat->user, 'is_more' => $is_more]);
    }

    public function deleteChat($chat_id)
    {
        $chat = Chat::findOrFail($chat_id);

        if ($chat->user1 == auth('api')->id() || $chat->user2 == auth('api')->id()) {
            if ($chat->user_deleted == 0) {
                $chat->user_deleted = auth('api')->id();
                $chat->save();
            } elseif ($chat->user_deleted != 0) {
                $messages = ChatMessages::where('chat_id', $chat_id)->get();
                foreach ($messages as $one) {
                    $one->forceDelete();
                }
                $chat->forceDelete();
            }
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message]);
        } else {
            $message = __('api.nopermission');
            return response()->json(['status' => false, 'code' => 201, 'message' => $message]);
        }
    }

    public function sendMessage(Request $request)
    {
        $rules = [
            'chat_id' => 'required',
            'user_id' => 'required',
            'text' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201,
                'message' => implode("\n", $validator->messages()->all())]);
        }

        $user2 = $request->user_id;
        $request->type = 1;

        DB::beginTransaction();
        try {
            if ($request->chat_id) {

                $chatsIds1 = Chat::where('user1', auth('api')->user()->id)
                    ->where('user2', $user2)->pluck('id')->toArray();

                $chatsIds2 = Chat::where('user1', $user2)->where('user2', auth('api')->user()->id)->pluck('id')->toArray();

                $array = array_unique(array_merge($chatsIds1, $chatsIds2));

                $check = Chat::whereIn('id', $array)->orderByDesc('id')->first();

                if ($check) {
                    $chat_id = $check->id;
                    if ($check->delete != 0) {
                        $check->delete = 0;
                        $check->save();
                    }
                } else {
                    $newChat = new Chat();
                    $newChat->user1 = auth('api')->user()->id;
                    $newChat->user2 = $user2;
                    $newChat->last_used = Carbon::now();
                    $done = $newChat->save();
                    if ($done) {
                        $chat_id = $newChat->id;
                    }
                }
            } else {
                $chat_id = $request->chat_id;
            }

            $chat = Chat::findOrfail($chat_id);

            if ($chat->user_deleted != 0) {
                $chat->user_deleted = 0;
                $chat->save();
            }

            if ($chat) {
                //Type equals    1=> text ; 2=>image;  3=>MS docs and pdf; 4=>video; 5=>Audio;
                if ($request->type == 1) {
                    $text = $request->text;
                } else {
                    if ($request->file('attachment') != null)
                        $file = $request->file('attachment');
                    $fileType = $file->getClientOriginalExtension();
                    $name = str_random(15) . "_" . rand(1000000, 9999999) . "_" . time() . "_" . rand(1000000, 9999999);
                    if ($request->type == 2 && in_array($fileType, image_extensions())) {
                        $newName = $name . ".jpg";
                        Image::make($file)->resize(800, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save("uploads/chats/$newName");
                    } elseif ($request->type == 3 && in_array($fileType, doc_extensions())) {
                        $newName = $name . "." . $fileType;
                        $file->move('uploads/chats/', $newName);
                    } elseif ($request->type == 4 && in_array($fileType, video_extensions())) {
                        $newName = $name . "." . $fileType;
                        $file->move('uploads/chats/', $newName);
                    } elseif ($request->type == 5 && in_array($fileType, audio_extensions())) {
                        $newName = $name . "." . $fileType;
                        $file->move('uploads/chats/', $newName);
                    } else {
                        return response()->json(['status' => false, 'code' => 201, 'message' => __('api.nopermission')]);
                    }
                    $text = $newName;
                }
                $new = new ChatMessages();
                $new->chat_id = $chat_id;
                $new->sender_id = auth('api')->id();
                $new->text = $text;
                $new->type = 1;
                if ($request->type == 5 && in_array($fileType, audio_extensions())) {
                    $new->duration_time = $request->duration_time;
                }
                $new->ip_address = \Request::ip();
                $done = $new->save();
                if ($done) {

                    $text = $new->text;
                    $chat->update(['last_used' => Carbon::now()]);
                    $message = $text;
                    $title = auth('api')->user()->name . ' ' . __('api.sendMessage');
                    // $object_id = auth('api')->user()->id;
                    $object_id = $chat_id;

                    if ($new->sender_id == $chat->user2) {
                        $tokens = Token::where('user_id', $chat->user1)->pluck('fcm_token')->toArray();
//                    updateFirebaseChat('increment', $chat->user1);
                    } else {
                        $tokens = Token::where('user_id', $chat->user2)->pluck('fcm_token')->toArray();
//                    updateFirebaseChat('increment', $chat->user2);
                    }
                    sendNotificationToUsers($tokens, 2, $object_id, $message, $title);
                    $message = __('api.ok');
                    return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'chatMessage' => $new]);
                }
                $message = __('api.whoops');
                return response()->json(['status' => false, 'code' => 201, 'message' => $message]);
            }
        } catch (Throwable $exception) {
            return $exception;
            $message = __('api.whoops');
            return response()->json(['status' => false, 'code' => 201, 'message' => $message]);
        }

    }
}
