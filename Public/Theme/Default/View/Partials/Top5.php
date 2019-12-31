
<table class="table table-sm table-dark bg-opacity table-striped table-borderless">

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"><?= Language::translate('name') ?></th>
            <th scope="col"><?= Language::translate('level') ?></th>
            <th scope="col"><?= Language::translate('empire') ?></th>
        </tr>
    </thead>

    <tbody>
        <?php
        $top5List = array(
            array('name' => 'test1', 'level' => 56, 'empire' => 'jinno'),
            array('name' => 'testing', 'level' => 39, 'empire' => 'chunjo'),
            array('name' => 'hello', 'level' => 19, 'empire' => 'jinno'),
            array('name' => 'lorem', 'level' => 16, 'empire' => 'shinsoo'),
            array('name' => 'bro', 'level' => 14, 'empire' => 'shinsoo')
        );
        $i = 1;
        foreach($top5List as $player){
        ?>
        <tr>
            <td scope="row"><?= $i; ?></td>
            <td><?= $player['name']; ?></td>
            <td><?= $player['level']; ?></td>
            <td><?= $player['empire']; ?></td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </tbody>

</table>

