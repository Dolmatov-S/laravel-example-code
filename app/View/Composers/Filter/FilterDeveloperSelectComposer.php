<?php

namespace App\View\Composers\Filter;

use App\Http\Requests\Filter\QueryFilterRequest;
use App\Repositories\FilterRepository;
use Illuminate\View\View;


class FilterDeveloperSelectComposer {

    private QueryFilterRequest $queryFilterRequest;
    private  FilterRepository $filterRepository;

    public function __construct(QueryFilterRequest $queryFilterRequest, FilterRepository $filterRepository)
    {
        $this->queryFilterRequest = $queryFilterRequest;
        $this->filterRepository = $filterRepository;
    }

    public function compose(View $view)
    {
        $developers = $this->filterRepository->getDevelopersWitchRequestSelect($this->queryFilterRequest->get('developer_id'));
        $view->with('developers', $developers->toArray());
    }

}
