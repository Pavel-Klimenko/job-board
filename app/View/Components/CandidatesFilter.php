<?php
namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use App\Containers\Vacancies\Models\JobCategories;
use App\Ship\Helpers\Helper;
use App\Constants;

class CandidatesFilter extends Component
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
        $roleName = Constants::USER_ROLE_NAMES['candidate'];
        $roleId = Helper::getRoleIdByName($roleName);

        $this->cities = DB::table('users')->select('CITY')
            ->distinct()
            ->where('CITY', '<>', '')
            ->where('role_id', $roleId)
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
        return view('components.candidatesFilter');
    }
}
