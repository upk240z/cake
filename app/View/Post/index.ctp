<p>
<button id="add" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> データ追加</button>
</p>

<?php if (count($posts)) { ?>

<div>
<?php echo $this->Paginator->counter(array('format' => __('{:page}/{:pages}ページを表示'))); ?>
</div>

<ul class="pagination" style="margin-top:10px">
<li><?php echo $this->Paginator->prev(__('≪'), array(), null, array('class' => 'prev disabled')); ?></li>
<?php echo $this->Paginator->numbers(array('tag' => 'li', 'currentTag' => 'a', 'separator' => '', 'currentClass' => 'active')) ?>
<li><?php echo $this->Paginator->next(__('≫'), array(), null, array('class' => 'next disabled')); ?></li>
</ul>


<table class="table table-striped">
<tr>
<th>Id</th>
<th>Email</th>
<th>タイトル</th>
<th>本文</th>
<th>作成時刻</th>
<th></th>
</tr>
<?php foreach ($posts as $post): ?>
<tr>
<td>
<?php echo $this->Html->link($post['Post']['id'], array('action' => 'edit', $post['Post']['id'])); ?>
</td>
<td><?php echo $post['Post']['email'] ?></td>
<td><?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?></td>
<td><?php echo nl2br(h($post['Post']['body'])); ?></td>
<td><?php echo date('Y-m-d H:i:s', $post['Post']['created']->sec); ?></td>
<td>
<?php echo $this->Form->postLink(
	'削除',
	array('action' => 'delete', $post['Post']['id']),
	array('confirm' => 'Are you sure?')
);
?>
</td>
</tr>
<?php endforeach; ?>
</table>
<?php } else { ?>
<div class="alert alert-danger">
データがありません
</div>
<?php } ?>

<script>
$(function(e)
{
	$('#add').on("click", function(e)
	{
		location.href = '<?php echo Router::url(array('action' => 'add')) ?>';
	});
});
</script>
