 <?php
namespace search\app;

require_once '../../../vendor/autoload.php';

//currently no db interface, owasp/min requirement to sanitize filters all user inputs
if (isset($_GET['bookDate']) && isset($_GET['staylength'])) {
	$bookDate = $_GET['bookDate'];	
	$stayLength = $_GET['staylength'];

	$datasource = new ArrayDataSource();
	$component = new RoomSearch($datasource);
	return $component->makeABooking($bookDate, $stayLength);	
}
return false;