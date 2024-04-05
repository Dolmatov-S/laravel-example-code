<?php

namespace App\Repositories;

use App\Models\Developer;
use App\Models\Framework;
use App\Models\Site;
use Illuminate\Support\Collection;

class FilterRepository
{

    /**
     * Получить список разработчиков. Отметить выбранных пользователем разработчиком
     * @param int|array|null $select_developers
     * @return Collection
     */
    public function getDevelopersWitchRequestSelect(int|array|null $select_developers): Collection
    {
        $developers = Developer::select(['id', 'name'])->get();

        match (getType($select_developers)) {
            'array' => $developers->map(fn($item) => $item['active'] = in_array($item->id, $select_developers)),
            'integer' => $developers->map(fn($item) => $item['active'] = ($item->id == $select_developers)),
            default => $developers->map(fn($item) => $item['active'] = false)
        };

        return $developers;
    }

    /**
     * Получить список cайтов. Отметить выбранных пользователем сайтов
     * @param int|array|null $select_sites
     * @return Collection
     */
    public function getSiteWitchRequestSelect(int|array|null $select_sites): Collection
    {
        $sites = Site::select(['id', 'name'])->get();

        match (getType($select_sites)) {
            'array' => $sites->map(fn($item) => $item['active'] = in_array($item->id, $select_sites)),
            'integer' => $sites->map(fn($item) => $item['active'] = ($item->id == $select_sites)),
            default => $sites->map(fn($item) => $item['active'] = false)
        };

        return $sites;
    }


    /**
     * Получить список cайтов. Отметить выбранных пользователем сайтов
     * @param int|array|null $select_frameworks
     * @return Collection
     */
    public function getFrameworkWitchRequestSelect(int|array|null $select_frameworks): Collection
    {
        $frameworks = Framework::select(['id', 'name'])->get();

        match (getType($select_frameworks)) {
            'array' => $frameworks->map(fn($item) => $item['active'] = in_array($item->id, $select_frameworks)),
            'integer' => $frameworks->map(fn($item) => $item['active'] = ($item->id == $select_frameworks)),
            default => $frameworks->map(fn($item) => $item['active'] = false)
        };

        return $frameworks;
    }


}
