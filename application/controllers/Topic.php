<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Topic extends CI_Controller {
  // 컨트롤러에서 생성자를 사용하고자 한다면 생성자아래 반드시 아래의 코드(parent::__construct();)가 들어있어야합
  function __construct()
  {
    // 생성자는 클래스가 초기화될때 어떤 기본값들을 설정해야한다거나 어떤 프로세스를 수행해야할때 유용. 생성자는 리턴값이 있어서는 안됨       
    parent::__construct();
    $this->load->database();
    $this->load->model('topic_model');
  }

  function index(){        
    $this->_head();

    $this->load->view('main');

    $this->load->view('footer');
  }

  function get($id){        
    $this->_head();

    $topic = $this->topic_model->get($id);
    // korean라고 적으면 로드될때 helper 안에 korean_helper라는 파일이 있는지 자동으로 찾아봄 있다면 사용함
    $this->load->helper(array('url', 'HTML', 'korean'));
    $this->load->view('get', array('topic'=>$topic));

    $this->load->view('footer');
  } 

  // 폼을 출력하는 역할 + 사용자 입력 정보를 받아 db에 저장
  function add(){
    // 맨처음에 add 페이지가 실행되면 입력한 값이 없으므로 처음엔 입력하는 페이지로 이동
    $this->_head();
    
    $this->load->library('form_validation');

    // 검사규칙 설정( 필드네임(폼이데이터 전송할때 사용되는 이름), 사람이 알아보기 쉬운 이름(에러났을 때 알아보기쉬움), 폼에 필요한 검사규칙들)
    // 폼 검사규칙들 : requiredㄱㅏ 있으면 사용자가 입력 안하면 에러가 난다. |min_length[5]|max_length[12] = 5~12글자 사이로 입력| 등등
    $this->form_validation->set_rules('title', '제목', 'required');
    $this->form_validation->set_rules('description', '본문', 'required');

    // 사용자가 입력한 정보의 유효성을 검증하는 로직을 실행시킨다. == 다르다면
    if ($this->form_validation->run() == FALSE)
    {
      // 폼을 생성하는 뷰
      $this->load->view('add');
    }
    else
    {
      // $this->load->model('topic_model'); 위에 모델을 호출해놔서 이 부분 불필요
      // topic에 사용자가 입력한 정보가 추가되는 로직
      $topic_id = $this->topic_model->add($this->input->post('title'), $this->input->post('description'));
      // url 헬퍼 로드
      
      $this->load->helper('url');
      // url 헬퍼에 정의되있는 메소드 | 리다이랙션(입력 후 성공 시 해당 화면으로 사용자 보여주는거)
      if($topic_id)
      redirect('/topic/get/'.$topic_id);
      else{
        redirect('/topic');
      }

    }

    $this->load->view('footer');
  }

  // 업데이트 페이지로 이동
  function updatePage($id){
    $this->_head();

    // 해당 아이디값의 데이터 셀렉
    $result = $this->topic_model->get($id);

    $this->load->view('updatePage', array('result'=>$result));

    $this->load->view('footer');
  }

// 업데이트 하는거
  function update($id){
    // 실제 업데이트
    $this->_head();
    
    $this->load->library('form_validation');

    $this->form_validation->set_rules('title', '제목', 'required');
    $this->form_validation->set_rules('description', '본문', 'required');

    // 사용자가 입력한 정보의 유효성을 검증하는 로직을 실행시킨다. == 다르다면
    if ($this->form_validation->run() == FALSE)
    {
      // 폼을 생성하는 뷰
      $this->load->view('updatePage');
    }
    else
    {
      $topic_id = $this->topic_model->update($this->input->post('title'), $this->input->post('description'), $id);
      $this->load->helper('url');
      redirect('/topic/get/'.$topic_id);

    }

    $this->load->view('footer');

  }


  function delete($id){
    $this->_head();

    $result = $this->topic_model->delete($id);

    $this->load->view('delete', array('result'=>$result));

    $this->load->view('footer');
  }




  // 코드 양 줄이고 수정편하게 중복되는 부분 따로 선언 후 호출
  // 앞에 _ 를 붙이면 프라이빗한 메소드가 됨 => url 라우팅에 대한 프라이빗 (=사용자가 _head라고 입력해도 표시x)
  function _head(){
    $this->load->view('head');
    $topics = $this->topic_model->gets();
    $this->load->view('topic_list', array('topics'=>$topics));
  }
}
?>