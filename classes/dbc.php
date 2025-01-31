<?php

require_once ('env.php'); 

class Dbc
{
  protected $table_name;

  // データベースに接続
  protected function dbConnect() {
    $host   = DB_HOST;
    $dbname = DB_NAME;
    $user   = DB_USER;
    $pass   = DB_PASS;
    $dsn    = "mysql:host=$host;dbname=$dbname;charset=utf8";

    try { 
      $dbh = new \PDO($dsn, $user, $pass,[
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
      ]);
    } catch(PDOException $e) {
      echo '接続失敗'. $e->getMessage();
      echo exit();
    }

    return($dbh);
  }

  // データを取得
  public function getAll() {
      $dbh = $this->dbConnect();
      $sql = "SELECT * FROM $this->table_name";
      //sqlの実行
      $stmt = $dbh->query($sql);
      //sqlの結果を受け取る
      $result = $stmt->fetchall(\PDO::FETCH_ASSOC);

      return $result;
      $dbh = null;
  }

  // ブログを読み込む
  public function getById($id) {
    if(empty($id)) {
      exit('IDが不正です。');
    }
    
    $dbh = $this->dbConnect();
    
    // sqlの準備
    $stmt = $dbh->prepare("SELECT * FROM $this->table_name Where id = :id");
    $stmt->bindValue(':id', (int)$id, \PDO::PARAM_INT);
    //　sqlを実行
    $stmt->execute();
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
    if(!$result) {
      exit('ブログがありません');
    }

    return $result;
  }

  public function delete ($id) {
    if(empty($id)) {
      exit('IDが不正です。');
    }
    
    $dbh = $this->dbConnect();
    
    // sqlの準備
    $stmt = $dbh->prepare("DELETE FROM $this->table_name Where id = :id");
    $stmt->bindValue(':id', (int)$id, \PDO::PARAM_INT);
    //　sqlを実行
    $stmt->execute();
    echo 'ブログを削除しました';
    return $result;
  }
}

?>

