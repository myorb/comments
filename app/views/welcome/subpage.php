      	 <?php foreach ($data['welcome_message'] as $row) : ?>
	        <tr>
	          <th scope="row"><?=$row->id?></th>
	          <td><?=$row->name ?></td>
	          <td><?=$row->email ?></td>
	          <td><?=$row->message ?></td>
	          <td><img src="<?= 'uploads/'.$row->image ?>" alt="image" width="100px" class="img-rounded"></td>
	          <td><?=$row->created_at ?></td>
	          <td><?=$row->updated_at ?></td>
	          <td><?=$row->status ?></td>
	        </tr>
    	<?php endforeach ?>
