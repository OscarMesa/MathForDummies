<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    const ERROR_TYPEUSER_INVALID = 13;
    private $_id;
  // private $_isAdmin;

    public function authenticate()
    {
        $username=strtolower($this->username);
        Yii::import("application.models.appjoomla.*", true);
        $criteria = new CDbCriteria();
        $criteria->alias = 'users';
        $criteria->with = array(
            'grupos' => array(
                'alias' => 'gr',
                'condition' => 'gr.id IN (8,7)' // Solo traee los que son administradores y supre administradores
            ));
        $criteria->addCondition('users.username = ?');
        $criteria->params = array($username);
        $user = V7guiUsers::model()->find($criteria);
        if($user===null){
           return $this->errorCode=self::ERROR_USERNAME_INVALID;
        }else{
            $password=$user->password;
            $mypassword=$this->password;
            $part = explode(":",$password);
            $salt = $part[1];
            $encrypted_password = md5($mypassword . $salt).":".$salt;
            if($user->password!=$encrypted_password){
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            }else if(count($user->grupos)<=0){
                $this->errorCode=self::ERROR_TYPEUSER_INVALID;
            }
            else{
                $this->_id=$user->id;
               // $this->setState('role', $user->rol);
               //  $this->setState('admin', 1);

                            $auth=Yii::app()->authManager;
                            /*
                            $bizRule='return !Yii::app()->user->isGuest;';
                            $auth->createRole('authenticated', 'authenticated user', $bizRule);

                            $bizRule='return Yii::app()->user->isGuest;';
                            $auth->createRole('guest', 'guest user', $bizRule);

                            $bizRule='return Yii::app()->user->isAdmin;';
                            $auth->createRole('admin', 'admin user', $bizRule);
                            */
                            //$auth->assign('admin',$this->id);

               // $this->email=$user->email;
                $this->errorCode=self::ERROR_NONE;
            }
        }
    }
    /*
    public function getIsAdmin(){
	    return $this->_isAdmin;
    	
    }
    */
 
    public function getId()
    {
        return $this->_id;
    }

}