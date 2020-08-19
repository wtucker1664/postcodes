<?php 


class PostcodesTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
       
    }

    protected function _after()
    {
    }

    // tests
    public function testPostcodeFind()
    {
        $postcodeR = $this->getModule("Symfony")->_getContainer()->get('postcodeRepository');  
      
        $this->assertIsObject($postcodeR, "Yep");
        
        $result = $postcodeR->findByPartialPostcode("AA");
        
        $this->assertArrayHasKey("postcode", $result[0], "Yep");
        
    }
    
    public function testLatLonFind()
    {
        $postcodeR = $this->getModule("Symfony")->_getContainer()->get('postcodeRepository');  
      
        $this->assertIsObject($postcodeR, "Yep");
        
        $result = $postcodeR->findByLatLonPostcode("57.101474","-2.242851");
        $this->assertArrayHasKey("postcode", $result[0], "Yep");
    }
}