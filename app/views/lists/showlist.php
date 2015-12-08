<ul id="actions">
    <h4>List Actions</h4>
    <li> <a href="<?php echo base_url(); ?>task/add/<?php echo $list->id; ?>">Add Task</a></li> 
    <li> <a href="<?php echo base_url(); ?>lists/edit/<?php echo $list->id; ?>">Edit List</a></li> 
    <li> <a onclick="return confirm('Are you sure?')" href="<?php echo base_url(); ?>lists/delete/<?php echo $list->id; ?>">Delete List</a></li>
</ul>

<h1><?php echo $list->list_name; ?></h1>

<?php if($this->session->flashdata('task_deleted')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('task_deleted') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('task_created')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('task_created') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('task_updated')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('task_updated') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('marked_complete')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('marked_complete') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('marked_new')) : ?>
    <?php echo '<p class="text-success">' .$this->session->flashdata('marked_new') . '</p>'; ?>
<?php endif; ?>

Created on:  <strong><?php echo date($list->create_date); ?></strong>
<br /><br />
<div style="max-width:500px;"><?php echo $list->list_body; ?></div>
<br /><br />
<h4> Current Open Tasks</h4>

<?php if(isset($uncompletedTasks) and $uncompletedTasksNum != 0): ?>
	<ul>
		<?php foreach($uncompletedTasks as $untask): ?>
		<li><a href="<?php echo base_url(); ?>task/show/<?php echo $untask->id; ?>"><?php echo $untask->task_name; ?></a></li>
	<?php endforeach; ?>
	</ul>
<?php else: ?>
	<p style="text-align: center; font-weight: bold;">There is no tasks . Add A Task Above .</p>
<?php endif; ?>	

<h4> Recently Completed Tasks</h4>
<?php if(isset($completedTasks) and $completedTasksNum != 0): ?>
	<ul>
	<?php foreach($completedTasks as $ctask):?>	
		<li><a href="<?php echo base_url(); ?>task/show/<?php echo $ctask->id; ?>"><?php echo $ctask->task_name; ?></a></li>		
	<?php endforeach; ?>
	</ul>	
<?php else: ?>
	<p style="text-align: center; font-weight: bold;">There is no tasks . Add A Task Above .</p>
<?php endif; ?>