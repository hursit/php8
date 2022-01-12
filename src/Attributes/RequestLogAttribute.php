<?php
namespace App\Attributes;

#[\Attribute(\Attribute::TARGET_FUNCTION)]
class RequestLogAttribute
{
    public function __construct (
        private ?string $database,
        private ?string $collection
    )
    {
    }

    /**
     * @return string|null
     */
    public function getDatabase (): ?string
    {
        return $this->database;
    }

    /**
     * @param string|null $database
     *
     * @return RequestLogAttribute
     */
    public function setDatabase (?string $database): RequestLogAttribute
    {
        $this->database = $database;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCollection (): ?string
    {
        return $this->collection;
    }

    /**
     * @param string|null $collection
     *
     * @return RequestLogAttribute
     */
    public function setCollection (?string $collection): RequestLogAttribute
    {
        $this->collection = $collection;
        return $this;
    }
}