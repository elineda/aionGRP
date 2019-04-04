<h3>Online player</h3>
<?php $tab=$this->var[0];



?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Location</th>
        <th scope="col">Race</th>
        <th scope="col">Class</th>
    </tr>
    </thead>
    <tbody>
<?php foreach ($tab as $player):?>

    <tr>
        <td scope="row"><?= $player['name']?></td>
        <td><?= $player['world_id']?> </td>
        <td><?= $player['race']?> </td>
        <td><?= $player['player_class']?> </td>
    </tr>


    <?php endforeach;?>
    </tbody>
</table>