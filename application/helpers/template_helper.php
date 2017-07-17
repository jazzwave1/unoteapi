<?php
function getTemplateSublist($aData)
{
    $sRtn = '';
    $sRtn .= '
                <!--sublist-->
                <div id="bankSub" class="full-left-sublist my-note">
                    <div class="bsinner">
                        <!--카테고리타이틀/필터/버튼 영역-->
                        <div class="listFilter">
                            <p><i class="fa fa-book" aria-hidden="true"></i>'.$aData['menu']['s_name'].'</p>
                            <p class="filter">정렬 | <span>최신순 <i class="fa fa-caret-down" aria-hidden="true"></i></span></p>
                        </div>
                        <div class="subSearch">
                            <div class="search-inner">
                                <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                                <input type="search" id="search" placeholder="Search..." />
                            </div>
                        </div>
                        <div class="sroll-inner">
                            <!--리스트가 화면 height넘어가면, class scroll-subList생김-->
                            <div class="scroll-subList">
                            <!--글감리스트-->
                            <ul class="bankSubList">
            ';

    foreach ($aData['sublist'] as $obj)
    {
        $sRtn .= '
                                <li class="">
                                    <a href="1">
                                        <div class="cafeInfo ">
                                            <div class="cafeinner clearfix">
                                                <div class="cafeLogo">'.$obj->datastring->source.'</div>
                                                <div class="cafeTxt">
                                                    <p class="tit">'.$obj->datastring->title.'</p>
                                                    <p></p>
                                                    <p class="date">'.$obj->datastring->reg_date.'</p>
                                                </div>
                                                <div class="deleteBtn"><i class="fa fa-trash-o" aria-hidden="true"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
            ';
    }

    $sRtn .= '
                            </ul>
                            <!--//글감리스트-->
                        </div>
                        </div>
                    </div>
                </div>
                <!--//sublist-->
            ';

    echo $sRtn;
}

