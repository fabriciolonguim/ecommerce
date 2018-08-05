<?php

	namespace Hcode\Model;

	use \Hcode\DB\Sql;
	use \Hcode\Model;

	class Userr extends Model{

		const SESSION = "Userr";

		public static function login($login, $password)
		 {

			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
					":LOGIN"=>$login
			));

			if(count($results) === 0)
			{
				throw new \Exception("Usuário ou senha inválida.");
				
			}

			$data = $results[0];

			if (password_verify($password, $data["despassword"]) === true)
			{
				$user = new Userr();

				$user->setData($data);

				$_SESSION[Userr::SESSION] = $user->getValues();

				return $user;


			} else {
				throw new \Exception("Usuário ou senha inválida.");
			}
		}

		public static function verifyLogin($inadmin = true)
		{
			if(
				!isset(S_SESSION[Userr::SESSION])
				||
				!$_SESSION[Userr::SESSION]
				||
				!(int)$_SESSION[Userr::SESSION]["iduser"] > 0
				||
				(bool)$_SESSION[Userr::SESSION]["inadmin"] !== $inadmin
			) {
				header("Location: /admin/login");
				exit;
			}
		}

		public static function logout()
		{
			$_SESSION[User::SESSION] = NULL;
		} 

	}






?>