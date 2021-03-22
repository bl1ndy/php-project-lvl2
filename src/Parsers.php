<?php

namespace Differ\Parsers;

use Exception;
use Symfony\Component\Yaml\Yaml;

function parse(string $filePath)
{
    $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

    switch ($fileExtension) {
        case 'json':
            return json_decode(
                file_get_contents($filePath)
            );
        case 'yml':
        case 'yaml':
            return Yaml::parse(
                file_get_contents($filePath),
                Yaml::PARSE_OBJECT_FOR_MAP,
            );
        default:
            throw new Exception("File extension '$fileExtension' is not supported");
    }
}
