<?php

namespace Hiper\PHPStan\Rules;

use PhpParser\Node;
use PhpParser\Node\Name\FullyQualified;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\IdentifierRuleError;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;

/**
 * @implements Rule<FullyQualified>
 */
class DomainDrivenDesignRule implements Rule {
    #[\Override]
    public function getNodeType(): string {
        return FullyQualified::class;
    }

    #[\Override]
    public function processNode(Node $node, Scope $scope): array {
        $currentFile = $scope->getFile();

        if (str_contains($currentFile, '/Domain/')) {
            return $this->domainRule($node, $scope);
        }

        if (str_contains($currentFile, '/Application/')) {
            return $this->applicationRule($node);
        }

        return [];
    }

    /**
     * @param FullyQualified $node
     *
     * @return list<IdentifierRuleError>
     */
    protected function domainRule(Node $node, Scope $scope): array {
        $usedClass = $node->toCodeString();

        if (str_contains($usedClass, '\\Infrastructures\\') || str_contains($usedClass, '\\Infrastructure\\')) {
            return [
                RuleErrorBuilder::message('The Domain layer must not reference ' . $usedClass . ' from the Infrastructure layer.')
                    ->identifier('ddd.domainAccessInfrastructureViolation')
                    ->build(),
            ];
        }

        if (str_contains($usedClass, '\\Applications\\') || str_contains($usedClass, '\\Application\\')) {
            return [
                RuleErrorBuilder::message('The Domain layer must not reference ' . $usedClass . ' from the Application layer.')
                    ->identifier('ddd.domainAccessApplicationViolation')
                    ->build(),
            ];
        }

        $currentFile = $scope->getFile();
        if (str_contains($currentFile, '/Models/') || str_contains($currentFile, '/Model/')) {
            if (str_contains($usedClass, '\\Repositories\\') || str_contains($usedClass, '\\Repository\\')) {
                return [
                    RuleErrorBuilder::message('The Domain Model layer must not reference ' . $usedClass . ' from the Domain Repository layer.')
                        ->identifier('ddd.domainModelAccessDomainRepositoryViolation')
                        ->build(),
                ];
            }

            if (str_contains($usedClass, '\\Services\\') || str_contains($usedClass, '\\Service\\')) {
                return [
                    RuleErrorBuilder::message('The Domain Model layer must not reference ' . $usedClass . ' from the Domain Service layer.')
                        ->identifier('ddd.domainModelAccessDomainServiceViolation')
                        ->build(),
                ];
            }
        }
        if (str_contains($currentFile, '/Repositories/') || str_contains($currentFile, '/Repository/')) {
            if (str_contains($usedClass, '\\Repositories\\') || str_contains($usedClass, '\\Repository\\')) {
                return [
                    RuleErrorBuilder::message('The Domain Reposity layer must not reference ' . $usedClass . ' from the Domain Repository layer.')
                        ->identifier('ddd.domainRepositoryAccessDomainRepositoryViolation')
                        ->build(),
                ];
            }
            if (str_contains($usedClass, '\\Services\\') || str_contains($usedClass, '\\Service\\')) {
                return [
                    RuleErrorBuilder::message('The Domain Reposity layer must not reference ' . $usedClass . ' from the Domain Service layer.')
                        ->identifier('ddd.domainRepositoryAccessDomainServiceViolation')
                        ->build(),
                ];
            }
        }
        if (str_contains($currentFile, '/Services/') || str_contains($currentFile, '/Service/')) {
            if (str_contains($usedClass, '\\Repositories\\') || str_contains($usedClass, '\\Repository\\')) {
                return [
                    RuleErrorBuilder::message('The Domain Service layer must not reference ' . $usedClass . ' from the Domain Repository layer.')
                        ->identifier('ddd.domainServiceAccessDomainRepositoryViolation')
                        ->build(),
                ];
            }
        }

        return [];
    }

    /**
     * @param FullyQualified $node
     *
     * @return list<IdentifierRuleError>
     */
    protected function applicationRule(Node $node): array {
        $usedClass = $node->toCodeString();
        if (str_contains($usedClass, '\\Infrastructures\\') || str_contains($usedClass, '\\Infrastructure\\')) {
            return [
                RuleErrorBuilder::message('The Application layer must not reference ' . $usedClass . ' from the Infrastructure layer.')
                    ->identifier('ddd.applicationAccessInfrastructure')
                    ->build(),
            ];
        }

        return [];
    }
}
