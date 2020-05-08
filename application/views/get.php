<div class="span10">
  <article>
    <h1><?=$topic->title?></h1>
    <div>
      <!-- <div><?=date('o년 n월 j일, G시 i분 s초',$topic->created)?></div>
           date라는 PHP 함수를 이용해서 년월--- 식으로 맞게 출력됨 -->
      <div><?=kdate($topic->created)?></div>
      <div class="up"><?=kdate($topic->updated)?></div>
      <?=auto_link($topic->description)?>
      
      
    </div>
  </article>
  <div>
    <a href="/index.php/topic/add" class="btn">추가</a>
    <!-- auto_link로 값 얻어와서 controller에 전달 -->
    <a href="/index.php/topic/updatePage/<?=auto_link($topic->id)?>" class="btn">수정</a>
    <a href="/index.php/topic/delete/<?=auto_link($topic->id)?>" class="btn">삭제</a>
  </div>
</div>