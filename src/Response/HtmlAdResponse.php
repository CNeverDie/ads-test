<?php

namespace Borovets\ADS\Response;

use Borovets\ADS\Price;

class HtmlAdResponse extends AbstractResponse
{
    /**
     * @return string
     */
    public function render()
    {
        return $this->renderAd();
    }

    /**
     * @return string
     *
     * DO NOT DO THIS IN REAL PROJECT
     */
    private function renderAd()
    {
        return <<<HTML
<h1>{$this->ad->getName()}</h1>
<p>{$this->ad->getText()}</p>
<p>Стоимость: {$this->ad->getPrice()->get(Price::CURRENCY_RUB)} руб</p>
HTML;
    }
}