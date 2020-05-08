<form action="/index.php/topic/add" method="post" class="span10">
<!-- 에러 발생하면 validation_errors 부분에 사용자가 잘못입력한 내용이 공지됨  -->
    <?php echo validation_errors(); ?>
    <input type="text" name="title" placeholder="제목" class="span12" />
    <textarea name="description" placeholder="본문" class="span12" rows="15" ></textarea>
    <input class="btn" type="submit" />
</form>