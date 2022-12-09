<?php

namespace App\Http\Controllers\API\v1;


use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Category;
use App\Models\ChatMessage;
use App\Models\ChatRecipient;
use App\Models\Comment;
use App\Models\Language;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\Report;
use App\Models\Token;
use App\Models\User;
use App\Models\Setting;
use App\Notifications\ProductNotification;
use App\Traits\imageTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Throwable;


class ChatOldController extends Controller
{
    protected $paginateTotal = '';
    protected $settings = '';

    use imageTrait;

    public function __construct()
    {
        $this->settings = Setting::orderBy('id', 'desc')->first();
        $this->paginateTotal = $this->settings->paginateTotal;
    }

    public function sendMessage(Request $request, $user_id)
    {

        $user = auth('api')->user();
        $sender_id = Auth::guard('api')->id();
        $user_id = User::where('id', $user_id)->first()->id;

        if ($user_id == $sender_id) {
            return "404";
        }

        $validator = Validator::make($request->all(), [
            'body' => 'sometimes',
            'type' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201,
                'message' => implode("\n", $validator->messages()->all())]);
        }

        DB::beginTransaction();
        try {
            $ChatMessage = new ChatMessage();
            $ChatMessage->user_id = $sender_id;
            $ChatMessage->type = $request->type ?? 0;
            if ($request->type == 0) {
                $ChatMessage->body = $request->body;
                $massage = $request->body;
            } else {
                if ($request->hasFile('attachment')) {
                    $attachment = $request->file('attachment');
                    $extention = $attachment->getClientOriginalExtension();
                    $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
                    Image::make($attachment)->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save("uploads/chats/$file_name");
                    $ChatMessage->body = $file_name;
                    $massage = __('api.sendAttachment');

                }
            }
            $ChatMessage->save();

            $ChatMessage->recipients()->attach([
                'user_id' => $user_id
            ]);

            DB::commit();
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message]);

        } catch (Throwable $exception) {
            return $exception;
            $message = __('api.you_must_pay');
            return response()->json(['status' => false, 'code' => 200, 'message' => $message]);
        }

    }

    public function getChatMessage(Request $request, $id)
    {
        $user_id = auth('api')->user()->id;
        if (!$user_id) {
            $message = __('api.whoops');
            return response()->json(['status' => false, 'code' => 200, 'message' => $message]);
        } else {
            $user = User::where('id', $id)->with(['chatMessages', 'receivedMessages'])->get()->makeHidden(['email', 'mobile', 'notifications',
                'gender', 'date', 'status', 'facebook', 'twitter', 'instagram', 'is_deleted', 'opening_status', 'phone_verified_at']);
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'data' => $user]);

        }
    }

    public function chatFriends()
    {
        $user_id = auth('api')->user()->id;
        $user = auth('api')->user();

        $blockUser_id = $user->blocks->pluck('blockUser_id')->toArray();

        if (!$user_id) {
            $message = __('api.whoops');
            return response()->json(['status' => false, 'code' => 200, 'message' => $message]);
        }

        $friends = User::where('id', '<>', $user_id)
            ->whereNotIn('id', $blockUser_id)
            ->orderBy('user_name')
            ->get();

        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'friends' => $friends]);
    }

    public function blcokUser($blockUser_id)
    {
        $user_id = Auth::guard('api')->id();

        if (!$blockUser_id) {
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
}
