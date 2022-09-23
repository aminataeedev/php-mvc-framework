<?php

namespace App\Models\Contracts;

interface CRUDInterface
{
    public function create(array $new_data): int;

    public function find(int $primary_key_value): ?object;

    public function get(array $columns, array $where): array;

    public function update(array $data, array $where): int;

    public function delete(array $where): int;
}