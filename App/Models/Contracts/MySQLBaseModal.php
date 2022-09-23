<?php

namespace App\Models\Contracts;

use App\Utilities\Arr;
use Medoo\Medoo;

class MySQLBaseModal extends BaseModel
{
    private string $db_folder;
    private string $table_json_file_path;

    public function __construct(int $entity_id = null)
    {
        $this->connection = new Medoo([
            'type' => 'mysql',
            'host' => $_ENV['DB_HOST'],
            'database' => $_ENV['DB_NAME'],
            'username' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD']
        ]);
        if ($entity_id) {
            $this->find($entity_id);
        }
    }

    public function find(int $primary_key_value): ?object
    {
        $find_item = $this->connection->get($this->table, '*', [$this->primary_key => $primary_key_value]);
        $this->attributes = $find_item;
        return $this;
    }

    public function get(array|string $columns, array $where): array
    {
        return $this->connection->select($this->table, $columns, $where);
    }

    public function create(array $new_data): int
    {
        echo $this->table;
        Arr::prettify($new_data);
        $this->connection->insert($this->table, $new_data);
        return $this->connection->id();
    }

    public function save(): int
    {
        return $this->update($this->attributes, [$this->primary_key => $this->{$this->primary_key}]);
    }

    public function update(array $data, array $where): int
    {
        return $this->connection->update($this->table, $data, $where)->rowCount();
    }

    public function remove(): int
    {
        return $this->delete([$this->primary_key => $this->{$this->primary_key}]);
    }

    public function delete(array $where): int
    {
        return $this->connection->delete($this->table, $where)->rowCount();
    }
}