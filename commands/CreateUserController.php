<?php

namespace app\commands;

use app\models\DbUser;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * Console command to create a user in the database
 */
class CreateUserController extends Controller
{
    /**
     * Create a new user with the given username, email and password
     * @param string $username the username
     * @param string $email the email
     * @param string $password the password
     * @return int exit code
     */
    public function actionIndex($username, $email, $password)
    {
        $user = new DbUser();
        $user->username = $username;
        $user->email = $email;
        $user->setPassword($password);
        $user->generateAuthKey();
        
        if ($user->save()) {
            echo "User created successfully.\n";
            return ExitCode::OK;
        } else {
            echo "Failed to create user:\n";
            foreach ($user->getErrors() as $attribute => $errors) {
                echo " - $attribute: " . implode(', ', $errors) . "\n";
            }
            return ExitCode::DATAERR;
        }
    }
} 