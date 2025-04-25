<?php

namespace Test\Domain\Service;

use Test\Infrastructure\Infrastructure;

class ServiceClassThatAccessInfrastructure {
    public function __construct(Infrastructure $_) {

    }
}
