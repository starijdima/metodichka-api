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

    public static function getServices($service_index)
    {
        $db = (new DatabaseORM())->ORM;
        if($service_index == 'all'){
            $data = $db->getAll("SELECT * FROM services");
        } else {
            $data = $db->getAll("SELECT * FROM services WHERE service_index = '".$service_index."'");
        }
        return json_encode($data);
    }
}
