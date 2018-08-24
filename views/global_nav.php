<?php foreach($GLOBALS['left_menu'] as $k=>$v){?>
<dl class="left-menu shop_<?php echo $k;?>">
	<dt>
		<i class="icon-menu <?php echo $v['icon'];?>"></i>
		<span id="shop_<?php echo $k;?>" data-id="<?php echo $k;?>"><?php echo $v['name'];?></span>
	</dt>
	<?php foreach($v['children'] as $key=>$val){?>
	<dd class="subshop_<?php echo $key;?>"><a href="<?php echo $val['url'];?>"><?php echo $val['title'];?></a></dd>
	<?php }?>
</dl>
<?php }?>