<?php 

use App\Entity\Postcode;
use Codeception\Util\HttpCode;
class PostcodeCest
{
    private $postCodeId;
    public function _before(FunctionalTester $I)
    {
    }

    public function runCommmandTest(FunctionalTester $I){
        $result = $I->runSymfonyConsoleCommand('app:import-postcodes', ['arg' => '/var/www/html/postcodes/2020-05.zip'], ['input']);
        $I->see('ok');
    }
}
