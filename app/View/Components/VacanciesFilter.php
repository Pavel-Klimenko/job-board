<?php
namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use App\Containers\Vacancies\Models\JobCategories;
use App\Ship\Helpers\Helper;


class VacanciesFilter extends Component
{
    public $cities;
    public $jobCategories;
    public $filterSetFlag;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->cities = DB::table('vacancies')->select('CITY')
            ->distinct()
            ->where('CITY', '<>', '')
            ->get();
        $this->jobCategories = JobCategories::all();
        $this->filterSetFlag = Helper::isFilterSet();
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.vacanciesFilter');
    }
}
