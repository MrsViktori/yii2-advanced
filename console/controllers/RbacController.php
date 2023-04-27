<?php

namespace console\controllers;

use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit(){
        $auth = \Yii::$app->authManager;

        //user
        $createPost = $auth->createPermission('createPost');
        $createPost->description ='Create a Post';
        $auth->add($createPost);

        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description='Update a Post';
        $auth->add($updatePost);

        $deletePost = $auth->createPermission('deletePost');
        $deletePost->description='Delete a Post';
        $auth->add($deletePost);

        $indexPost = $auth->createPermission('indexPost');
        $indexPost->description='Index a Post';
        $auth->add($indexPost);

        $viewPost = $auth->createPermission('viewPost');
        $viewPost->description='View a Post';
        $auth->add($viewPost);

        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $createPost);
        $auth->addChild($user, $updatePost);
        $auth->addChild($user, $deletePost);
        $auth->addChild($user, $indexPost);
        $auth->addChild($user, $viewPost);

        //admin
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $user);

        $createCategory = $auth->createPermission('createCategory');
        $createCategory->description='Create a Category';
        $auth->add($createCategory);

        $updateCategory = $auth->createPermission('updateCategory');
        $updateCategory->description='Update a Category';
        $auth->add($updateCategory);

        $deleteCategory = $auth->createPermission('deleteCategory');
        $deleteCategory->description='Delete a Category';
        $auth->add($deleteCategory);

        $indexCategory = $auth->createPermission('indexCategory');
        $indexCategory->description='Index a Category';
        $auth->add($indexCategory);

        $viewCategory = $auth->createPermission('viewCategory');
        $viewCategory->description='View a Category';
        $auth->add($viewCategory);

        $updateUser = $auth->createPermission('updateUser');
        $updateUser->description='Update a User';
        $auth->add($updateUser);

        $deleteUser = $auth->createPermission('deleteUser');
        $deleteUser->description='Delete a User';
        $auth->add($deleteUser);

        $indexUser = $auth->createPermission('indexUser');
        $indexUser->description='Index a User';
        $auth->add($indexUser);

        $viewUser = $auth->createPermission('viewUser');
        $viewUser->description='View a User';
        $auth->add($viewUser);
    }
}