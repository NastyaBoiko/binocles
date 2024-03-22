<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nickname</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $key => $user) :?>
    <tr>
      <th scope="row"><?= ++$key;?></th>
      <td><?= $user->getNickname(); ?></td>
      <td><?= $user->getEmail(); ?></td>
      <td><?= $user->getRole(); ?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>