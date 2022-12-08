<?php

use CodeIgniter\Email\Email;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Email as ConfigEmail;
use PhpParser\Node\Expr\New_;

/**
 * @internal
 */
class EmailTest extends CIUnitTestCase{
    public function testKirimEmail(){
        $email = new Email(new ConfigEmail()) ;
        $email ->setFrom('rakarss11@gmail.com');
        $email ->setTo('rakasahal12@gmail.com');
        $email ->setSubject('meh');
        $email ->setAltMessage('halo teman');

        $this->assertTrue( $email->send() );
    }
}
?>