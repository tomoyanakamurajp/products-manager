<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductLedgersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductLedgersTable Test Case
 */
class ProductLedgersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductLedgersTable
     */
    protected $ProductLedgers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ProductLedgers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProductLedgers') ? [] : ['className' => ProductLedgersTable::class];
        $this->ProductLedgers = $this->getTableLocator()->get('ProductLedgers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ProductLedgers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
