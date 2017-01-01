<?php
/**
 * Created by PhpStorm.
 * User: dpc
 * Date: 3/12/16
 * Time: 12:33 AM
 */

namespace Dpc\Exceptions;


use Exception;

class ExceptionManager extends Manager
{

    public function processException()
    {
        $type = $this->getExceptionType();
        $this->profiler->getProfileForException($this->getExceptionType());

    }

    private function getExceptionType(): Exception
    {
        return get_class($this->exception);
    }
}