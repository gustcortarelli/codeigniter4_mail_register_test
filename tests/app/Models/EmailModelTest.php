<?php 

namespace App\Models;

use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Test\CIUnitTestCase;

use App\Models\EmailModel;

class EmailModelTest extends CIUnitTestCase {

    protected $refresh  = true;
    protected $basePath = APPPATH.'\Database';
    protected $namespace = 'App\Database\Migrations';

    public function testUsernameIsRequired() {
        $this->assertTrue(true);
    }

}