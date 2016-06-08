<?php
use search\app\ArrayDataSource;
/**
 * ArrayDataSourceTest to perform PHP unit test
 * To process hardcoded data set.
 */
class ArrayDataSourceTest extends  PHPUnit_Framework_TestCase
{
	/**
	 * testIsRoomAvailable to verfiy success
	 * To process hardcoded data set.
	 */	
	public function testIsRoomAvailable()
    {		
		$testArrayData = new ArrayDataSource();

		$result = $testArrayData->isRoomAvailable('22-4-2016', 1);
		
		$this->assertEquals("Room available", $result);
    }

	/**
	 * testIsRoomNotAvailable to verfiy failure
	 * To process hardcoded data set.
	 */	
	public function testIsRoomNotAvailable()
    {		
		$testArrayData = new ArrayDataSource();

		$result = $testArrayData->isRoomAvailable('17-5-2016', 1);
		
		$this->assertEquals("Room not available", $result);
    }
}
?>