<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO;

use BackedEnum;
use Zendrop\Data\Data;

abstract class BaseDTO extends Data implements DtoInterface
{
    /**
     * {@inheritDoc}
     */
    public static function fromResponse(array $data): static
    {
        /** @phpstan-ignore-next-line */
        return static::from($data, true);
    }

    /**
     * {@inheritDoc}
     */
    public static function arrayFromResponse(array $entityList): array
    {
        $dtoCollection = [];

        foreach ($entityList as $entity) {
            $dtoCollection[] = static::fromResponse($entity);
        }

        return $dtoCollection;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return static::toArrayR((array)$this);
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    protected static function toArrayR(mixed $value): mixed
    {
        if ($value instanceof BaseDTO) {
            $value = $value->toArray();
            foreach ($value as $key => $item) {
                $value[$key] = static::toArrayR($item);
            }
        }

        if (is_array($value)) {
            foreach ($value as $key => $item) {
                $value[$key] = static::toArrayR($item);
            }
        }

        if ($value instanceof BackedEnum) {
            $value = $value->value;
        }

        return $value;
    }
}
