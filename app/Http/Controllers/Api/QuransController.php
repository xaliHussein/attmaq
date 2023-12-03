<?php

namespace App\Http\Controllers\Api;

use App\Models\Quran;
use App\Traits\Filter;
use App\Traits\Search;
use App\Models\Teacher;
use App\Traits\OrderBy;
use App\Traits\Pagination;
use App\Traits\UploadImage;
use App\Traits\SendResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QuransController extends Controller
{
    use SendResponse, Pagination,Search, Filter, OrderBy, UploadImage;
    public function getBooks()
    {
        $books = Quran::select("*");
        if (isset($_GET["query"])) {
            $this->search($books, 'qurans');
        }
        if (isset($_GET)) {
            $this->order_by($books, $_GET);
        }
        if (!isset($_GET['skip']))
            $_GET['skip'] = 0;
        if (!isset($_GET['limit']))
            $_GET['limit'] = 10;
        $res = $this->paging($books->orderBy("created_at", "DESC"),  $_GET['skip'],  $_GET['limit']);
        return $this->send_response(200, 'تم جلب المنتجات في المخزن بنجاح', [], $res["model"], null, $res["count"]);
    }
    public function downloadPdf(Request $request){
        $request= $request->json()->all();
        $files=Quran::where('id',$request['id'])->first();
        $file = public_path().$files->contentpath;
        return response()->download($file);
    }

}
