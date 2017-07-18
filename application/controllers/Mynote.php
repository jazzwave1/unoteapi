<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mynote extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        // $this->account_model = edu_get_instance('account_model', 'model'); 
    }

    public function index()
    {
        // test code
        $usn = 1;

        // usn check
        if(! $usn )
        {
            alert('로그인 후 이용하세요.','/login');
            die;
        }

        $note  = edu_get_instance('NoteClass');
        $oNote = new $note($usn);

        $aVdata = array();
        $aVdata['menu'] = getMenuData('Mynote','index');
        $aVdata['sublist'] = $oNote->oNoteInfo;


        // test code
        // echo "<!--";
        // echo "<pre>";
        // print_r($aVdata);
        // echo "</pre>";
        // echo "-->";
        // die();

        $data = array(
             'vdata' => $aVdata
            ,'contents' => 'mynote/list'
        );

        $this->load->view('common/container', $data);
    }
    public function viewNote($n_idx)
    {
        $note  = edu_get_instance('NoteClass');
        $sHtml = $note->getNoteDetailHtml($n_idx);

        $aRtn = array('html' => $sHtml);

        // test code
        // echo '<pre>aRtn: '. print_r( $aRtn, true ) .'</pre>';
        echo $aRtn['html'];
        // die();

        return json_encode($aRtn);
    }

    public function saveNote($n_idx)
    {
        // test code
        $n_idx = 1;

        edu_get_instance('NoteClass');
        // $bRes = NoteClass::getNote($n_idx); 

        // if()
    }
    public function deleteNote($n_idx)
    {
        // test code
        $n_idx = 1;

        if(!$n_idx) return false;
        
        $this->n_idx = $n_idx;

        $this->_deleteNote($this->n_idx);
    }
    private function _deleteNote($n_idx)
    {
        $oNoteModel = edu_get_instance('note_model', 'model');
        $bRes = $oNoteModel->note_model->deleteNote($n_idx);
        return $bRes;
    }



    ##########################
    ###### RPC Function ######
    ##########################
    public function rpcGetNoteInfo()
    {
        $n_idx = $this->input->post('n_idx');

        $aResult = array(
             "code"  => 1
            ,"msg"   => "OK"
            ,"sText" => $this->_getText() 
        );

        response_json($aResult);
        die;
    } 
    private function _getText()
    {
        return "초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea. 목차 국문초록 Ⅰ. 서론 Ⅱ. 로봇 교구의 변천과 현황 Ⅲ. 로봇 교육의 변천과 현황 Ⅳ. 로봇 교구 및 로봇 교육의 발전 방향 Ⅴ. 결론 및 제언 참고문헌 ABSTRACT 키워드초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea. 목차 국문초록 Ⅰ. 서론 Ⅱ. 로봇 교구의 변천과 현황 Ⅲ. 로봇 교육의 변천과 현황 Ⅳ. 로봇 교구 및 로봇 교육의 발전 방향 Ⅴ. 결론 및 제언 참고문헌 ABSTRACT 키워드초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea. 목차 국문초록 Ⅰ. 서론 Ⅱ. 로봇 교구의 변천과 현황 Ⅲ. 로봇 교육의 변천과 현황 Ⅳ. 로봇 교구 및 로봇 교육의 발전 방향 Ⅴ. 결론 및 제언 참고문헌 ABSTRACT 키워드초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea. 목차 국문초록 Ⅰ. 서론 Ⅱ. 로봇 교구의 변천과 현황 Ⅲ. 로봇 교육의 변천과 현황 Ⅳ. 로봇 교구 및 로봇 교육의 발전 방향 Ⅴ. 결론 및 제언 참고문헌 ABSTRACT 키워드초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea. 목차 국문초록 Ⅰ. 서론 Ⅱ. 로봇 교구의 변천과 현황 Ⅲ. 로봇 교육의 변천과 현황 Ⅳ. 로봇 교구 및 로봇 교육의 발전 방향 Ⅴ. 결론 및 제언 참고문헌 ABSTRACT 키워드초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea. 목차 국문초록 Ⅰ. 서론 Ⅱ. 로봇 교구의 변천과 현황 Ⅲ. 로봇 교육의 변천과 현황 Ⅳ. 로봇 교구 및 로봇 교육의 발전 방향 Ⅴ. 결론 및 제언 참고문헌 ABSTRACT 키워드초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea. 목차 국문초록 Ⅰ. 서론 Ⅱ. 로봇 교구의 변천과 현황 Ⅲ. 로봇 교육의 변천과 현황 Ⅳ. 로봇 교구 및 로봇 교육의 발전 방향 Ⅴ. 결론 및 제언 참고문헌 ABSTRACT 키워드초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea.";

    } 
}
