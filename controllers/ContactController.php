<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 03.12.2018
 * Time: 21:48
 */

class ContactController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

 /*       $cat = new stdClass();
        if (($request->method() == 'POST')) {
            $cat->name = $request->post('name');
            $cat->visible = $request->post('visible') ? $request->post('visible') : 0;
            $id = $request->get('id','integer');
            if($request->get('id','integer')) {
                //обновляем товар
                $category->updateCategory($request->get('id','integer'), $cat);
            } else {
                //Добавление товара
                $id = $category->addCategory($cat);
            }
            $categoryItem = $category->getCategoryById($id);

        } elseif($request->get('id','integer')) {
            $categoryItem = $category->getCategoryById($request->get('id','integer'));
        }


        $array_vars = array(
            'name' => 'Category',
            'category' => $categoryItem,
        );
        return $this->view->render('category.html', $array_vars);
    }
 */
    }

    public function showAction(){
        $myContact = new Contact();
        $myContact->saveUserData();
        $this->renderViews('mycontact.php');
    }
}