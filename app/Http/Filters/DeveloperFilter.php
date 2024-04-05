<?php

namespace App\Http\Filters;

use App\Interfaces\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class DeveloperFilter extends AbstractFilter
{
    const DEVELOPER_ID = 'developer_id';
    const SITE_ID = 'site_id';
    const FRAMEWORK_ID = 'framework_id';

    protected function getCallbacks(): array
    {
        return [
            self::DEVELOPER_ID => [$this, 'getDevelopersFromId'],
            self::SITE_ID => [$this, 'getDevelopersFromSiteId'],
            self::FRAMEWORK_ID => [$this, 'getDevelopersFromFrameworkId']
        ];
    }


    /**
     * Выбрать разработчиков по идентификатору
     * @param Builder $builder
     * @param array|int $value
     * @return Builder
     */
    protected function getDevelopersFromId(Builder $builder, array|int $value): Builder
    {
        if(is_array($value)) {
            return $builder->whereIn('id', $value);
        }

        return $builder->where('id', $value);
    }

    /**
     * Получить разработчиков, которые реализовали полученные сайты
     * @param Builder $builder
     * @param array|int $value
     * @return Builder
     */
    protected function getDevelopersFromSiteId(Builder $builder, array|int $value): Builder
    {
        return $builder->whereHas('site',
            fn($query) => is_array($value)
                ? $query->whereIn('site_id', $value)
                : $query->where('site_id', $value));
    }

    /**
     * Поучить разработчиков, которые владеют полученным фреймворком
     * @param Builder $builder
     * @param array|int $value
     * @return Builder
     */
    protected function getDevelopersFromFrameworkId(Builder $builder, array|int $value): Builder
    {
        return $builder->whereHas('framework',
            fn($query) => is_array($value)
                ? $query->whereIn('framework_id', $value)
                : $query->where('framework_id', $value));
    }

}
