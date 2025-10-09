<?php
    require_once __DIR__ . '/../Model/User.php';
    require_once __DIR__ . '/../Config/conexao.php';
    
    Class UserService {
        public function getConexao(){
            return $this->conexao;
        }

        public function setConexao($conexao){
            $this->conexao = $conexao;
        }

        public function __construct() {
            $this->conexao = new Conexao();
        }

        public function createUser(){
            $this->senha = hash('sha512', $this->senha);
            $consulta = $this->conexao->prepare("INSERT INTO usuarios(nome, email, senhaHash) VALUES(?, ?, ?)");
            $consulta->execute([$this->nome, $this->email, $this->senha]);
        }

        public function readUser(){
            $consulta = $this->conexao->prepare("SELECT id, nome, email FROM usuarios");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }

        public function updateUser(User $user) {
            $senhaHash = hash('sha512', $user->getPassword());
            $consulta = $this->conexao->prepare(
                "UPDATE usuarios SET email = ?, senhaHash = ? WHERE id = ?"
            );
            $consulta->execute([$user->getEmail(), $senhaHash, $user->getId()]);
        }

        public function deleteUser(User $user){
            try{
                $consulta = $this->conexao->prepare("DELETE FROM usuarios WHERE id = ?");
                $consulta->execute([$user->getId()]);
                echo "Usuário deletado com sucesso!";
            } catch (PDOException $e) {
                echo "Erro ao deletar usuário: " . $e->getMessage();
            }
        }
    }
?>