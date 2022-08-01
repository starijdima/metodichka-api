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
    public static function getNews($news_id, $step)
    {
        $db = (new DatabaseORM())->ORM;
        if($news_id !== '0'){
            $data = $db->getAll("SELECT * FROM news WHERE id = '".$news_id."'");
        } else {
            if($step !== '0'){
                $data = $db->getAll("SELECT * FROM news ORDER BY news_date DESC LIMIT '".$step."'");
            } else {
                $data = $db->getAll("SELECT * FROM news where id between '".$step."' and '".((float)$step+20)."'ORDER BY news_date DESC");
            }
        }
        return json_encode($data);
    }
}
