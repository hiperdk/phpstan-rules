<?php

namespace Test\Application\Service;

use Test\Domain\Service\ServiceClassThatAccessDomain;

class ApplicationClassThatAccessService {
    public function __construct(ServiceClassThatAccessDomain $_) {

    }
}
