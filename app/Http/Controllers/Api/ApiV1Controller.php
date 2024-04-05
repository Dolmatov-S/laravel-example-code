<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Filter\QueryFilterRequest;
use App\Http\Resources\Api\v1\DeveloperResource;
use App\Http\Resources\Api\v1\SiteResource;
use App\Repositories\DeveloperRepository;
use App\Repositories\SiteRepository;

class ApiV1Controller extends Controller
{

    public function getDevelopers(QueryFilterRequest $queryFilterRequest, DeveloperRepository $developerRepository)
    {
        return DeveloperResource::collection(
            $developerRepository->getDeveloperByFilter($queryFilterRequest->validated())
                ->paginate(12)
        );
    }


    public function getSites(QueryFilterRequest $queryFilterRequest, SiteRepository $siteRepository)
    {
        return SiteResource::collection(
            $siteRepository->getSiteByFilter($queryFilterRequest->validated())->paginate(12)
        );
    }
}
