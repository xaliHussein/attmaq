<?php

namespace App\Http\Controllers\Api;

use App\Models\Faq;
use App\Traits\Filter;
use App\Traits\Search;
use App\Models\Teacher;
use App\Traits\OrderBy;
use App\Traits\Pagination;
use App\Traits\UploadImage;
use App\Traits\SendResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FsqsController extends Controller
{
    use SendResponse, Pagination,Search, Filter, OrderBy, UploadImage;
    public function getFaqs()
    {
        $faqs = Faq::select("*");
        if (isset($_GET["query"])) {
            $this->search($faqs, 'faqs');
        }
        if (isset($_GET)) {
            $this->order_by($faqs, $_GET);
        }
        if (!isset($_GET['skip']))
            $_GET['skip'] = 0;
        if (!isset($_GET['limit']))
            $_GET['limit'] = 10;
        $res = $this->paging($faqs->orderBy("created_at", "DESC"),  $_GET['skip'],  $_GET['limit']);
        return $this->send_response(200, 'تم جلب المنتجات في المخزن بنجاح', [], $res["model"], null, $res["count"]);
    }

}
