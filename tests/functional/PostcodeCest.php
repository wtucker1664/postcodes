<?php 

use Helper\Functional;

class PostcodeCest 
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function postcodePageTest(FunctionalTester $I)
    {
        $I->amOnPage("/postcode/AA");
        $I->canSee("postcode");
    }
    
    public function postcodePageLatLanTest(FunctionalTester $I)
    {
        $I->amOnPage("/postcode/57.101474/-2.242851");
        $I->canSee("lat");
    }
}