function getTemplateDetail($aData)
{
    $sRtn = '';
    $sRtn .= '
               <!--detailView-->
                <div id="detailView">
                    <div class="dvinner">
                        <div class="page">
                            <div class="p-top clearfix">
                                <div class="top-inner">
                                    <div class="clearfix">
                                        <div class="p-info">
                                            <p class="p-tit">소1프트웨어 교육과 미래교육의 방향</p>
                                            <p><span>네이버까페</span> / <span>카페명</span> / <span>카테고리</span> / <span>게시물명</span></p>
                                            <p>수집일 : 2017.05.21 12시 31분 완료 </p>
                                        </div>
                                        <div class="p-btn">
                                            <ul class="clearfix">
                                                <li>
                                                    <i class="fa fa-bookmark fa-1g" aria-hidden="true"></i>
                                                    <!--<div>북마크</div>-->
                                                </li>
                                                <li>
                                                    <i class="fa fa-road fa-1g" aria-hidden="true"></i>
                                                    <!--<div>이동</div>-->
                                                </li>
                                                <li>
                                                    <i class="fa fa-external-link fa-1g " aria-hidden="true"></i>
                                                    <!--<div>새창</div>-->
                                                </li>
                                                <li>
                                                    <i class="fa fa-trash-o fa-1g" aria-hidden="true"></i>
                                                    <!--<div>휴지통</div>-->
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-txt">
                                <div class="p-inner">
                                    초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea. 목차 국문초록 Ⅰ. 서론 Ⅱ. 로봇 교구의 변천과 현황 Ⅲ. 로봇 교육의 변천과 현황 Ⅳ. 로봇 교구 및 로봇 교육의 발전 방향 Ⅴ. 결론 및 제언 참고문헌 ABSTRACT 키워드초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea. 목차 국문초록 Ⅰ. 서론 Ⅱ. 로봇 교구의 변천과 현황 Ⅲ. 로봇 교육의 변천과 현황 Ⅳ. 로봇 교구 및 로봇 교육의 발전 방향 Ⅴ. 결론 및 제언 참고문헌 ABSTRACT 키워드초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea. 목차 국문초록 Ⅰ. 서론 Ⅱ. 로봇 교구의 변천과 현황 Ⅲ. 로봇 교육의 변천과 현황 Ⅳ. 로봇 교구 및 로봇 교육의 발전 방향 Ⅴ. 결론 및 제언 참고문헌 ABSTRACT 키워드초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea. 목차 국문초록 Ⅰ. 서론 Ⅱ. 로봇 교구의 변천과 현황 Ⅲ. 로봇 교육의 변천과 현황 Ⅳ. 로봇 교구 및 로봇 교육의 발전 방향 Ⅴ. 결론 및 제언 참고문헌 ABSTRACT 키워드초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea. 목차 국문초록 Ⅰ. 서론 Ⅱ. 로봇 교구의 변천과 현황 Ⅲ. 로봇 교육의 변천과 현황 Ⅳ. 로봇 교구 및 로봇 교육의 발전 방향 Ⅴ. 결론 및 제언 참고문헌 ABSTRACT 키워드초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea. 목차 국문초록 Ⅰ. 서론 Ⅱ. 로봇 교구의 변천과 현황 Ⅲ. 로봇 교육의 변천과 현황 Ⅳ. 로봇 교구 및 로봇 교육의 발전 방향 Ⅴ. 결론 및 제언 참고문헌 ABSTRACT 키워드초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea. 목차 국문초록 Ⅰ. 서론 Ⅱ. 로봇 교구의 변천과 현황 Ⅲ. 로봇 교육의 변천과 현황 Ⅳ. 로봇 교구 및 로봇 교육의 발전 방향 Ⅴ. 결론 및 제언 참고문헌 ABSTRACT 키워드초록 본 연구에서는 우리나라의 로봇 교구와 로봇 교육의 변천과 현황 그리고 앞으로의 발전 방향을 살펴보고자 하였다. 이를 위한 연구 내용으로는 (1) 로봇 교구의 종류와 경향 그리고 변천의 추이, 로봇 교육에 대한 기존의 사례를 고찰하고 분석하였으며 (2) 현재의 로봇 교구 및 로봇 교육의 문제점을 교사 대상 설문 조사하여 분석 결과를 제시하였다. (3) 그리고 학교 현장에서 로봇교육 방향과 로봇 교구의 발전에 대한 의견을 제안하였다. 연구 결과에 도출된 결론은 다음과 같다. 첫째, 교육용 로봇의 구성과 안전 문제 등이 아직 로봇 교육을 위한 학습 자료로 사용하기 어려움이 많은 것으로 파악되고 있다. 둘째, 로봇 교육을 담당하는 교사들은 본인들의 로봇 관련 연수나 학생을 위한 로봇 교육 프로그램이 빈약하다고 느끼고 있다. 세째, 우리나라 현실에 적합한 로봇 교구와 로봇 기술에 대한 소양 교육과 로봇 활용 교육을 위한 교육과정과 연수 프로그램들이 지속적으로 요구되고 있음을 알 수 있었다. The purpose of this study is to review the robot hardware and teaching program for robot education of elementary school in South Korea. In this paper, I performed review of the changing process and present situation of the hardware, teaching material and coursework for robot education. And performed analyzing the responses of 60 robot-education teachers questionnaires about robot HW, teaching program and environments in elementary schools The results of this study are as follows : First, current robot hard ware and teaching materials in elementary schools are very weak, unsafe, hard-to-assembly and software tools for programming have no standard specification. So many teachers and students have much difficulty in teaching-learning of robot. Second, the biggest complaint among robot teachers is the lack of adequate training for them and lesson plans for students. Third, the more research is needed on robotics and robot-utilized education contents and hardware as a learning material which are customized for elementary school students in South Korea.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--//detailView-->
    ';

    echo $sRtn;

}
