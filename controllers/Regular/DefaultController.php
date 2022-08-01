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
            $data = $db->getAll("SELECT * FROM services ORDER BY id");
        } else {
            $data = $db->getAll("SELECT * FROM services WHERE service_index = '".$service_index."'");
        }
        return json_encode($data);
    }
    public static function getNews($all_flag, $step)
    {
        $db = (new DatabaseORM())->ORM;
        if($all_flag == true){
            $data = $db->getAll("SELECT * FROM news ORDER BY news_date DESC");
        }
        if($step){
            $data = $db->getAll("SELECT * FROM news ORDER BY news_date DESC LIMIT '".$step."'");
        }
        return json_encode($data);
    }
}
