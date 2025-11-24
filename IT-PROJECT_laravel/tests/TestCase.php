<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Clean MongoDB collections before each test
        $this->cleanMongoCollections();
    }

    /**
     * Clean up MongoDB collections after tests.
     */
    protected function tearDown(): void
    {
        $this->cleanMongoCollections();
        parent::tearDown();
    }

    /**
     * Clean all MongoDB collections used in tests.
     */
    protected function cleanMongoCollections(): void
    {
        $collections = [
            'users',
            'forms_transactions',
            'form1_01',
            'form1_02',
            'form1_03',
            'form1_09',
            'form1_11',
            'form1_20',
            'form1_22',
            'form1_25',
        ];

        foreach ($collections as $collection) {
            try {
                DB::connection('mongodb')->table($collection)->truncate();
            } catch (\Exception $e) {
                // Collection might not exist yet, which is fine
            }
        }
    }
}
