<?php declare(strict_types=1);

// Singleton pattern from https://refactoring.guru/design-patterns/singleton/php/example

class Page
{
    private static array $instances = [];
    private string $title;

    private function __construct() { }

    private function __clone() { }

    /** @throws Exception */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): Page
    {
        $cls = static::class;

        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
