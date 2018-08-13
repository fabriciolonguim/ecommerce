<?php

	namespace Hcode\Model;

	use \Hcode\DB\Sql;
	use \Hcode\Model;
  use \Hcode\Mailer;
	

	/*class User extends Model {

		const SESSION = "User";

		public static function login($login, $password)
	{
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
			":LOGIN"=>$login
			
		)); 
		if (count($results) === 0)
		{
			throw new \Exception("Usuário inexistente ou senha inválida.");
		} else {
		$data = $results[0];
		if (password_verify($password, $data["despassword"]) === true) 
		{
			$user = new User();
			//$data['desperson'] = utf8_encode($data['desperson']);

			//$user->setiduser($data["iduser"]);

			$user->setData($data);
			$_SESSION[User::SESSION] = $user->getValues();
			return $user;
		}
		 else {
			throw new \Exception("Usuário inexistente ou senha inválida.");
		}
	}

	public static function verifyLogin($inadmin = true)
	{
		
		if(
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0 
			||
			(bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin
		){
			header("Location: /admin/login");
			exit;
		}
	}

	public function logout()
	{
		$_SESSION[User::SESSION] = NULL;
	}
 }
}
	public static function listAll() {
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.desperson");
	}

	public function save() 
	{

		$sql = new Sql();
	}
  }*/

 class Category extends Model {

 	    	public static function listAll()
      	{

      		$sql = new Sql();

      		return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");
      	} 

        public function save()
        {

          $sql = new Sql();


          $results = $sql->select("CALL   sp_categories_save(:idcategory, :descategory)", array(
              ":idcategory"=>$this->getidcategory(),
              ":descategory"=>$this->getdescategory()
             
          ));



          $this->setData($results);
        }

        public function get($idcategory)
        {

          $sql = new Sql();

          $results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", [
              ':idcategory'=>$idcategory
          ]);

          $this->setData($results[0]);

        }

        public function delete()
        {

          $sql = new Sql();

          $sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", [
              ':idcategory'=>$this->getidcategory()
          ]);
        }

  }

?>