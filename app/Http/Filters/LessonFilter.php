<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class LessonFilter extends AbstractFilter
{
    public const DATE = 'date';
    public const TIME = 'time';
    public const ROOM_ID = 'room_id';
    public const GROUP_ID = 'group_id';


    protected function getCallbacks(): array
    {
        return [
            self::DATE => [$this, 'date'],
            self::TIME => [$this, 'time'],
            self::ROOM_ID => [$this, 'roomId'],
            self::GROUP_ID => [$this, 'groupId']
        ];
    }

    public function date(Builder $builder, $value)
    {
        $builder->where('date', 'like', "%{$value}%");
    }

    public function time(Builder $builder, $value)
    {
        $builder->where('time', 'like', "%{$value}%");
    }

    public function roomId(Builder $builder, $value)
    {
        $builder->where('room_id', $value);
    }

    public function groupId(Builder $builder, $value)
    {
        $builder->where('group_id', $value);
    }
}