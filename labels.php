<div class="row">
    <div class="col-12">

        <form action="save.php" method="post">
            <ol>
                <?php if ($labels) : ?>
                    <?php foreach ($labels as $key => $label) : ?>
                        <li>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="<?php echo "label" . $key;  ?>" id="" value="<?php echo $label->info()["description"]; ?>">
                                </div>
                            </div>
                        </li>
                    <?php endforeach ?>
                    <input type="text" name="photo" value="<?php echo "./feed/" . $imagetoken . ".jpg";  ?>">
                    <button type="submit"> Save search results</button>
                <?php endif ?>
            </ol>
        </form>
    </div>
</div>