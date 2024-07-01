@extends('layouts.front')
@section('title','Faqs')
@section('content')

<section id="hero" class="d-flex align-items-center">
                        <div id="particles-js"></div>
                        <div class="container2">
                            <div class="row align-items-center">
                                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="hero_txt">
                                    <h3>Find here</h3>
                                    <h1>
                                      <a>How Can We Help You?</a>
                                    </h1>
                                    <p>Get Your Answer Here, Come in for your doubts and queries to get an
                                        exact solution with specific details, read here.</p>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="hero-img-box text-center">
                                        <img src="public/assets/img/faq/technology.svg" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
        <!--<section id="" class="d-flex hero_banner faq align-items-center">
            <div class="container2">
                <div class="txt-box">
                    <h2 class="themes-color">WELCOME TO</h2>
                    <h1>OUR FAQ</h1>
                    <h2>SOLUTION, QUESTION, HELP, ETC...</h2>
                </div>
            </div>
        </section>-->
        <section class="search-bar">
            <div class="container2">
                <div class="input_bg">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class='bx bx-search'></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search " aria-label="Search" aria-describedby="button-addon2" id="myInput" onkeyup="searching()" autocomplete="off" tabindex="1">
                        <div class="input-group-append">

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======= Faq ======= -->
        <section class="faq_list p-t-20">
            <div class="container2" data-aos="fade-up">
                <div class="faq-list">
                    <ul id="myUL">
                        <div class="col-lg-12 faq_message" style="color: rgb(2, 143, 204);text-align: center;font-size: 22px;display: none">
                            <strong>Not Found Any Related FAQs </strong>
                        </div>
                        <li class="list">
                            <a data-toggle="collapse" class="collapse" href="#faq-list-1" aria-expanded="false">Which platform is Best for us? Android/iOS or both?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                       "First of all you have to decide for yourself:
                                    </p>
                                    <div class="p-t-10 p-b-10">
                                    <p>1. Demographics of your target customers? </p>
                                    <p>2. Mobile platform? </p>
                                    <p>3. Budget of your application? </p>
                                    </div>
                                    <p>As per our experience says that the majority of Asian clients are go with Android platform & the European & American clients are go with iOS platform." </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-2" class="collapsed" aria-expanded="false">The App will support in iPad versions for iOS and tablet version for Android?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        Yes, It will support in both devices, But as per your budget you want to develop it separately for both different devices, Then it's possible. 
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-3" class="collapsed" aria-expanded="false">My application will run? If any new OS is launched in Market?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        In general, Android and iOS take care of older functions - to keep your apps working after the release of any new OS. However, if a specific section of your entire application stops working, you should contact your development team to activate your application.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-4" class="collapsed" aria-expanded="false">My unique app idea is secure with you?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        At Vasundhara infotech, we do <strong>Sign an NDA (Non-disclosure agreement)</strong> to guarantee the security of your app idea.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            </i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Which steps I'll follow to make my app successful?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                                <div class="faq_box">
                                    <p>
                                        Step 1. Solve customer's intent through Application
                                    </p>
                                     <p>
                                        Step 2. Make sharp marketing strategies
                                    </p>
                                     <p>
                                        Step 3. Decide budget of marketing
                                    </p>
                                     <p>
                                        Step 4. Find the targeted audience of the customers
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-6" class="collapsed" aria-expanded="false">I'm not a tech savvy person. Then How can we deal?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-6" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        We have more than 80% of the clients are belonged to the non-technical background from last 8 years. We'll do try best to explain all of the tasks to you.
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-7" class="collapsed" aria-expanded="false">What is the approx cost of development?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-7" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        It depends on application features and functionality. But, you can get a free estimate and Technical guide today.   
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-8" class="collapsed" aria-expanded="false">Payment procedure?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-8" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                       We divide the project into various parts of the module.
                                    </p>
                                    <div class="p-t-10">
                                    <p>
                                       1. We finish any module.
                                    </p>
                                    <p>
                                       2. Send it for client approval
                                    </p>
                                    <p>
                                       3. We get client satisfaction & approval
                                    </p>
                                    <p>
                                       4. After that client will release the payment of respective module  
                                    </p>
                                </div>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-9" class="collapsed" aria-expanded="false">Do I need to test my app?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-9" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        We have an in-house testing expert team. But we recommend our clients to test the app modules from their side. It's for client satisfaction.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-10" class="collapsed" aria-expanded="false">How can I discuss it during the project development stage?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-10" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        Yes, We have appointed a Project leader on every single project. They are responsible to communicate with the client till the end of the project development.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <span id="less"></span><span id="more">
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-11" class="collapsed" aria-expanded="false">After it gets App live, would you handle my application?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-11" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        Yes, we are providing free support for a limited time frame. After that, we are providing paid support services at nominal rates.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-12" class="collapsed" aria-expanded="false">My website work on all devices and desktop OS?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-12" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        Yes, we develop responsive websites. But we develop as per your requirement.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-13" class="collapsed" aria-expanded="false">Can I check code during the development process?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-13" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        No, we do not provide any access to coding file before the payment completion. But we provide you a copy of one or two coding files to assure you coding standards.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-14" class="collapsed" aria-expanded="false">After Payment completed, who will owner of source code?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-14" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        After the complete full payment process, The client becomes the owner of the project code.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-15" class="collapsed" aria-expanded="false">Charges for creating a developer account on Google and Apple?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-15" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        For an Android developer account = $25/Year
                                    </p>
                                    <p>For an Apple developer account = $99/Year</p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-16" class="collapsed" aria-expanded="false">Company's industrial working experience?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-16" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        Vasundhara infotech was established in the year 2014 and have successfully completed 8 years in this industry.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-17" class="collapsed" aria-expanded="false">Which services do you provide for us?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-17" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        You can check "Service" tab in the main menu bar. We have mentioned our all services over there.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-18" class="collapsed" aria-expanded="false">What is your total experience in terms of project completion?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-18" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                       We have successfully completed over 870+ projects.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-19" class="collapsed" aria-expanded="false">Did you deal with different time zones of clients?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-19" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        Yes, We have done craftily project work in different time zones with global clients.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-20" class="collapsed" aria-expanded="false">How many team members are currently working at your organization?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-20" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        Vasundhara Infotech has got more than 250+ talented employees.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-21" class="collapsed" aria-expanded="false">Would you submit the application on the app store?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-21" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        Yes, as mentioned in our contract we would handle the app submission part.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-22" class="collapsed" aria-expanded="false">Which aspects would fall under the free support period?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-22" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        We would fix all bugs in the project under the free support period. 
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-23" class="collapsed" aria-expanded="false">Who will handle the third-party charges?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-23" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        The client will be responsible for every third party charges.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-24" class="collapsed" aria-expanded="false">Do you have an in-house design team?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-24" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        Yes, we have dedicated Creative designers in our In house team.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <a data-toggle="collapse" href="#faq-list-25" class="collapsed" aria-expanded="false">Do you have an in-house tester team?
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-25" class="collapse" data-parent=".faq-list" style="">
                                <div class="faq_box">
                                    <p>
                                        Yes, we have dedicated 15+ Quality assurance analyst in our In house team.
                                    </p>
                                </div>
                            </div>
                        </li></span>
                    </ul>
                    
                </div>
            </div>
        </section>
        

@endsection