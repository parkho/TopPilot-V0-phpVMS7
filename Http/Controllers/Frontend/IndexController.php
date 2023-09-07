<?php

namespace Modules\TopPilot\Http\Controllers\Frontend;

use App\Contracts\Controller;
use Illuminate\Http\Request;
use App\Models\Pirep;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Modules\TopPilot\Models\TopPilot;
/**
 * Class $CLASS$
 * @package 
 */
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request, $interval = null)
    {
        $Day = now()->format('l');
        $Month = now()->format('F');
        $Year = now()->format('Y');

        $ftday = now()->format('d');
        $ftmonth = now()->format('m');
        $ftyear = now()->format('Y');

        $dday = now()->format('d');
        $dmonth = now()->format('m');
        $dyear = now()->format('Y');

        $lrday = now()->format('d');
        $lrmonth = now()->format('m');
        $lryear = now()->format('Y');

        $brday = now()->format('d');
        $brmonth = now()->format('m');
        $bryear = now()->format('Y');
        
        $topPilot = new TopPilot();
        $resultftDay = $topPilot->getTopFlightTimesForDay($ftday);
        $resultftMonth = $topPilot->getTopFlightTimesForMonth($ftmonth);
        $resultftYear = $topPilot->getTopFlightTimesForYear($ftyear);

        $resultdDay = $topPilot->getTopDistanceForDay($dday);
        $resultdMonth = $topPilot->getTopDsitanceForMonth($dmonth);
        $resultdYear = $topPilot->getTopDistanceForYear($dyear);

        $resultlrDay = $topPilot->getTopLandingRateForDay($lrday);
        $resultlrMonth = $topPilot->getTopLandingRateForMonth($lrmonth);
        $resultlrYear = $topPilot->getTopLandingRateForYear($lryear);

        $resultbrDay = $topPilot->getTopBestRevenueForDay($brday);
        $resultbrMonth = $topPilot->getTopBestRevenueForMonth($brmonth);
        $resultbrYear = $topPilot->getTopBestRevenueForYear($bryear);


        return view('toppilot::index', compact(
                                                'Day',
                                                'Month',
                                                'Year', 
                                                'resultftDay', 
                                                'resultftMonth', 
                                                'resultftYear', 
                                                'resultdDay', 
                                                'resultdMonth', 
                                                'resultdYear',
                                                'resultlrDay',
                                                'resultlrMonth',
                                                'resultlrYear', 
                                                'resultbrDay',
                                                'resultbrMonth',
                                                'resultbrYear',                                                                          
                                                )
                                            );
    }

      /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function create(Request $request)
    {
        return view('toppilot::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function show(Request $request)
    {
        return view('toppilot::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function edit(Request $request)
    {
        return view('toppilot::edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     */
    public function destroy(Request $request)
    {
    }
}
