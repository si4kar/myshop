<?php
/**
 * @var array $categories
 */

?>


<h1>Categories</h1>

<p><a href="/categories/create" class="'btn btn-success" >Create category</a></p>

<table class="table table-striped">
    <tr>
        <td>ID</td>
        <td>Title</td>
        <td>Parent</td>
        <td></td>
    </tr>
    <?php $obj = new CategoriesController;?>
    <?php foreach (categories as $category) : ?>   // как получить доступ к переменной
        <tr>
            <td><?= $category['id'] ?> </td>
            <td><?= $category['title'] ?></td>
            <td></td>
            <td>
                <a href="/views/categories/edit?file=<?= $file ?>" class="btn btn-sm btn-primary">Edit</a>
                <a href="/views/categories/delete?file=<?= $file ?>" class="btn btn-sm btn-danger">Delete</a>
            </td>

        </tr>
    <?php endforeach; ?>

</table>