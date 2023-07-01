<?php
declare(strict_types=1);

namespace App\Models;


class Form
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    protected function setId($id)
    {
        $this->id = $id;
    }

    protected $content;

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public static function getAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM data ORDER BY id ASC';
        
        return $db->query($sql,self::class, []);
    }

    public static function findByID($id)
    {
        $db = new Db();

        $sql = 'SELECT * FROM data WHERE id=:id';

        $data = $db->query($sql, self::class, [':id' => $id]);

        return $data ? $data[0] : null;
    }

    public function insert()
    {
        $db = new Db();

        $sql = 'INSERT INTO data (content) VALUES (:content)';

        $data = [];
        $data[':content'] = $this->getContent();

        $db->execute($sql, $data);

        $this->setId($db->getLastId());
    }

    public function validation($data)
    {
        $data = htmlspecialchars(trim($data['story']), ENT_QUOTES);

        if(true === $this->isEmpty($data)){
            return $data;
        }
        return false;
    }

    protected function isEmpty($data):bool
    {
        if(!empty($data)) {
            return true;
        }
        if('' === $data) {
            return false;
        }
        return false;
    }
}