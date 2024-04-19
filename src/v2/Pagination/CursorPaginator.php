<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Pagination;

use Closure;
use IteratorAggregate;
use Traversable;

/**
 * @template T
 * @implements IteratorAggregate<T>
 */
class CursorPaginator implements IteratorAggregate
{
    protected readonly HeaderCursor $cursor;

    /** @var Closure(HeaderCursor):mixed $getNextPageCallable */
    protected readonly Closure $getNextPageCallable;

    /** @var ?Closure(mixed):mixed $customDataMapCallable*/
    protected readonly ?Closure $customDataMapCallable;

    public function __construct(
        /** @var callable(HeaderCursor):mixed $getNextPageCallable */
        callable $getNextPageCallable,
        /** @var null|callable(mixed):mixed $customDataMapCallable */
        ?callable $customDataMapCallable = null,
        ?HeaderCursor $headerCursor = null
    ) {
        $this->getNextPageCallable = $getNextPageCallable(...);
        $this->customDataMapCallable = $customDataMapCallable
            ? $customDataMapCallable(...)
            : null;

        $this->cursor = $headerCursor ?? new HeaderCursor();
    }

    public function next(): mixed
    {
        $ret = ($this->getNextPageCallable)($this->cursor);
        $this->cursor->setNext($ret);

        return $this->customDataMapCallable
            ? ($this->customDataMapCallable)($ret)
            : $ret;
    }

    /**
     * @return Traversable<mixed,T>
     */
    public function getIterator(): Traversable
    {
        do {
            $pageResult = $this->next();
            foreach ($pageResult as $item) {
                yield $item;
            }
        } while ($this->hasMore());
    }

    public function hasMore(): bool
    {
        $nextCursorPointer = $this->cursor->getNext();
        return isset($nextCursorPointer);
    }

    public function getCursor(): HeaderCursor
    {
        return $this->cursor;
    }
}
