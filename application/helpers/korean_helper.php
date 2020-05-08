<!-- 직접적으로 이 스크립트를 이용못하도록  -->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//  kdate라는 함수가 존재하는지 확인 (helper는 전역적으로 사용하기때문에)
if ( ! function_exists('kdate')){
  function kdate($stamp){
    // date라는 php함수에 첫번째 인자로로 우리가원하는 포맷, 두번째 인자로 인자로 받은 스탬프값주고 그거 리턴
    if ($stamp == NULL) {
      echo "<HTML>
              <head>
                <style>.up{display:none}</style>
              <head>
            </HTML>";
    }
    return date('o년 n월 j일, G시 i분 s초', $stamp);
  }
}