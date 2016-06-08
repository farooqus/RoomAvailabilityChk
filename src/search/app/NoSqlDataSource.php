<?php
namespace search\app;

/**
 * MySqlDataSource class implements IDataSource
 * To process NoSQL data source.
 */
class NoSqlDataSource implements IDataSource
{
    public function isRoomAvailable($fromDate, $stayLength)
    {
        // nosql implementation logic
    }
    
    public function storeBooking($fromDate, $toDate)
    {
        // nosql implementation logic
    }
}