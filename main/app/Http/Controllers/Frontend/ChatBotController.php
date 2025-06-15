<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ChatBotController extends Controller
{
	public function send(Request $request)
	{
		$message = trim($request->input('message'));

		if (!$message) {
			return response()->json(['error' => 'Empty message'], 422);
		}

		$reply = $this->generateReply($message);

		$entry = ['from' => 'user', 'text' => $message];
		$botReply = ['from' => 'bot', 'text' => $reply];

		if (Auth::check()) {
			$key = 'chat_' . Auth::id();
			$chat = Cache::get($key, []);
			$chat[] = $entry;
			$chat[] = $botReply;
			Cache::put($key, $chat, now()->addDay());
		}
		return response()->json(['reply' => $reply]);
	}

	public function history()
	{
		if (Auth::check()) {
			$chat = Cache::get('chat_' . Auth::id(), []);
			return response()->json($chat);
		}
	}

	public function clear()
	{
		if (Auth::check()) {
			Cache::forget('chat_' . Auth::id());
			return response()->json([
				// 'title' => 'Status',
				'type' => 'success',
				'message' => 'Chat History Cleared',
			]);
		}
		return response()->json([
			// 'title' => 'Status',
			'type' => 'error',
			'message' => 'Not Authorized',
		], 401);
	}

	private function generateReply($message)
	{
		$msg = strtolower($message);

		$intents = [
			'menu' => [
				'keywords' => ['menu', 'specials', 'food', 'dishes'],
				'reply' => 'Today’s specials: 🍕 Margherita, 🍝 Alfredo Pasta, 🥗 Caesar Salad.',
			],
			'location' => [
				'keywords' => ['location', 'address', 'where', 'place'],
				'reply' => 'We are located at 123 Flavor Street, Foodtown.',
			],
			'hours' => [
				'keywords' => ['hours', 'open', 'time', 'closing', 'timing'],
				'reply' => 'We are open daily from 11AM to 11PM.',
			],
			'greeting' => [
				'keywords' => ['hi', 'hello', 'hey'],
				'reply' => 'Hi there! 👋 How can I assist you today?',
			],
		];

		$responses = [];

		foreach ($intents as $intent) {
			foreach ($intent['keywords'] as $keyword) {
				if (str_contains($msg, $keyword)) {
					$responses[] = $intent['reply'];
					break; // Stop after first match in this intent
				}
			}
		}

		if (empty($responses)) {
			return "I'm not sure I understood. You can ask about our menu, place, or time!";
		}

		return implode(' ', $responses);
	}
}
