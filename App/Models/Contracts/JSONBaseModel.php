<?php


namespace App\Models\Contracts;

class JSONBaseModel extends BaseModel
{
    private string $db_folder;
    private string $table_json_file_path;

    public function __construct()
    {
        $this->db_folder = BASE_PATH . 'Storage/JSONDB';
        $this->table_json_file_path = $this->db_folder . '/' . $this->table . '.json';
    }

    public function create(array $new_data): int
    {
        $table_file_contents = json_decode(file_get_contents($this->table_json_file_path));
        $table_file_contents[] = $new_data;
        $table_file_contents_to_JSON = json_encode($table_file_contents);
        file_put_contents($this->table_json_file_path, $table_file_contents_to_JSON);
        return 1;
    }

    public function find(int $primary_key_value): ?object
    {
        $table_file_contents = json_decode(file_get_contents($this->table_json_file_path));
        foreach ($table_file_contents as $item) {
            if ($item->{$this->primary_key} === $primary_key_value) return ($item);
        }
        return null;
    }

    public function get(array $columns, array $where): array
    {
        return [];
    }

    public function getAll()
    {
        $table_file_contents = json_decode(file_get_contents($this->table_json_file_path));
        return $table_file_contents;
    }

    public function update(array $data, array $where): int
    {
        return 1;
    }

    public function delete(array $where): int
    {
        return 1;
    }
}