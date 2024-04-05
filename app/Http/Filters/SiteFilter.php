<?php

namespace App\Http\Filters;

use App\Interfaces\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class SiteFilter extends AbstractFilter
{
    const DEVELOPER_ID = 'developer_id';
    const SITE_ID = 'site_id';
    const FRAMEWORK_ID = 'framework_id';

    protected function getCallbacks(): array
    {
        return [
            self::SITE_ID => [$this, 'getSiteFromId'],
            self::DEVELOPER_ID => [$this, 'getSiteFromDeveloperId'],
            self::FRAMEWORK_ID => [$this, 'getSiteFromFrameworkId']
        ];
    }


    /**
     * Выбрать сайты по идентификатору
     * @param Builder $builder
     * @param array|int $value
     * @return Builder
     */
    protected function getSiteFromId(Builder $builder, array|int $value): Builder
    {
        if(is_array($value)) {
            return $builder->whereIn('id', $value);
        }

        return $builder->where('id', $value);
    }

    /**
     * Получить сайты, по идентификатору разработчика
     * @param Builder $builder
     * @param array|int $value
     * @return Builder
     */
    protected function getSiteFromDeveloperId(Builder $builder, array|int $value): Builder
    {
        return $builder->whereHas('developer',
            fn($query) => is_array($value)
                ? $query->whereIn('developer_id', $value)
                : $query->where('developer_id', $value));
    }

    /**
     * Поучить сайты, по идентификатору фреймворка
     * @param Builder $builder
     * @param array|int $value
     * @return Builder
     */
    protected function getSiteFromFrameworkId(Builder $builder, array|int $value): Builder
    {

        if(is_array($value)) {
            return $builder->whereIn('framework_id', $value);
        }

        return $builder->where('framework_id', $value);
    }

}
