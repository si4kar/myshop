<?php

class CategoriesController extends Database
{
        public function actionList()
    {

        $query = mysqli_query(parent:: getDbConnection(), 'SELECT * FROM categories');
        $categories = mysqli_fetch_all($query, MYSQLI_ASSOC);


        return parent:: renderTemplate('categories/list', ['categories' => $categories]);
    }

    public function actionCreate()
    {
        echo "Hello Categories";
        return true;
    }
}