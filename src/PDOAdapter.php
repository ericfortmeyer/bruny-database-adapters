<?php

declare(strict_types=1);

namespace Bruny\Adapters\DatabaseContext;

use PDO;

/**
 * Use this adapter to interface with PDO.
 */
class PDOAdapter implements DbAdapterInterface
{
    public function __construct(private PDO $db)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function beginTransaction(): bool
    {
        return $this->db->beginTransaction();
    }

    /**
     * {@inheritDoc}
     */
    public function commit(): bool
    {
        return $this->db->commit();
    }

    /**
     * {@inheritDoc}
     */
    public function errorCode(): ?string
    {
        return $this->db->errorCode();
    }

    /**
     * {@inheritDoc}
     */
    public function errorInfo(): array
    {
        return $this->db->errorInfo();
    }

    /**
     * {@inheritDoc}
     */
    public function exec(string $statement): int|false
    {
        return $this->db->exec($statement);
    }

    /**
     * {@inheritDoc}
     */
    public function getAttribute(int $attribute): bool|int|string|array|null
    {
        return $this->db->getAttribute($attribute);
    }

    /**
     * {@inheritDoc}
     */
    public static function getAvailableDrivers(): array
    {
        return PDO::getAvailableDrivers();
    }

    /**
     * {@inheritDoc}
     */
    public function inTransaction(): bool
    {
        return $this->db->inTransaction();
    }

    /**
     * {@inheritDoc}
     */
    public function lastInsertId(?string $name = null): string|false
    {
        return $this->db->lastInsertId($name);
    }

    /**
     * {@inheritDoc}
     */
    public function prepare(string $query, array $options = []): DbStatementAdapterInterface|false
    {
        $maybeStatement = $this->db->prepare($query, $options);
        return $maybeStatement ? new PDOStatementAdapter($maybeStatement) : $maybeStatement;
    }

    /**
     * {@inheritDoc}
     */
    public function query(string $query, ?int $fetchMode = null): DbStatementAdapterInterface|false
    {
        $maybeStatement = $this->db->query($query, $fetchMode);
        return $maybeStatement ? new PDOStatementAdapter($maybeStatement) : $maybeStatement;
    }

    /**
     * {@inheritDoc}
     */
    public function quote(string $string, ?int $type = null): string|false
    {
        return $this->db->quote($string, $type ?? PDO::PARAM_STR);
    }

    /**
     * {@inheritDoc}
     */
    public function rollBack(): bool
    {
        return $this->db->rollBack();
    }

    /**
     * {@inheritDoc}
     */
    public function setAttribute(int $attribute, array|int $value): bool
    {
        return $this->db->setAttribute($attribute, $value);
    }
}
