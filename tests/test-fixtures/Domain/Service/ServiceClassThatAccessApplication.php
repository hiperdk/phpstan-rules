<?php

namespace Test\Domain\Service;

use Test\Application\Service\ApplicationClassThatAccessDomain;

class ServiceClassThatAccessApplication {
    public function __construct(ApplicationClassThatAccessDomain $_) {

    }
}
