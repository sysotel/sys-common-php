<?php

namespace SYSOTEL\APP\Common\DB\Services;

use Illuminate\Database\Eloquent\Builder;
use InvalidArgumentException;

class Paginator
{
    protected Builder $queryBuilder;

    protected $currentPage = 1;

    protected $perPage = 50;

    protected int $totalResultCount;

    /**
     * @param Builder $queryBuilder
     */
    protected function __construct(Builder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
        $this->totalResultCount = $this->queryBuilder->count();
    }

    /**
     * Fluent API constructor method
     *
     * @param Builder $queryBuilder
     * @return static
     */
    public static function create(Builder $queryBuilder): static
    {
        return new static($queryBuilder);
    }

    /**
     * @param int $val
     * @return $this
     */
    public function perPage(int $val): static
    {
        if ($val < 0) {
            throw new InvalidArgumentException('value should be 0 or greater');
        }

        $this->perPage = $val;

        return $this;
    }

    /**
     * @param int $val
     * @return $this
     */
    public function currentPage(int $val): static
    {
        if ($val < 0) {
            throw new InvalidArgumentException('value should be 0 or greater');
        }

        $this->currentPage = $val;

        return $this;
    }

    /**
     * @param bool $asArray
     * @param bool $withPaginationDetails
     */
    public function getResult(bool $asArray = true, bool $withPaginationDetails = true)
    {
        $currentResultCount = $this->getPaginatedBuilder()->count();

        $result = $this->getPaginatedBuilder()->get();
        if ($asArray) {
            $result = $result->toArray();
        }

        $paginationDetails = null;

        if($withPaginationDetails) {
            $paginationDetails = [
                'currentPage' => $this->currentPage,
                'perPage' => $this->perPage,
                'total' => $this->totalResultCount,
                'totalPages' => ceil($this->totalResultCount / $this->perPage),
                'currentUrl' => request()->fullUrl(),
                'prevUrl' => null,
                'prevPage' => null,
                'nextUrl' => null,
                'nextPage' => null,
            ];

            if($this->currentPage > 1) {
                $query = request()->query();
                $query['page'] = $this->currentPage - 1;
                $paginationDetails['prevUrl'] = request()->url() . '?' . http_build_query($query);
                $paginationDetails['prevPage'] = $this->currentPage - 1;
            }

            if(($this->currentPage * $this->perPage) < $this->totalResultCount) {
                $query = request()->query();
                $query['page'] = isset($query['page']) ? ++$query['page'] : 2;
                $paginationDetails['nextUrl'] = request()->url() . '?' . http_build_query($query);
                $paginationDetails['nextPage'] = $this->currentPage + 1;
            }
        }

        return [$result, $paginationDetails];
    }

    public function getPaginatedBuilder(): Builder
    {
        return $this->queryBuilder
            ->limit($this->perPage)
            ->offset(($this->currentPage - 1) * $this->perPage);
    }
}
