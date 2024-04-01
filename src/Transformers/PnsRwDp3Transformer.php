<?php

namespace Kanekescom\Siasn\Simpeg\Transformers;

use League\Fractal\TransformerAbstract;

class PnsRwDp3Transformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(array $item)
    {
        $item['penilaiTmtGolongan_'] = convert_date_format($item['penilaiTmtGolongan'], 'd-m-Y', 'Y-m-d');

        return $item;
    }
}
