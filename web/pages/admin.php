<link rel="stylesheet" href="<?= ROOT_DIR . PAGES_DIR ?>style/admin.css">
<section class="admin">
    <div>
        <h2>cmrDbAdmin</h2>
        <ul>
            <?php foreach ($tables as $table) : ?>
                <li><a href="<?= ROOT_DIR . "/admin/" . $table ?>"><?= $table ?></a> </li>
            <?php endforeach ?>
        </ul>
        <?php if (isset($id) && !isset($slug)) : ?>
            <form method="post" enctype="multipart/form-data" class="form xlarge m2 p4 light">
                <?php if($fields):
                     foreach ($fields[0] as $key => $value) : ?>
                    <?php if ($key == "id") : ?>
                        <input type="hidden" id="<?= $key ?>" name="<?= $key ?>">
                    <?php else : ?>
                        <label for="<?= $key ?>"><?= $key ?></label>
                        <input class="input" type="text" id="<?= $key ?>" name="<?= $key ?>">
                    <?php endif ?>
                    <?php endforeach; ?>
                <button name="addField" class="btn success large center m2">Ajouter</button>
            <?php endif ?>

        <?php if($emptyfield):
                     foreach ($emptyfield as $key) : ?>
                    <?php if ($key == "id") : ?>
                        <input type="hidden" id="<?= $key ?>" name="<?= $key ?>">
                    <?php else : ?>
                        <label for="<?= $key ?>"><?= $key ?></label>
                        <input class="input" type="text" id="<?= $key ?>" name="<?= $key ?>">
                    <?php endif ?>
                    <?php endforeach; ?>
                <button name="addField" class="btn success large center m2">Ajouter</button>
            <?php endif ?>
            </form>
        <?php endif ?>
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
                <button name="update" class="btn success large center m2">Mettre à jour</button>
                <button name="delete" class="btn danger large center m2">Supprimer</button>
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

<?php if ($dev) : ?>
    <form method="post">
        <button class='btn danger' name='init'>Réinitialiser le projet</button>
    </form>
<?php endif ?>