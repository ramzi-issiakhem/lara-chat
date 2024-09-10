<?php

namespace Ramzi\LaraChat\Enums;

enum ThreadTypesEnum : string
{
    case DIRECT = 'direct';

    case GROUP = 'group';

    public static function typesValue(): array
    {
        return array_column(self::cases(), 'value');
    }

}
