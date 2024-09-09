<?php

namespace Ramzi\LaraChat\Enums;

enum MessageTypesEnum : string
{
    case TEXT = 'text';

    case EMOJI = 'emoji';

    public static function typesValue(): array
    {
        return array_column(self::cases(), 'value');
    }

}
