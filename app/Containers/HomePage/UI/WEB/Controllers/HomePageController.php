<?php

namespace App\Containers\HomePage\UI\WEB\Controllers;

use App\Containers\HomePage\Actions;
use App\Events\NewEntityCreated;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomePageController extends Controller
{
    public function renderHomePage()
    {
        return app(Actions\renderHomePage::class)->run();
    }

    public function createUserReview(Request $request)
    {
        $date = app(Actions\createUserReview::class)->run($request);
        event(new NewEntityCreated($date));
        return redirect()->route('homepage');
    }

}
