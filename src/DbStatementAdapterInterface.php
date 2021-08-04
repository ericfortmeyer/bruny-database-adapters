<?php

declare(strict_types=1);

namespace Bruny\Adapters\DatabaseContext;

/**
 * Implement this interface to complete the adapter.
 */
interface DbStatementAdapterInterface
{
    public function bindColumn(
        string|int $column,
        &$var,
        ?int $type = null,
        int $maxLength = 0,
        $driverOptions = null
    ): bool;
    public function bindParam(
        string|int $param,
        &$var,
        ?int $type = null,
        int $maxLength = 0,
        $driverOptions = null
    ): bool;
    public function bindValue(string|int $param, mixed $value, ?int $type = null): bool;
    public function closeCursor(): bool;
    public function columnCount(): int;
    public function debugDumpParams(): ?bool;
    public function errorCode(): ?string;
    public function errorInfo(): array;
    public function execute(?array $params = null): bool;
    public function fetch(?int $mode, int $cursorOrientation, int $cursorOffset = 0);
    public function fetchAll(int $mode): array|bool;
    public function fetchColumn(int $column = 0);
    public function fetchObject(string $class = "stdClass", array $constructorArgs = []): object|false;
    public function getAttribute(int $name): mixed;
    public function getColumnMeta(int $column): array|false;
    public function nextRowset(): bool;
    public function rowCount(): int;
    public function setAttribute(int $attribute, mixed $value): bool;
    public function setFetchMode(int $mode): bool;
}
