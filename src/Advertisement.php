<?php

namespace Borovets\ADS;


final class Advertisement implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $price;

    /**
     * Ad constructor
     *
     * @param int $id
     * @param string $name
     * @param string $text
     * @param string $keyword
     * @param string $price
     */
    public function __construct(int $id, string $name, string $text, string $price)
    {

        $this->id = $id;
        $this->name = $name;
        $this->text = $text;
        $this->price = new Price($price);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return Price
     */
    public function getPrice(): Price
    {
        return $this->price;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->getName(),
            'text' => $this->getText(),
            'price' => $this->getPrice()->get()
        ];
    }
}