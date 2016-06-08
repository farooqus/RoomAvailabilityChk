<?php
namespace search\app;

/**
 * IDataSource interface.
 * To be implement by all data source(s) 
 */	
interface IDataSource
{
    public function isRoomAvailable($fromDate, $stayLength);
    
    public function storeBooking($fromDate, $toDate);
}