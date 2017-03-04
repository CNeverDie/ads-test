<?php

namespace Borovets\ADS\Source;

use Borovets\ADS\Advertisement;

class DBSource implements AdSource
{
    /**
     * @inheritdoc
     */
    public static function getLogInfo($id): string
    {
        return sprintf('getAdRecord(ID=%d)', $id);
    }

    /**
     * @inheritdoc
     */
    public function getAd(int $id): Advertisement
    {
        $data = $this->getDataFromDB($id);

        return $this->transformToAdd($data);
    }

    /**
     * @param $id
     *
     * @return array
     */
    private function getDataFromDB($id)
    {
        return \LegacyCode\getAdRecord($id);
    }

    /**
     * @param $data
     *
     * @return Advertisement
     */
    private function transformToAdd($data): Advertisement
    {
        return new Advertisement(
            (int) $data['id'], (string) $data['name'], (string) $data['text'], (float) $data['price']
        );
    }
}