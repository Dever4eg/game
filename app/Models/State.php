<?php


namespace Dever4eg\App\Models;


use Dever4eg\framework\Mvc\Model;

class State extends Model
{
    static protected $table = 'state';

    public $login;
    public $state = 'beginner';
    public $meta = 1;

    public function Next()
    {
        // 7 количество страничек beginner
        if ($this->meta < 7) {
            $this->meta += 1;
            $this->Save();
        } elseif ($this->meta >= 7) {
            $this->meta = 0;
            $this->state = 'gamer';
            $this->Save();

        }
    }
}