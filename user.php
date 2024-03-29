<?php
include_once "./DB.php";

class User{
    // static public function all(){
    //     $sql= "select * from users";
    //     $users= DB::execute($sql);

    //     return $users;
    // }
    // test pagination
    static public function all($currentPage = 1, $perPage = 5) {
        
        $totalUsers = self::count();  // goi ra tat ca users
        $totalPages = ceil($totalUsers / $perPage);
        
        if (isset($_GET['page'])) {
            $currentPage = (int) $_GET['page'];  // lay so trang (int) tu url
            $currentPage = max(1, min($currentPage, $totalPages)); // xac thuc so trang
          }

        $offset = ($currentPage - 1) * $perPage;
        $sql = "select * from users LIMIT $perPage OFFSET $offset";
        $users = DB::execute($sql);
    
        return [
          'data' => $users,
          'total_pages' => $totalPages,
          'current_page' => $currentPage
        ];
      }
    
      static private function count() {
        $sql = "SELECT COUNT(*) as total from users";
        $result = DB::execute($sql);
        return $result[0]['total'];
      }
    
    // test pagination
    static public function create($dataCreate){
        $sql= "insert into users (name, email, passwords) value (:name, :email,:password)";
        $user = DB::execute($sql,$dataCreate);
    }
    static public function find($id){
        $sql= "SELECT * from users where id=:id";
        $dataFind=["id"=>$id];
        $user = DB::execute($sql,$dataFind);
        return count($user)>0 ? $user[0]:[];
    }
    static public function update($dataUpdate){
        $sql ="UPDATE users set email=:email,name=:name,passwords=:password where id=:id";
        DB::execute($sql,$dataUpdate);
    }
    static public function destroy($id){
        $sql= "DELETE from users where id=:id;
        SELECT MAX( id ) FROM users ;
        ALTER TABLE users AUTO_INCREMENT = 0;";
        $dataDelete=["id"=>$id];
        DB::execute($sql,$dataDelete);
    }
    static public function search($search){
        $sql="SELECT * from users where name like '%$search%'";
        $dataSearch=["%$search%"=>$search];
        $user = DB::execute($sql);
        return count($user)>0 ? $user:[];
    }
};

