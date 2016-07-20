<?php

interface IDB {
    public function __construct();
    public function __destruct();
    public function Query($sql, $arr = array(), $fm = PDO::FETCH_ASSOC);
    public function getLastInsertId();
    public function getStatus();
    public function getConn();
}

class DB implements IDB {
    private $conn;
    private $sql;
    private $mf;

    /**
     * Конструктор базы данных
     * @param MainFunctions $mainF
     */
    public function __construct() {
        $this->mf = $GLOBALS['mainFunc'];

        try {
            $this->conn = new PDO("pgsql:dbname=" . DBDataBase . ";host=" . DBHost . ";port=" . DBPort, DBUser, DBPassword,
            array(
                PDO::ATTR_TIMEOUT => "5",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
            $this->conn->exec('SET search_path TO ' . DBSearchPath);
        } catch (PDOException $e) {
            $this->mf->d('Ошибка подключения к базе данных: ' . $e->getMessage());
        }
    }

    /**
     * Деструктор базы данных
     */
    public function __destruct() {
        $this->conn = null;
    }

    /**
     * Функция запроса к базе данных, с возвращемыми данными
     * @param string $sql SQL-запрос
     * @param array $arr Параметры
     * @param fetchType $fm  Тип формирования результата
     * @return PDO
     */
    public function Query($sql, $arr = array(), $fm = PDO::FETCH_ASSOC) {
        try {
            $this->sql = $this->conn->prepare($sql);
            $this->sql->execute($arr);
            $this->sql->setFetchMode($fm);
        } catch (Exception $e) {
            $this->mf->d('Ошибка подключения к базе данных: ' . $e->getMessage());
        }

        return $this->sql;
    }

    /**
     * Получение индекса последней строки
     * @return int
     */
    public function getLastInsertId() {
        return $this->conn->lastInsertId();
    }

    /**
     * Получение статуса соединения с базой данных
     * @return PDO
     */
    public function getStatus() {
        return $this->conn->getAttribute(PDO::ATTR_CONNECTION_STATUS);
    }

    /**
     * Получение экзепляра соединения
     * @return PDO
     */
    public function getConn() {
        return $this->conn;
    }
}
