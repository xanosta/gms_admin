<!-- head and navBar -->
<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- table head -->
<?php require APPROOT . '/views/inc/table.head.php'; ?>


    <tbody>        
        <?php foreach ($data['blogs'] as $blog) : ?>

        <?php 
            $date = explode(' ', $blog->createdAt); 
        ?>

        <tr>
        <td><h5> <?php echo $blog->title ?><br><small class='text-muted'>Created on <?= $date[0] ?></small></h5> </td>
        <td> <img src="<?php echo $blog->image?>" alt="" title='<?php echo $blog->image?>' class="rounded" width="100" height="100"> </td>
            <td>
                <a class="btn btn-sm btn-primary" href="<?= URLROOT ?>/picks/move/<?=$pick->id ?>">Move top</a>
                <a class="btn btn-sm btn-primary" href="<?= URLROOT; ?>/blogs/edit/<?= $blog->id ?>">Edit</a> 
                <form class="float-sm-right" action="<?= URLROOT; ?>/blogs/delete/<?= $blog->id ?>" method="post">
                    <input type="submit" value='Delete' class="btn btn-sm btn-danger">
                
                </form>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
   
<!-- table footer -->
<?php require APPROOT . '/views/inc/table.footer.php'; ?>

<!-- footer -->
<?php require APPROOT . '/views/inc/footer.php'; ?>