<?php

namespace Zendrop\ClickFunnelsApiClient;

use ArrayAccess;

/**
 * @extends ArrayAccess<string, mixed>
 */
interface DtoInterface extends ArrayAccess
{
    /**
     * @param array<string, mixed> $data
     * @return $this
     */
    public static function fromArray(array $data): static;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array;
}
