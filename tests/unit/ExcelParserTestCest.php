<?php

use mroldanmx\php\ExcelParser;

class ExcelParserTestCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
	    $e = new ExcelParser();
	    $e->load();
    }
}
