<?php

namespace App\MessageBus\Message;

/**
 * @package App\MessageBus\Message
 */
final class ProcessMessage
{
    const STEP_PREPARING = 1;
    const STEP_RUNNING = 2;

    /**
     * @var string $name
     */
    private string $name;

    /**
     * @var int $step
     */
    private int $step;

    /**
     * @param string $name
     * @param int $step
     */
    public function __construct(string $name, int $step)
    {
        $this->name = $name;
        $this->step = $step;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStep(): int
    {
        return $this->step;
    }
}