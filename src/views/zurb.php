<ul class="pagination" role="navigation" aria-label="Pagination">
	<?php foreach($pages as $page): ?>
		<?php if(isset($page['separator'])): ?>
			<li class="ellipsis" aria-hidden="true"></li>
		<?php elseif(isset($page['current'])): ?>
			<li class="current"><?= $page['name'] ?></li>
		<?php else: ?>
			<li><a href="?<?= $pagename ?>=<?= $page['page'] ?>" data-toggle="tooltip" title="<?= $page['title'] ?>"><?= $page['name'] ?></a></li>
		<?php endif; ?>
	<?php endforeach; ?>
</ul>
