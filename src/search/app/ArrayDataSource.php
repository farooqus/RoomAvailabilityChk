<?php
namespace search\app;

/**
 * ArrayDataSource class implements IDataSource
 * To process hardcoded data set.
 */
class ArrayDataSource implements IDataSource
{
	/**
	 * isRoomAvailable to check rooms on given date
	 * @param date $fromDate, $toDate
	 * @return array
	 */
    public function isRoomAvailable($fromDate, $stayLength)
    {
		//clean date format
		$bookDate = $this->cleanDate($fromDate);
		$endDate = date('Y-m-d', strtotime($bookDate. ' + '.$stayLength.' days'));

		//prepare requested dates
		$requestDates = $this->requestRegisterDays($bookDate, $stayLength);
		$datesBooked = $this->bookedDates();

		//matching requested dates and booked dates
		$result = $this->datesAvailability($datesBooked, $requestDates);

		echo json_encode( $result );
		return $result['message'];
    }
	
	/**
	 * cleanDate to format date as required
	 * @param date $date
	 * @return array
	 */
    public function cleanDate($date) 
    {
		$bookDate = substr($date, 0, 10);
		$bookDate = date("Y-m-d", strtotime($bookDate));
		return $bookDate;
    }
	
	/**
	 * bookedDates to fetched booked dates
	 * @return array
	 */
	public function bookedDates() 
	{
		//Dummy booked dates	
		$datesBooked = array(
			'2016-05-16',
			'2016-05-17',
			'2016-05-28',
			'2016-05-29',			
			'2016-05-30' 
		);		
		return $datesBooked;	
	}
	
	/**
	 * requestRegisterDays to generate all dates requested
	 * @param date $date, int  $stayLength
	 * @return array
	 */
	public function requestRegisterDays($bookDate, $stayLength) 
	{
		for ($i = 0; $i <= $stayLength; $i++) {
			$requestDates[] = date('Y-m-d', strtotime($bookDate. ' + '.$i.' days'));
		}
		return $requestDates;	
	}

	/**
	 * datesAvailability to match requested dates and booked dates
	 * @param array $datesBooked, array  $requestDates
	 * @return array
	 */
	public function datesAvailability($datesBooked, $requestDates) 
	{
		$result['dates'] = array_intersect($datesBooked, $requestDates);			
		$result = array_filter($result);
		
		//result data set can be enhace by showing exact dates, and mre details like type, features.
		if (!empty($result)) {
			$result['message'] = "Room not available";
		}
		else {
			$result['message'] = "Room available";
		}		
		return $result;	
	}
    
	/**
	* To be implemented
	*/
    public function storeBooking($fromDate, $toDate)
    {
        return true;
    }
}