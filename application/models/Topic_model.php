<?php
class Topic_model extends CI_Model {
 
    function __construct()
    {       
      // 부모 controller의 생성자를 재정의 하기때문에 부모 controller를 수동으로 호출해줘야함
      parent::__construct();
    }
 
    function gets(){
      return $this->db->query("SELECT * FROM topic")->result();
    }
 
    function get($topic_id){
      // 이렇게 적으면 먼저 선언 한 title 덕분에 get_where를 해도 title만 가져옴
      // $this->db->select('title');
      $this->db->select('id');
      $this->db->select('title');
      $this->db->select('description');
      // created라는 컬럼의 값을 유닉스스탬프라는 함수로 실행시켜서 타임스탬프라는 형식의 포맷으로 변환한다/그 변환된 결과는 create라는 이름으로 받는다
      $this->db->select('UNIX_TIMESTAMP(created) as created');
      $this->db->select('UNIX_TIMESTAMP(updated) as updated');
      // SELECT id,title,description,created FROM TOPIC;
      return $this->db->get_where('topic', array('id'=>$topic_id))->row();
    }

  function add($title, $description){
    // 데이터가 입력한 데이터가 기록되는 시점을 기록해야함 | 뒤에 false라고 적게되면 NOW를 문자로 인식하지않음
    $this->db->set('created','NOW()', false);
    // 인서트 문 생성 (어디, 입력할 데이터)| 인서트에 대한 결과값을 리턴값으로
    $this->db->insert('topic', array(
      'title'=>$title,
      'description'=>$description
    ));
    // 데이터가 어떤 아이디값을 갖는지 알수있는 방법 
    return $this->db->insert_id();
  }
  // ㄴ 토픽에 행이 추가되면 그 행에 대한 아이디값을 가져와서 그것을 리턴하는 로직이 완성

  function update($title, $description, $id){
    $this->db->set('updated','NOW()', false);
    $data = array(
      'title' => $title,
      'description' => $description,
    );

    $this->db->where('id',$id);
    $this->db->update('topic',$data);

    return $id;

  }

  function delete($id){
    
    $result = $this->db->delete('topic', array(
      'id' => $id
    ));
    return $result;
  }
}