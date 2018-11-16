<!-- head and navBar -->
<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- table head-->
<?php require APPROOT . '/views/inc/table.head.php'; ?>

    <tbody>
    
        <?php foreach ($data['picks'] as $pick) : ?>

        <tr>
            <td><?= $pick->giftDescription ?></td>
            <td>
                <img src="<?= $pick->image ?>" alt="" title="<?= $pick->image ?>">
            </td>
            <td>
                <a class="btn btn-sm btn-primary" href="<?= URLROOT ?>/picks/move/<?=$pick->id ?>">Move top</a>
                <a class="btn btn-sm btn-primary" href="<?= URLROOT ?>/picks/edit/<?=$pick->id ?>">Edit</a>
                <form class="float-sm-right" action="<?= URLROOT ?>/picks/delete/<?=$pick->id ?>" method="post">
                    <input type="submit" value="delete" class="btn btn-sm btn-danger">
                </form>
            </td>
        
        </tr>
        <?php endforeach ?>
    </tbody>

    <!-- talbe footer -->
    <?php require APPROOT . '/views/inc/table.footer.php' ?>

    <!-- footer -->
    <?php require APPROOT . '/views/inc/footer.php' ?>

