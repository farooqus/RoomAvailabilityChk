<?php
namespace search\app;

/**
 * MySqlDataSource class implements IDataSource
 * To process MySQL data source.
 */
class MySqlDataSource implements IDataSource
{
    public function isRoomAvailable($fromDate, $stayLength)
    {
        // mysql implementation logic
    }
    
    public function storeBooking($fromDate, $toDate)
    {
        // mysql implementation logic
    }
}