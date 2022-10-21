<?php declare(strict_types=1);

namespace App\Model\TheTVDB\Schema;

abstract class BaseSchema
{
    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            if (isset($this->$key) && $value) {
                $this->$key = $value;
            }
        }
    }
}
