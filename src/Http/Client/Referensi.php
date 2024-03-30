<?php

namespace Kanekescom\Siasn\Simpeg\Http\Client;

use Kanekescom\Siasn\Simpeg\Api\Http\Client\Referensi as ReferensiClient;
use Kanekescom\Siasn\Simpeg\Helpers\ReferensiResponseTransformer;
use Kanekescom\Siasn\Simpeg\Transformers\ReferensiRefUnorTransformer;

class Referensi
{
    public static function getUnor()
    {
        return new ReferensiResponseTransformer(
            ReferensiClient::getUnor(),
            new ReferensiRefUnorTransformer
        );
    }
}