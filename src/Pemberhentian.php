<?php

namespace Kanekescom\Siasn\Simpeg;

use Kanekescom\Siasn\Simpeg\Api\Pemberhentian as PemberhentianClient;
use Kanekescom\Siasn\Simpeg\Helpers\PemberhentianPensiunListResponseTransformer;
use Kanekescom\Siasn\Simpeg\Transformers\PnsListPensiunInstansiTransformer;

class Pemberhentian
{
    public static function getPensiunList(array $paths = [], array $query = [])
    {
        return new PemberhentianPensiunListResponseTransformer(
            PemberhentianClient::getPensiunList($paths, $query),
            new PnsListPensiunInstansiTransformer
        );
    }
}
