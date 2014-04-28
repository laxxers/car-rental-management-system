<div>
	Found <?php echo $num_results; ?> users
</div>
	
<table>
	<thead>
		<?php foreach($fields as $field_name => $field_display){ ?>
		<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
			<?php echo anchor("admin/user_info/$field_name/" .
				(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc') ,
				$field_display); ?>
		</th>
		<?php } ?>
	</thead>
	
	<tbody>
		<?php foreach($users as $user){ ?>
		<tr>
			<?php foreach($fields as $field_name => $field_display){ ?>
			<td>
				<?php echo $user->$field_name; ?>
			</td>
			<?php } ?>
		</tr>
		<?php } ?>			
	</tbody>
	
</table>
	
<?php if (strlen($pagination)): ?>
<div>
	Pages: <?php echo $pagination; ?>
</div>
<?php endif; ?>