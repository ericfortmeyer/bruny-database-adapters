<?php

declare(strict_types=1);

namespace Bruny\Adapters\DatabaseContext;

/**
 * DbAdapters must implement this interface.
 */
interface DbAdapterInterface
{
    public function beginTransaction(): bool;
    public function commit(): bool;
    public function errorCode(): ?string;
    public function errorInfo(): array;
    public function exec(string $statement): int|false;
    public function getAttribute(int $attribute): bool|int|string|array|null;
    public static function getAvailableDrivers(): array;
    public function inTransaction(): bool;
    public function lastInsertId(?string $name = null): string|false;
    public function prepare(string $query, array $options = []): DbStatementAdapterInterface|false;
    public function query(string $query, ?int $fetchMode = null): DbStatementAdapterInterface|false;
    public function quote(string $string, ?int $type = null): string|false;
    public function rollBack(): bool;
    public function setAttribute(int $attribute, array|int $value): bool;
}
