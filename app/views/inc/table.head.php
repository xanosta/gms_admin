<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class='jumbotron'>
            <form action="blogs" method="post">
                <select name="countryLang" id="countryLang">
                    <option value="es-ES">español-ES</option>
                    <option value="es-US">español-US</option>
                    <option value="en-US">english-US</option>
                    <option value="gl-ES">galego-ES</option>
                </select>
                <input type="submit" name="enviar" value="enviar">
            </form>

            <?php if($_SERVER['REQUEST_URI'] == SUBDOMAIN . '/blogs') : ?>

                <a href='blogs/add' class='float-right mb-4 mr-3 btn btn-success'>Create blog</a>

            <?php elseif($_SERVER['REQUEST_URI'] == SUBDOMAIN . '/picks') : ?>

                <a href='picks/add' class='float-right mb-4 mr-3 btn btn-success'>Create pick</a>

            <?php endif ?>

                <h4 class='mb-4'></h4>

                <table class="table">
                <thead>
                    <tr>
                        <?php if($_SERVER['REQUEST_URI'] == SUBDOMAIN . '/blogs') : ?>
                        <th scope="col">Blog title</th>
                        <?php elseif($_SERVER['REQUEST_URI'] == SUBDOMAIN . '/picks') : ?>
                        <th scope="col">Pick title</th>
                        <?php endif ?>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>