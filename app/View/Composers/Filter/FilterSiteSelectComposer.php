<?php

namespace App\View\Composers\Filter;

use App\Http\Requests\Filter\QueryFilterRequest;
use App\Repositories\FilterRepository;
use Illuminate\View\View;


class FilterSiteSelectComposer {

    private QueryFilterRequest $queryFilterRequest;
    private  FilterRepository $filterRepository;

    public function __construct(QueryFilterRequest $queryFilterRequest, FilterRepository $filterRepository)
    {
        $this->queryFilterRequest = $queryFilterRequest;
        $this->filterRepository = $filterRepository;
    }

    public function compose(View $view)
    {
        $sites = $this->filterRepository->getSiteWitchRequestSelect($this->queryFilterRequest->get('site_id'));
        $view->with('sites', $sites);
    }

}
