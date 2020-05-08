
<form action="/index.php/topic/update/<?=($result->id)?>" method="post" class="span10">
    <input type="text" name="title" placeholder="제목" class="span12" value="<?=($result->title)?>"/>
    <textarea name="description" placeholder="본문" class="span12" rows="15" ><?=($result->description)?></textarea>
    <input class="btn" type="submit" />
</form>