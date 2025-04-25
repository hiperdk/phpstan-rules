<?php

namespace Test\Application\Service;

use Test\Domain\Repositories\ServiceClasssThatAccessDomain;

class ApplicationClassThatAccessRepository {
    public function __construct(ServiceClasssThatAccessDomain $_) {

    }
}
