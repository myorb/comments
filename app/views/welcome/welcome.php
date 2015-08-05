
<div class="page-header">
	<h1><?php echo $data['title'] ?></h1>
</div>
<div class='row'>
	<table class="table table-condensed">
      <thead>
        <tr>
          <th>#</th>
          <th>Username</th>
          <th>email</th>
          <th>message</th>
          <th>image</th>
          <th>created_at</th>
          <th>updated_at</th>
          <th>status</th>
        </tr>
      </thead>
      <tbody id='results_table'>
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
      </tbody>
    </table>
</div>
<hr>
<div class='row'>
	<form class="form-horizontal" id='create' action="<?php echo DIR;?>/index.php/create" method="POST" enctype="multipart/form-data">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputName1">Name</label>
	    <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
	  </div>
	  <div class="form-group">
	    <label for="message">Message</label>
	  	<textarea id="message" name="message" class="form-control" rows="3"></textarea>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputFile">File input</label>
	    <input type="file" name="fileToUpload" id="exampleInputFile">
	  </div>
	  <div class="checkbox">
	    <label>
	      <input type="checkbox" name="status"> Published
	    </label>
	  </div>
	  <br>
	  <button type="submit" class="btn btn-md btn-success">Create</button>
	</form>
</div>

<script type="text/javascript">
$(function() {
		$('#create').ajaxForm(function(response) { 
	       	if(response = 'ok'){
	       		$( "#results_table" ).load( "index.php/subpage" );

	       	}
	       	alert(response);

	    }); 
	});
</script>
