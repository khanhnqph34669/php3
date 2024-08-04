<?php

namespace App\Http\Controllers\AI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuestionController extends Controller
{
    public function index()
    {
        return view("Admin.AI.index");
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');

        $newsApiKey = 'pub_50069304d45bf588c313b41985d0a462ac520';
        $newsResponse = Http::get("https://newsdata.io/api/1/latest", [
            'country' => 'vi',
            'apikey' => $newsApiKey
        ]);

        $newsData = $newsResponse->json();

        // Prepare a context string from the news data
        $newsContext = "Thông tin tin tức mới nhất:\n";
        if (isset($newsData['results']) && is_array($newsData['results'])) {
            foreach (array_slice($newsData['results'], 0, 5) as $news) {
                $newsContext .= "- " . $news['title'] . "\n";
            }
        }


        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-rapidapi-host' => 'chatgpt-42.p.rapidapi.com',
            'x-rapidapi-key' => '59afd99649msh1faa83e37c65d42p1beb00jsn1d7bd92bb89e'
        ])->post('https://chatgpt-42.p.rapidapi.com/conversationgpt4-2', [
            'messages' => [
                [
                    'role' => 'system',
                    'content' => "Bạn là một trợ lý AI được cập nhật về tin tức mới nhất ở Việt Nam. Dưới đây là nguồn:\n" . $newsContext
                ],
                [
                    'role' => 'user',
                    'content' => $message
                ]
            ],
            'system_prompt' => 'Tập trung vào việc cung cấp thông tin chính xác tại việt nam năm 2024, cập nhật liên quan đến tin tức và các sự kiện hiện tại Việt Nam. Nếu được hỏi về ý kiến, hãy làm rõ rằng bạn cung cấp thông tin thực tế hơn là quan điểm cá nhân. Câu trả lời luôn luôn bằng tiếng Việt!',
            'model' => 'gpt4.2-turbo',
            'temperature' => 0.7,
            'top_k' => 5,
            'top_p' => 0.9,
            'max_tokens' => 10000,
            'web_access' => null
        ]);

        return $response->json();
    }
}
