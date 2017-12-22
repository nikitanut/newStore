<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление товарами</li>
                </ol>
            </div>

            <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>
            
            <h4>Список товаров</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID товара</th>                    
                    <th>Название товара</th>
                    <th>Название категории</th>
                    <th>Наличие</th>
                    <th>Новинка</th>
                    <th>Рекомендуемый</th>                    
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($productsList as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>                     
                        <td><?php echo $product['name']; ?></td>
                        <td><?php foreach ($categoryList as $categories): 
                                //$categories = Category::getCategoriesList();
                                  if ($product['category_id']==$categories['id']){ 
                                  echo $categories['name'];}
                                  //else {
                                  //    echo $product['category_id'];
                                  //}
                              endforeach;?></td>
                        <td><?php echo $product['availability']; ?></td>
                        <td><?php echo $product['is_new']; ?></td>
                        <td><?php echo $product['is_recommended']; ?></td>
                        <td><?php echo $product['status']; ?></td> 
                        <td><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>


