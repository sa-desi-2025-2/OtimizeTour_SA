<?php
class Conexao extends PDO {
    private $host = 'localhost';
    private $dbname = 'otimizetour';
    private $user = 'root';
    private $password = '';

    public function __construct() {
        try {
            parent::__construct(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->user,
                $this->password
            );

            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }
}
?>
