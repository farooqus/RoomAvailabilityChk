<?php
namespace search\app;

/**
 * RoomSearch class 
 * To process data source.
 */
class RoomSearch
{
    private $dataSource;
    
    public function __construct(IDataSource $source)
    {
        $this->dataSource = $source;
    }
    
    public function makeABooking($fromDate, $stayLength) 
    {
        if($this->dataSource->isRoomAvailable($fromDate, $stayLength))
        {
            return $this->dataSource->storeBooking($fromDate, $stayLength);
        }
    }
}