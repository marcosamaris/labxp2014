<?php

/**
 * Myplugin Unit Tests
 *
 * see: http://simpletest.org/index.html
 */
class MypluginUnitTest extends ElggCoreUnitTest {
	
	public function testFunction1() {
		$value = myplugin_function1();
		$this->assertTrue($value);
	}
	
	public function testFunction2() {
		$value = myplugin_function2();
		$this->assertIdentical("hello, world", $value);
	}
	
	public function testFunction3() {
		try {
			$value = myplugin_function3();
			$this->assertTrue(FALSE);
		} catch (Exception $e) {
			$this->assertIsA($e, 'CallException');
			$this->assertIdentical($e->getMessage(), 'test');
		}		
	}
}