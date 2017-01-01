<?php

namespace Dpc\Exceptions;


use Exception;

abstract class Manager
{
    protected $exception;
    protected $profiler;

    /**
     * Manager constructor.
     * @param $profiler
     */
    public function __construct(ExceptionProfiler $profiler)
    {
        $this->profiler = $profiler;
    }


    public function registerException($exception)
    {
        $this->exception = $exception;
    }

    public function renderException($exception)
    {
        $this->registerException($exception);
        return $this->processException();
    }

    abstract public function processException();
}
