<?php if($this->session->flashdata('registered')) 
	echo '<p class="alert alert-success">'.$this->session->flashdata('registered').'</p>';
 ?>

 <?php if($this->session->flashdata('login_failed')) 
	echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>';
 ?>

 <?php if($this->session->flashdata('logged_out')) 
	echo '<p class="alert alert-success">'.$this->session->flashdata('logged_out').'</p>';
 ?>



<h1>Welcome to myTodo!</h1>
<p>myTodo us a simple and helpful application to help you manage your day to day tasks. You can add as many task lists as you want and as many tasks as you want. myTodo is absolutely free! Have fun.</p>
          <?php 
            if($this->session->userdata('logged_in')) :             
          ?>
<br />
<h3>My Latest Lists</h3>
<table class="table table-striped" width="50%" cellspacing="5" cellpadding="5">
    <tr>
        <th>List Name</th>
        <th>Created On</th>
        <th>View</th>
    </tr>
    <?php if(isset($lists) and $listsNum != 0): ?>
<?php foreach($lists as $list): ?>
	<tr>
		<td><b><?php echo $list->list_name; ?></b></td>
		<td><?php echo date($list->create_date); ?></td>
		<td><a href="<?php echo base_url(); ?>lists/show/<?php echo $list->id; ?>">View List</a></td>
	</tr>
<?php endforeach; ?>
	<?php else: ?>
	<tr>
		<td colspan="3" style="text-align: center"><b>There Is No Lists . Add New List Below .</b></td>
	</tr>
	<?php endif; ?>	
</table>
<hr />

	<b><a href="<?php echo base_url();?>lists/add">Add A New List</a></b> 


<h3>Latest Tasks</h3>
<table class="table table-striped" width="50%" cellspacing="5" cellpadding="5">
    <tr>
        <th>Task Name</th>
        <th>List Name</th>
        <th>Created On</th>
        <th>View</th>
    </tr>




    <?php if(isset($tasks) and $tasksNum != 0 ): ?>
<?php foreach($tasks as $task): ?>
    <tr>
        <td><b><?php echo $task->task_name; ?></b></td>
        <td><b><?php echo $task->list_name; ?></b></td>
        <td><?php echo date($task->create_date); ?></td>
        <td><a href="<?php echo base_url(); ?>lists/show/<?php echo $list->id; ?>">View List</a></td>
    </tr>
<?php endforeach; ?>
    <?php else: ?>
    <tr>
        <td colspan="3" style="text-align: center"><b>There Is No Tasks . </b></td>
    </tr>
    <?php endif; ?>  
</table>           	
<hr />
<b><a href="<?php echo base_url();?>task/add">Add A New Task</a></b> 
<!--//end if of is logged in-->
      		<?php endif; ?>