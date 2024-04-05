<?php

namespace App\View\Composers\Filter;

use App\Http\Requests\Filter\QueryFilterRequest;
use App\Repositories\FilterRepository;
use Illuminate\View\View;


class FilterFrameworkSelectComposer {

    private QueryFilterRequest $queryFilterRequest;
    private  FilterRepository $filterRepository;

    public function __construct(QueryFilterRequest $queryFilterRequest, FilterRepository $filterRepository)
    {
        $this->queryFilterRequest = $queryFilterRequest;
        $this->filterRepository = $filterRepository;
    }

    public function compose(View $view)
    {
        $frameworks = $this->filterRepository->getFrameworkWitchRequestSelect($this->queryFilterRequest->get('framework_id'));
        $view->with('frameworks', $frameworks);
    }

}
