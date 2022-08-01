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

    public static function getUser($login)
    {
        $db = (new DatabaseORM())->ORM;
        $data = $db->getAll("SELECT * FROM users WHERE login = '".$login."'");
        return json_encode($data);
    }

    public static function getChat($from_user, $to_user)
    {
        $db = (new DatabaseORM())->ORM;
        $data = $db->getAll("SELECT * FROM chats WHERE from_user = '".$from_user."' and to_user='".$to_user."' or from_user = '".$to_user."' and to_user='".$from_user."'");
        return json_encode($data);
    }

    public static function users()
    {
        $db = (new DatabaseORM())->ORM;
        $data = $db->getAll("SELECT * FROM users");
        return json_encode($data);
    }

    public static function usersJournal($journal_place, $journal_group)
    {
        $db = (new DatabaseORM())->ORM;
        if($journal_place == 'europort'){
            $journal_place = 'ТЦ Европорт';
        } else {
            $journal_place = 'ул. Замятина, д. 4';
        }
        if($journal_group == 'young') {
            $journal_group = 'Младшая';
        }
        if($journal_group == 'middle') {
            $journal_group = 'Средняя';
        }
        if($journal_group == 'older') {
            $journal_group = 'Старшая';
        }
        $data = $db->getAll("SELECT * FROM users WHERE place_to_learn = '".$journal_place."' AND journal_group = '".$journal_group."'");
        return json_encode($data);
    }

    public static function getUserById($id)
    {
        $db = (new DatabaseORM())->ORM;
        $data = $db->getAll("SELECT * FROM users WHERE id = '".$id."'");
        return json_encode($data);
    }

    public static function msg()
    {
        $db = (new DatabaseORM())->ORM;
        $data = $_POST;
        // Указываем, что будем работать с таблицей chats
        $chat = $db->dispense('chats');
        // Заполняем объект свойствами
        $chat->to_user = $data['to_user'];
        $chat->from_user = $data['from_user'];
        $chat->chat_text = $data['chat_text'];
        // Сохраняем объект
        $db->store($chat);
        return json_encode($data);
    }

    public static function newJournalItem()
    {
        $db = (new DatabaseORM())->ORM;
        $data = $_POST;
        // Указываем, что будем работать с таблицей chats
        $journal = $db->dispense('journal');
        // Заполняем объект свойствами
        $journal->kid_name = $data['kid_name'];
        $journal->kid_last_name = $data['kid_last_name'];
        $journal->kid_middle_name = $data['kid_middle_name'];
        $journal->is_present = $data['is_present'];
        $journal->home_work = $data['home_work'];
        $journal->active = $data['active'];
        $journal->lesson_date = $data['lesson_date'];
        $journal->journal_group = $data['journal_group'];
        $journal->journal_place = $data['journal_place'];
        $db->store($journal);
        return json_encode($data);
    }

    public static function setIsPresent()
    {
        $db = (new DatabaseORM())->ORM;
        $data = $_POST;
        $id = $data['id'];
        $journal = $db->load('journal', $id);
        $journal->is_present = $data['is_present'];
        $db->store($journal);
        return json_encode($data);
    }

    public static function setHomeWork()
    {
        $db = (new DatabaseORM())->ORM;
        $data = $_POST;
        $id = $data['id'];
        $journal = $db->load('journal', $id);
        $journal->home_work = $data['home_work'];
        $db->store($journal);
        return json_encode($data);
    }

    public static function setActive()
    {
        $db = (new DatabaseORM())->ORM;
        $data = $_POST;
        $id = $data['id'];
        $journal = $db->load('journal', $id);
        $journal->active = $data['active'];
        $db->store($journal);
        return json_encode($data);
    }

    public static function setYearSumm()
    {
        $db = (new DatabaseORM())->ORM;
        $data = $_POST;
        $id = $data['id'];
        $users = $db->load('users', $id);
        $users->year_summ = $users->year_summ + $data['year_summ'];
        $db->store($users);
        return json_encode($data);
    }

    public static function journal()
    {
        $db = (new DatabaseORM())->ORM;
        $data = $db->getAll("SELECT * FROM journal order by lesson_date");
        return json_encode($data);
    }

    public static function journalItem($journal_place, $journal_group, $lesson_date)
    {
        $db = (new DatabaseORM())->ORM;
        if($journal_place == 'europort'){
            $journal_place = 'ТЦ Европорт';
        } else {
            $journal_place = 'ул. Замятина, д. 4';
        }
        if($journal_group == 'young') {
            $journal_group = 'Младшая';
        }
        if($journal_group == 'middle') {
            $journal_group = 'Средняя';
        }
        if($journal_group == 'older') {
            $journal_group = 'Старшая';
        }
        if($lesson_date == 'all') {
            $data = $db->getAll("SELECT * FROM journal WHERE journal_place = '".$journal_place."' AND journal_group = '".$journal_group."'");
        } else {
            $data = $db->getAll("SELECT * FROM journal WHERE journal_place = '".$journal_place."' AND journal_group = '".$journal_group."' AND lesson_date = '".$lesson_date."'");
        }
        return json_encode($data);
    }

    public static function getYearSumm($journal_place, $journal_group)
    {
        $db = (new DatabaseORM())->ORM;
        if($journal_place == 'europort'){
            $journal_place = 'ТЦ Европорт';
        } else {
            $journal_place = 'ул. Замятина, д. 4';
        }
        if($journal_group == 'young') {
            $journal_group = 'Младшая';
        }
        if($journal_group == 'middle') {
            $journal_group = 'Средняя';
        }
        if($journal_group == 'older') {
            $journal_group = 'Старшая';
        }
        $data = $db->getAll("SELECT * FROM users WHERE place_to_learn = '".$journal_place."' AND journal_group = '".$journal_group."'");
        return json_encode($data);
    }

   public static function registration($who)
      {
        $db = (new DatabaseORM())->ORM;
        $data = $_POST;
        // Указываем, что будем работать с таблицей users
        $users = $db->dispense('users');
        // Заполняем объект свойствами
        $users->login = $data['login'];
        $users->password = md5($data['password']);
        $users->id;
        $users->person_name = $data['person_name'];
        $users->person_middle_name = $data['person_middle_name'];
        $users->person_last_name = $data['person_last_name'];
        $users->person_character = $data['person_character'];
        if ($who=='parent'){
            $users->kid_name = $data['kid_name'];
            $users->kid_last_name = $data['kid_last_name'];
            $users->kid_middle_name = $data['kid_middle_name'];
            $users->place_to_learn = $data['place_to_learn'];
            $users->journal_group = $data['group'];
        } else {
            $users->place_to_work = $data['place_to_work'];
        }
        // Сохраняем объект
        $db->store($users);
        return json_encode($data);
      }

   public static function del(){
        $db = (new DatabaseORM())->ORM;
        $data = $_POST;
        $id = $data['id'];
        $finance = $db->load('finance', $id);
        $db->trash($finance);
        return json_encode($data);

   }
}
