<div class="content-primary">
    <table>
        <!-- <thead>
            <tr>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead> -->
        <tbody>
            <?php echo count($dados);
              foreach ($dados as $produto) : ?>
                <tr>
                    <td><img src="<?php echo BASE_URL; ?>assets/img/<?php echo $produto["url_img"] ?>" width="150" height="100"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>