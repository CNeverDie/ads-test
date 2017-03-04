<?php

namespace Borovets\ADS\Source;


use Borovets\ADS\Advertisement;

class DaemonSource implements AdSource
{
    /**
     * @inheritdoc
     */
    public function getAd(int $id): Advertisement
    {
        return $this->transformDataToAd(
            $this->getDataFromDaemon($id)
        );
    }

    /**
     * @param int $id
     *
     * @return string
     */
    private function getDataFromDaemon(int $id)
    {
        return \LegacyCode\get_deamon_ad_info($id);
    }

    /**
     * @param $data
     *
     * @return Advertisement
     */
    private function transformDataToAd($data)
    {
        $arrayData = explode("\t", $data);

        return new Advertisement(
            (int) $arrayData[0], (string) $arrayData[3], (string) $arrayData[4], (float) $arrayData[5]
        );
    }

    /**
     * @inheritdoc
     */
    public static function getLogInfo($id): string
    {
        return sprintf('get_deamon_ad_info(ID=%d)', $id);
    }
}