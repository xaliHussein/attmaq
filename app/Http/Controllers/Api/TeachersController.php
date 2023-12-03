<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Traits\Pagination;
use App\Traits\Search;
use App\Traits\SendResponse;
use App\Traits\Filter;
use App\Traits\OrderBy;
use App\Traits\UploadImage;

class TeachersController extends Controller
{
    use SendResponse, Pagination,Search, Filter, OrderBy, UploadImage;
    public function getMostProminentTeachers()
    {
        $teachers = Teacher::select("*")
        ->orderByDesc('rating')
        ->limit(6)
        ->get();
        return $this->send_response(200, 'تم جلب افضل الاساتذه بنجاح', [], $teachers,[]);
    }
    public function getTeachers()
    {
        $teachers = Teacher::select("*");
        if (isset($_GET["query"])) {
            $this->search($teachers, 'teachers');
        }
        if (isset($_GET['filter'])) {
            $this->filter($teachers, $_GET["filter"]);
        }
        if (isset($_GET)) {
            $this->order_by($teachers, $_GET);
        }
        if (!isset($_GET['skip']))
            $_GET['skip'] = 0;
        if (!isset($_GET['limit']))
            $_GET['limit'] = 10;
        $res = $this->paging($teachers->orderBy("created_at", "DESC"),  $_GET['skip'],  $_GET['limit']);
        return $this->send_response(200, 'تم جلب المنتجات في المخزن بنجاح', [], $res["model"], null, $res["count"]);
    }

}
