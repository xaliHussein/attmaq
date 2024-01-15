<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use App\Traits\Filter;
use App\Traits\Search;
use App\Traits\OrderBy;
use App\Traits\Pagination;
use App\Traits\UploadImage;
use App\Traits\SendResponse;
use App\Http\Controllers\Controller;

class NewsController extends Controller{
    use SendResponse, Pagination,Search, Filter, OrderBy, UploadImage;
    public function getNews()
    {
        if (isset($_GET["news_id"])) {
            $news = News::find($_GET["news_id"]);
            return $this->send_response(200, 'تم احضار الخبر', [], $news);
        }
        $news = News::select("*");
        if (isset($_GET["query"])) {
            $this->search($news, 'news');
        }
        if (isset($_GET)) {
            $this->order_by($news, $_GET);
        }
        if (!isset($_GET['skip']))
            $_GET['skip'] = 0;
        if (!isset($_GET['limit']))
            $_GET['limit'] = 10;
        $res = $this->paging($news->orderBy("created_at", "DESC"),  $_GET['skip'],  $_GET['limit']);
        return $this->send_response(200, 'تم احضار جميع الاخبار بنجاح', [], $res["model"], null, $res["count"]);
    }
}
