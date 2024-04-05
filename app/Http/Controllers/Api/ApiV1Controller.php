<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Filter\QueryFilterRequest;
use App\Http\Resources\Api\v1\DeveloperResource;
use App\Repositories\DeveloperRepository;

class ApiV1Controller extends Controller
{

    public function getDevelopers(QueryFilterRequest $queryFilterRequest, DeveloperRepository $developerRepository)
    {
        return DeveloperResource::collection(
            $developerRepository->getDeveloperWitchFilter($queryFilterRequest->validated())
                ->paginate(12)
        );
    }
}
