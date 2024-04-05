<?php

namespace App\Repositories;

use App\Http\Filters\DeveloperFilter;
use App\Models\Developer;

final class DeveloperRepository
{


    public function filterMake(array $data)
    {
         return app()->make(DeveloperFilter::class, ['queryParams' => array_filter($data)]);
    }

    /**
     * Получить разработчиков, удовлетворяющих условиям пользовательского запроса
     * @param array $data
     * @return \LaravelIdea\Helper\App\Models\_IH_Developer_QB
     */
    public function getDeveloperByFilter(array $data)
    {
        return Developer::filter($this->filterMake($data));
    }
}
