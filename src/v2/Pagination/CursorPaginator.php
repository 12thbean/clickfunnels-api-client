<?php

namespace Zendrop\ClickFunnelsApiClient\v2\Pagination;

use Closure;
use Generator;
use Illuminate\Http\Client\Response;

class CursorPaginator
{
    protected int $perPage = 20;

    protected readonly HeaderCursor $cursor;

    /** @var Closure(HeaderCursor):Response $getNextPageCallable */
    protected readonly Closure $getNextPageCallable;

    /** @var Closure(Response):mixed $customDataMapCallable*/
    protected readonly ?Closure $customDataMapCallable;

    public function __construct(
        /** @var callable(HeaderCursor):Response $getNextPageCallable */
        callable $getNextPageCallable,
        /** @var null|callable(Response):mixed $customDataMapCallable */
        ?callable $customDataMapCallable = null,
        ?HeaderCursor $headerCursor = null
    ) {
        $this->getNextPageCallable = Closure::fromCallable($getNextPageCallable);
        $this->customDataMapCallable = $customDataMapCallable
            ? Closure::fromCallable($customDataMapCallable)
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

    public function getGenerator(): Generator
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
}
