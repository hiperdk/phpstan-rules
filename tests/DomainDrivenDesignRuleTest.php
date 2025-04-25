<?php declare(strict_types=1);

use Hiper\PHPStan\Rules\DomainDrivenDesignRule;
use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * @phpstan-type FixturePaths string[]
 * @phpstan-type ExpectedError array{0: string, 1: int, 2?: string|null}
 * @phpstan-type ExpectedErrors list<ExpectedError>
 * @phpstan-type Fixture array{0: FixturePaths, 1: ExpectedErrors}
 * @phpstan-type Fixtures Fixture[]
 *
 * @extends RuleTestCase<DomainDrivenDesignRule>
 */
class DomainDrivenDesignRuleTest extends RuleTestCase {
    protected function getRule(): Rule {
        return new DomainDrivenDesignRule();
    }

    /** @return Fixtures */
    public static function fixtureProvider(): array {
        return [
            [[__DIR__ . '/test-fixtures/Application/Service/ApplicationClassThatAccessDomain.php'], []],
            [[__DIR__ . '/test-fixtures/Application/Service/ApplicationClassThatAccessRepository.php'], []],
            [[__DIR__ . '/test-fixtures/Application/Service/ApplicationClassThatAccessService.php'], []],
            [[__DIR__ . '/test-fixtures/Application/Service/ApplicationClassThatAccessApplication.php'], []],
            [[__DIR__ . '/test-fixtures/Application/Service/ApplicationClassThatAccessInfrastructure.php'], [['The Application layer must not reference \\Test\\Infrastructure\\Infrastructure from the Infrastructure layer.', 8]]],
            [[__DIR__ . '/test-fixtures/Domain/Models/DomainClassThatAccessDomain.php'], []],
            [[__DIR__ . '/test-fixtures/Domain/Models/DomainClassThatAccessApplication.php'], [['The Domain layer must not reference \\Test\\Application\\Service\\ApplicationClassThatAccessDomain from the Application layer.', 8]]],
            [[__DIR__ . '/test-fixtures/Domain/Models/DomainClassThatAccessService.php'], [['The Domain Model layer must not reference \\Test\\Domain\\Service\\ServiceClassThatAccessDomain from the Domain Service layer.', 8]]],
            [[__DIR__ . '/test-fixtures/Domain/Models/DomainClassThatAccessRepository.php'], [['The Domain Model layer must not reference \\Test\\Domain\\Repositories\\RepositoryClassThatAccessDomain from the Domain Repository layer.', 8]]],
            [[__DIR__ . '/test-fixtures/Domain/Models/DomainClassThatAccessInfrastructure.php'], [['The Domain layer must not reference \\Test\\Infrastructure\\Infrastructure from the Infrastructure layer.', 8]]],
            [[__DIR__ . '/test-fixtures/Domain/Repositories/RepositoryClassThatAccessDomain.php'], []],
            [[__DIR__ . '/test-fixtures/Domain/Repositories/RepositoryClassThatAccessRepository.php'], [['The Domain Reposity layer must not reference \\Test\\Domain\\Repositories\\RepositoryClassThatAccessDomain from the Domain Repository layer.', 6]]],
            [[__DIR__ . '/test-fixtures/Domain/Repositories/RepositoryClassThatAccessService.php'], [['The Domain Reposity layer must not reference \\Test\\Domain\\Service\\ServiceClassThatAccessDomain from the Domain Service layer.', 8]]],
            [[__DIR__ . '/test-fixtures/Domain/Repositories/RepositoryClassThatAccessApplication.php'], [['The Domain layer must not reference \\Test\\Application\\Service\\ApplicationClassThatAccessDomain from the Application layer.', 8]]],
            [[__DIR__ . '/test-fixtures/Domain/Repositories/RepositoryClassThatAccessInfrastructure.php'], [['The Domain layer must not reference \\Test\\Infrastructure\\Infrastructure from the Infrastructure layer.', 8]]],
            [[__DIR__ . '/test-fixtures/Domain/Service/ServiceClassThatAccessDomain.php'], []],
            [[__DIR__ . '/test-fixtures/Domain/Service/ServiceClassThatAccessRepository.php'], [['The Domain Service layer must not reference \\Test\Domain\Repositories\RepositoryClassThatAccessDomain from the Domain Repository layer.', 8]]],
            [[__DIR__ . '/test-fixtures/Domain/Service/ServiceClassThatAccessService.php'], []],
            [[__DIR__ . '/test-fixtures/Domain/Service/ServiceClassThatAccessApplication.php'], [['The Domain layer must not reference \\Test\\Application\Service\\ApplicationClassThatAccessDomain from the Application layer.', 8]]],
            [[__DIR__ . '/test-fixtures/Domain/Service/ServiceClassThatAccessInfrastructure.php'], [['The Domain layer must not reference \\Test\\Infrastructure\\Infrastructure from the Infrastructure layer.', 8]]],
        ];
    }

    /**
     * @param FixturePaths $paths_to_fixture
     * @param ExpectedErrors $expected_errors
     */
    #[DataProvider('fixtureProvider')]
    public function testDomainDrivenDesignRules(array $paths_to_fixture, array $expected_errors): void {
        $this->analyse($paths_to_fixture, $expected_errors);
    }
}
