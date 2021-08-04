<?php

declare(strict_types=1);

namespace Bruny\Adapters\DatabaseContext;

use PDO;
use PDOStatement;

/**
 * This adapter is required for the PDOAdapter.
 */
class PDOStatementAdapter implements DbStatementAdapterInterface
{
    public $queryString;

    public function __construct(private PDOStatement $statement)
    {
        $this->queryString = $statement->queryString;
    }

    /**
     * {@inheritDoc}
     */
    public function bindColumn(
        string|int $column,
        &$var,
        ?int $type = null,
        int $maxLength = 0,
        $driverOptions = null
    ): bool {
        return $this->statement->bindColumn($column, $var, $type ?? PDO::PARAM_STR, $maxLength, $driverOptions);
    }

    /**
     * {@inheritDoc}
     */
    public function bindParam(
        string|int $param,
        &$var,
        ?int $type = null,
        int $maxLength = 0,
        $driverOptions = null
    ): bool {
        return $this->statement->bindParam($param, $var, $type ?? PDO::PARAM_STR, $maxLength, $driverOptions);
    }

    /**
     * {@inheritDoc}
     */
    public function bindValue(string|int $param, mixed $value, ?int $type = null): bool
    {
        return $this->statement->bindValue($param, $value, $type ?? PDO::PARAM_STR);
    }

    /**
     * {@inheritDoc}
     */
    public function closeCursor(): bool
    {
        return $this->statement->closeCursor();
    }

    /**
     * {@inheritDoc}
     */
    public function columnCount(): int
    {
        return $this->statement->columnCount();
    }

    /**
     * {@inheritDoc}
     */
    public function debugDumpParams(): ?bool
    {
        return $this->statement->debugDumpParams();
    }

    /**
     * {@inheritDoc}
     */
    public function errorCode(): ?string
    {
        return $this->statement->errorCode();
    }

    /**
     * {@inheritDoc}
     */
    public function errorInfo(): array
    {
        return $this->statement->errorInfo();
    }

    /**
     * {@inheritDoc}
     */
    public function execute(?array $params = null): bool
    {
        return $this->statement->execute($params);
    }

    /**
     * {@inheritDoc}
     */
    public function fetch(?int $mode, int $cursorOrientation, int $cursorOffset = 0)
    {
        return $this->statement->fetch($mode ?? PDO::PARAM_STR, $cursorOrientation, $cursorOffset);
    }

    /**
     * {@inheritDoc}
     */
    public function fetchAll(?int $mode = null): array|bool
    {
        return $this->statement->fetchAll($mode ?? PDO::PARAM_STR);
    }

    /**
     * {@inheritDoc}
     */
    public function fetchColumn(int $column = 0)
    {
        return $this->statement->fetchColumn($column);
    }

    /**
     * {@inheritDoc}
     */
    public function fetchObject(string $class = "stdClass", array $constructorArgs = []): object|false
    {
        return $this->statement->fetchObject($class, $constructorArgs);
    }

    /**
     * {@inheritDoc}
     */
    public function getAttribute(int $name)
    {
        return $this->statement->getAttribute($name);
    }

    /**
     * {@inheritdoc}
     */
    public function getColumnMeta(int $column): array|false
    {
        return $this->statement->getColumnMeta($column);
    }

    /**
     * {@inheritDoc}
     */
    public function nextRowset(): bool
    {
        return $this->statement->nextRowset();
    }

    /**
     * {@inheritDoc}
     */
    public function rowCount(): int
    {
        return $this->statement->rowCount();
    }

    /**
     * {@inheritDoc}
     */
    public function setAttribute(int $attribute, mixed $value): bool
    {
        return $this->statement->setAttribute($attribute, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function setFetchMode(int $mode): bool
    {
        return $this->statement->setFetchMode($mode);
    }
}
