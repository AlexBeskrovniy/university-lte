<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class StudentFilter extends AbstractFilter
{
    public const GROUP_ID = 'group_id';

    protected function getCallbacks(): array
    {
        return [
            self::GROUP_ID => [$this, 'groupId']
        ];
    }

    public function groupId(Builder $builder, $value)
    {
        $builder->where('group_id', $value);
    }
}