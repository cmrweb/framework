<link rel="stylesheet" href="<?= ROOT_DIR . PAGES_DIR ?>style/admin.css">
<?php if ($dev) : ?>
    <form method="post">
        <button class='btn danger' name='init'>Réinitialiser</button>
    </form>
<?php endif ?>
<section class="admin">
    <div>
        <h2>cmrDbAdmin</h2>
        <ul>
            <?php foreach ($tables as $table) : ?>
                <li><a href="<?= ROOT_DIR . "/admin/" . $table ?>"><?= $table ?></a> </li>
            <?php endforeach ?>
        </ul>
    </div>
    <div>
    <?php if (isset($slug)) : ?>
            <form method="post" enctype="multipart/form-data" class="form medium m2 p4 light">
                <?php foreach ($update as $key => $value) : ?>
                    <?php if ($key == "id"|| $key == "password") : ?>
                        <input type="hidden" id="<?= $key ?>" name="<?= $key ?>" value="<?= $value ?>">
                    <?php else : ?>
                        <label for="<?= $key ?>"><?= $key ?></label>
                        <input class="input" type="text" id="<?= $key ?>" name="<?= $key ?>" value="<?= $value ?>">
                    <?php endif ?>
                <?php endforeach ?>
                <button name="update" class="btn success large center m2">update</button>
            </form>
        <?php endif ?>
        <?php if (isset($id)) : ?>
            <table>
                <?php foreach ($fields as $key => $field) : ?>
                    <tr>
                        <?php foreach ($field as $k => $f) : ?>
                            <th><?= $k ?></th>
                        <?php endforeach ?>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <?php foreach ($field as $k => $f) : ?>
                            <td><?= $f ?></td>
                        <?php endforeach ?>
                        <td><a class="success p2 center" href="<?= ROOT_DIR . "/admin/" . $id . "/" . $field['id'] ?>">Editer</a></td>
                    </tr>
                <?php endforeach ?>
            </table>
        <?php endif ?>
</div>
</section>