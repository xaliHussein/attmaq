<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;
use App\Traits\SendResponse;
use App\Traits\OrderBy;


class WebsiteSettingsController extends Controller
{
    use SendResponse, OrderBy;

    public function getWebsiteSettings()
    {
        $websiteSettings = WebsiteSettings::select("*")->get();
        return $this->send_response(200, 'تم احضار جميع روابط', [], $websiteSettings);
    }

}
