<?php

namespace App\Repositories;

use App\Models\Developer;

class FilterRepository
{

    /**
     * Получить список разработчиков. Отметить выбранных пользователем разработчиком
     * @param int|array|null $select_developers
     * @return Developer[]
     */
    public function getDevelopersWitchRequestSelect(int|array|null $select_developers)
    {

        $developers =  Developer::select('id', 'name')->get();

        match(getType($select_developers)) {
            'array' => $developers->map(fn($item) => $item['active'] = in_array($item->id, $select_developers)),
            'integer' => $developers->map(fn($item) => $item['active'] = ($item->id == $select_developers)),
            default => ''
        };

        return $developers;
    }



}
