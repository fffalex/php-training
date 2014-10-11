<?php
session_start();
require_once 'lib.php';

//$userAttemps = [];


if (!isset($_SESSION['attempt']))
{
    $_SESSION['attempt'] = 0;
}

//for IDIOTs or HACKERs that tried 3 or more logs 
if ($_SESSION['attempt'] > 3)
                {
                    Header('Location: index.php?error= You dont have more attemps to log');
                }
else{
                    
                
                //If Post Form Exist And It's Complete
                if (isset($_POST['name']) && isset($_POST['password']) && !empty($_POST['name']) && !empty($_POST['password'])) 
                {
                    //Try Catch for any connection issue.   
                    try {
                            $user = getUser($_POST['name']);

                            if ($user['blocked'] == true)
                            {
                               Header('Location: index.php?error= Hey Man you account is blocked');
                            }
                            else
                            {

                            //USER IS NULL. DOESNT EXIST ON DB. +1 global attemp
                            if (is_null($user))
                                {
                                    Header('Location: index.php?error= User doesnt exist!');
                                    $_SESSION['attempt'] += 1;
                                }
                                ///USER EXIST AND PASSWORD MATCH - SUCCESS 
                                elseif ($user['password'] == md5($_POST['password']))
                                {
                                    $_SESSION['name'] = $_POST['name'];
                                    $_SESSION['pass'] = $_POST['password'];
                                    
                                    Header('Location: todo.php');
                                }
                                //PASSWORD DOESNT MATCH....
                                else {

                                   //Count = 0 INitialize attemps for a usser
                                   if (!isset($_SESSION[$userAttemps[$user['name']]])){
                                      $_SESSION[$userAttemps[$user['name']]] = 0;
                                   }

                                   //If user tried 3 wrongs logins. Go to your home
                                   if ($_SESSION[$userAttemps[$user['name']]] > 2)
                                   {
                                     blockUser($user['user_id']);
                                     $_SESSION['attempt'] += 1;
                                     Header('Location: index.php?error=You have tried to login too many times. Fuck U Bitch!. U ar Blocked ');
                                     
                                     

                                   }
                                   //Password Doesnt MAtch and Count +1
                                   else
                                   {
                                     $_SESSION[$userAttemps[$user['name']]] += 1;
                                     Header('Location: index.php?error=Password doesnt Match');
                                     $_SESSION['attempt'] += 1;
                                   }



                                    }
                            
                            }
                        } catch (Exception $exc) {
                            logger('Error trying to get user: '. $exc->getMessage());

                            header('Location: error.php');
                        }
                    //Password or ID entries are empty
                    } else {
                        Header('Location: index.php?error= Entries cannot be empty');
                        }
                    }
                
?>

