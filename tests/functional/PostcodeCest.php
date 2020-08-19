<?php 

use Helper\Functional;

class PostcodeCest 
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
  //  public function commandAppPostcodeTest(FunctionalTester $I)
   // {
        //$s = $I->runSymfonyConsoleCommand("app:import-postcodes",["args" => "/var/www/html/2020-05.zip"]); // Not working issue with run runSymfonyConsoleCommand it looks like
  //  }
    
     public function postcodePageTest(FunctionalTester $I)
    {
        $I->amOnPage("/postcode/AA");
        $I->canSee("postcode");
    }
    
    public function postcodePageLatLonTest(FunctionalTester $I)
    {
        $I->amOnPage("/postcode/57.101474/-2.242851");
        $I->canSee("lat");
    }
}
