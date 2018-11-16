<?php require APPROOT . '/views/inc/header.php'; ?>
      <div class="card card-body bg-light mt-5">
      <div class="row">
        <div class="col-lg-12">
            <div class='jumbotron'>
                <h4 class='mb-4'>Edit pick</h4>               
                <form action="<?= URLROOT; ?>/picks/edit/<?= $data['id']; ?>" method="post">
                    <div class="form-group">
                        <label for="title">Pick title</label>
                        <input type="text" class="form-control" name='giftDescription' aria-describedby="pickTitle" value="<?= $data['giftDescription']; ?>">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Add image</label>
                    </div>
                    <div class="form-group">
                        <label for="image">Choose an image</label>
                        <input type="file" id='img' class="form-control-file" name='image' accept="image/png, image/jpeg, image/jpg">
                    </div>
                    <div class="form-group">
                        <label for="url">Link</label>
                        <input type="text" class="form-control" id='lnk' name='url' aria-describedby="postTitle" value="<?= $data['url']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name='post_order' aria-describedby="postTitle" value=1>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Confirm">
                </form>
                <br><a href='<?= URLROOT ?>/picks'><button class="btn btn-danger">Cancel</button></a>
            </div>
        </div>
    </div>
  </div> 
<?php require APPROOT . '/views/inc/footer.php'; ?>
