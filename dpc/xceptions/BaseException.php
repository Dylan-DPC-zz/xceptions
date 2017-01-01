<?php
/**
 * Created by PhpStorm.
 * User: dpc
 * Date: 11/7/16
 * Time: 12:09 AM
 */

namespace App\Exceptions;


use Exception;

abstract class BaseException extends Exception
{
    protected $status;

    protected $message;

    /**
     * BaseException constructor.
     * @param $status
     * @param $message
     */
    public function __construct()
    {
        $this->message = $this->constructMessage();
    }

    public function getStatus()
    {
        return $this->status;

    }


    public function toArray()
    {
        return [
            'status' => $this->status,
            'message' => $this->message
        ];
    }

    abstract protected function constructMessage();

    abstract public function handle();

    /** pretty prints the exception array into a string.
     * @param array $exceptionData
     * @return string
     */
    public function prettyPrintArray(array $exceptionData)
    {
        $exceptionString = '';
        foreach ($exceptionData as $key => $value) {
            $exceptionString .= $key . ': ' . $value;
        }
        return $exceptionString;
    }

}