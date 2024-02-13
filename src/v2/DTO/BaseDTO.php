<?php

namespace Zendrop\ClickFunnelsApiClient\v2\DTO;

use BackedEnum;

abstract class BaseDTO implements DtoInterface
{
    /**
     * @param string $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->$offset);
    }

    /**
     * @param string $offset
     * @return mixed
     */
    public function offsetGet($offset): mixed
    {
        return $this->$offset;
    }

    /**
     * @param string $offset
     * @param mixed $value
     * @return never
     * @throws DtoException
     */
    public function offsetSet($offset, $value): never
    {
        throw new DtoException("Cannot assign value {$value} to readonly property {$offset}");
    }

    /**
     * @param string $offset
     * @return never
     * @throws DtoException
     */
    public function offsetUnset($offset): never
    {
        throw new DtoException("Cannot unassigned readonly property {$offset}");
    }

    /**
     * {@inheritDoc}
     */
    public static function fromResponse(array $data): static
    {
        /** @phpstan-ignore-next-line */
        return new static(...$data);
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
