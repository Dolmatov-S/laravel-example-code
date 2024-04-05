<?php

namespace App\Repositories;

use App\Http\Filters\DeveloperFilter;
use App\Http\Filters\SiteFilter;
use App\Interfaces\Filters\FilterInterface;
use App\Models\Developer;
use App\Models\Site;

final class SiteRepository
{
    public function filterMake(array $data)
    {
        return app()->make(SiteFilter::class, ['queryParams' => array_filter($data)]);
    }

    /**
     * Получить разработчиков, удовлетворяющих условиям пользовательского запроса
     * @param array $data
     * @return \LaravelIdea\Helper\App\Models\_IH_Developer_QB
     */
    public function getSiteByFilter(array $data)
    {
        return Site::filter($this->filterMake($data));
    }
}
