<?php

namespace App\Http\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class SectionsDTO extends DataTransferObject
{
    public string $name;

    public string $description;

    public bool $published;
}
