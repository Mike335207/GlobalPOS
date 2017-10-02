<?php
namespace app\models;

use yii\base\Model;
use app\models\User;
use app\models\AuthAssignment;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
	
	public $name;
	public $surname;
	
	public $permissions;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			
			['name', 'required'],
			['name', 'string', 'max' => 255],
			
			['surname', 'required'],
			['surname', 'string', 'max' => 255],
			
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
		
	$user->name = $this->name;
	$user->surname = $this->surname;
		
        $user->setPassword($this->password);
        $user->generateAuthKey();
	
	$user->last_login_date = date('Y-m-d');
        
        if ($user->save())
		{
			//add permissions
			
			$permissionList = $_POST['SignupForm']['permissions'];
			
			foreach ($permissionList as $value)
			{	
				$newPermissions = new AuthAssignment;
				$newPermissions->user_id = $user->id;
				$newPermissions->item_name = $value;
				$newPermissions->save();
			}
			
			return $user;
			
		} else return null;
	}
		
}
