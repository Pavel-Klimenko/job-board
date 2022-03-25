<?php
namespace App\Http\Controllers;

use App\Services\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\InterviewInvitations;
use \Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

use App\Events\CandidateInvitation;

use CpChart\Data;
use CpChart\Image;

class TestController extends BaseController
{
    public function testMethod(Request $request)
    {
        //X - месяцы, Y-новые вакансии

        /* Build a dataset */
        $data = new Data();
        $data->addPoints([2, 7, 5], "Probe 3");
        $data->setAxisName(0, "New vacancies");
        $data->addPoints(range(1, 3), "Labels");
        $data->setSerieDescription("Labels", "Months");
        $data->setAbscissa("Labels");

        /* Create the 1st chart */
        $image = new Image(700, 230, $data);
        $image->setGraphArea(60, 60, 450, 190);
        $image->drawScale(["DrawSubTicks" => true]);
        $image->setShadow(true, ["X" => 1, "Y" => 1, "R" => 0, "G" => 0, "B" => 0, "Alpha" => 10]);
        $image->drawLineChart(["DisplayValues" => true, "DisplayColor" => DISPLAY_AUTO]);
        $image->autoOutput("example.drawLineChart.png");
    }



    public function phpinfo()
    {
        phpinfo();
    }

}
