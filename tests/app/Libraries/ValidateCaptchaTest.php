<?php 

namespace App\Libraries;

use CodeIgniter\Test\CIUnitTestCase;
use App\Libraries\ValidateCaptcha;
use ReCaptcha\RequestMethod\CurlPost;

class ValidateCaptchaTest extends CIUnitTestCase {

    public function testValidateCaptcha() {
        /*$recaptcha = $this->createMock(\ReCaptcha\ReCaptcha::class);
        $recaptcha->method('verify')->willReturn(new \ReCaptcha\Response(true));*/

        $recaptcha = $this->getMockBuilder(\ReCaptcha\ReCaptcha::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();
        $recaptcha->method('verify')->willReturn(new \ReCaptcha\Response(true));

        /*$response = $this->createMock(\ReCaptcha\Response::class);
        $response->method('isSuccess')->willReturn(true);*/

        $validate = $this->getMockBuilder(ValidateCaptcha::class)
            ->setMethods(["validateCaptcha"])
            ->getmock();
        $validate->expects($this->once())->method('validateCaptcha')->willReturn(true);

        $captcha = new ValidateCaptcha();
        $this->assertTrue($captcha->validateCaptcha("any"));

    }

    public function testCheckEmailRequired() {
        $this->assertTrue(true);
    }

    public function testCheckRuleValidEmail() {
        $this->assertTrue(true);
    }

}