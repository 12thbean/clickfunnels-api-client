<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO;

use Illuminate\Support\Str;

abstract class RequestDTO extends BaseDTO
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $array = (array)$this;

        if (empty($array['fields'])) {
            return [];
        }

        $fields = array_flip($array['fields']);
        unset($array['fields']);
        $array = array_intersect_key($array, $fields);

        $snakeKeys = array_map(static fn ($v) => Str::snake($v), array_keys($array));
        $array = array_combine($snakeKeys, $array);

        return self::toArrayR($array);
    }
}
