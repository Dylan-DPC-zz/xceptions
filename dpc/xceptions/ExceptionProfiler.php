<?php
/**
 * Created by PhpStorm.
 * User: dpc
 * Date: 15/12/16
 * Time: 12:38 AM
 */

namespace Dpc\Exceptions;


use Exception;
use Illuminate\Support\Collection;

class ExceptionProfiler
{

    protected $profileSet;
    protected $profile;

    public function __construct()
    {
        $this->profileSet = collect(config('xceptions.profile'));
    }

    public function getProfileForException(String $exceptionClass)
    {
        return $this->searchProfile($exceptionClass);
    }

    private function searchProfile(String $exceptionClass) : Collection
    {
        $profiles = $this->profileSet->map(function($profileItem) use ($exceptionClass) {
            return array_search($exceptionClass, $profileItem);
        });

        return $profiles ? : $this->getDefaultProfile();
    }

    private function getDefaultProfile(): Collection
    {
        return collect($this->profileSet['config'] ?? []);
    }


}