<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO;

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
        return self::toArrayR($array);
    }
}
