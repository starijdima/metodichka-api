<?php 
namespace Roast\Controllers\Regular;
use Roast\App;
use Roast\Controller;
use Roast\Response;
use Roast\DatabaseORM;

class DefaultController extends Controller
{

   /**
    * welcome
    * @return void
    */
   public static function welcome()
   {
     return Response::JSON(App::Ver());
   }

    public static function getServices($service_name)
    {
        $db = (new DatabaseORM())->ORM;
        if($service_name === 'all'){
            $data = $db->getAll("SELECT * FROM services");
        } else {
            $data = $db->getAll("SELECT * FROM services WHERE service_name = '".$service_name."'");
        }
        return json_encode($data);
    }
}
