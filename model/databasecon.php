<?php
                class database{

                    var $host = "localhost";
                    var $username = "root";
                    var $dbname = "uschool";
                    var $password = "";
                    var $db;

                    function __construct()
                    {   
                        $this->db = mysqli_connect($this->host, $this->username, $this->password);
                        mysqli_query($this->db, "Create database ".$this->dbname);
						mysqli_select_db($this->db ,$this->dbname);
						
					}

                    function showdata()
                    {
                        $data = mysqli_query($this->db, "SELECT * FROM user LEFT JOIN role ON (user.role_id = role.role_id);");
                        while($d = mysqli_fetch_array($data)){
                            $hasil[] = $d;
                        }
						return $hasil;
                    }
					
					function showgrade()
                    {
                        $data = $this->db->query("SELECT * FROM user LEFT JOIN grade ON(user.user_id = grade.user_id);");
                        while($d = mysqli_fetch_array($data)){
                            $hasil[] = $d;
                        }
                        return $hasil;
                    }

                    function login($id, $password)
                    {
						$password = md5($password);
                        $query = "SELECT * FROM user WHERE user_id='$id' AND password='$password'";
						$result = mysqli_query($this->db, $query);
                        return $result;
                    }

					public function query($thequery)
					{
						return $this->db->query($thequery);
					}
		
                    function deletedata($id)
                    {
                        mysqli_query($this->db, "DELETE FROM user WHERE user_id= '$id'");
						mysqli_query($this->db, "DELETE FROM grade WHERE user_id = '$id';");
                    }
					
					function getnewid()
					{
						$newid = mysqli_query($this->db, "SELECT user_id FROM user ORDER BY 1 DESC LIMIT 1;");
						$newid = mysqli_fetch_array($newid);
						$newid = intval($newid['user_id']);
						$newid++;
						$newid = strval($newid);
						return $newid;
					}
					
					function getstudentgrade($id)
					{
						$res = mysqli_query($this->db,"SELECT * FROM user LEFT OUTER JOIN grade on (user.user_id = grade.user_id) WHERE user.user_id='$id';");
						$res = mysqli_fetch_array($res);
						return $res;
					}
					
					function getstudentdetail($id)
					{
						$res = mysqli_query($this->db,"SELECT * FROM user LEFT OUTER JOIN grade on (user.user_id = grade.user_id) WHERE user.user_id='$id';");
						$res = mysqli_fetch_array($res);
						return $res;
					}
					
            }
?>