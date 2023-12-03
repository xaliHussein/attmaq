<?php

namespace App\Http\Controllers\Api;

use App\Traits\Pagination;
use App\Models\Sessiongroup;
use App\Traits\SendResponse;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    use SendResponse, Pagination;

    public function getSessions(){
        $sessions = Sessiongroup::select("*");
        if (isset($_GET["query"])) {
            $this->search($sessions, 'sessiongroups');
        }
        if (!isset($_GET['skip']))
            $_GET['skip'] = 0;
        if (!isset($_GET['limit']))
            $_GET['limit'] = 10;
        $res = $this->paging($sessions->orderBy("created_at", "DESC"),  $_GET['skip'],  $_GET['limit']);
        return $this->send_response(200, 'تم احضار جميع الجلسات', [], $res["model"], null, $res["count"]);
    }
}
