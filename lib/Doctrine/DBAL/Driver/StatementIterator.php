<?php

declare(strict_types=1);

namespace Doctrine\DBAL\Driver;

use IteratorAggregate;

final class StatementIterator implements IteratorAggregate
{
    /** @var ResultStatement */
    private $statement;

    public function __construct(ResultStatement $statement)
    {
        $this->statement = $statement;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        while (($result = $this->statement->fetch()) !== false) {
            yield $result;
        }
    }
}
