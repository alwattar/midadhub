@extends('users.layout')
@section('title')
    User Dash Board
@endsection


@section('userd_content')
   <div class="fulluser-d">
       <header>
        <img src="{{ asset('public/img/bguser.jpg') }}" style="width:100%;height:100%">
    </header> 
    <nav class="navbar navbar-fixed-top">
        <div class="container">
            <ul class="nav navbar-nav navbar-left ">
                <li><a href="#">الرئيسية</a></li>
                <li><a href="#">حول المنصة</a></li>
                <li><a href="#">الخدمات</a></li>
                <li><a href="#">المهمات</a></li>
                <li><a href="#">الأخبار</a></li>
                <li><a href="#">اتصل بنا</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right ">
                <li><a href="#">منصة مداد</a></li>
              </ul>
        </div>
    </nav>
          <div class="user_menu">
            <ul>
                <li>
                                    <a href=""><i class="fa fa-home" aria-hidden="true"></i><span>اللوحة الرئيسية</span></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-handshake-o" aria-hidden="true"></i><span>اضافة مهمة</span></a>
                                </li>
                                
                                <li>
                                    <a href=""><i class="fa fa-diamond" aria-hidden="true"></i><span>كشف اضافة إعلان</span></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-diamond" aria-hidden="true"></i><span>طلب توظيف</span></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-map-o" aria-hidden="true"></i><span>الخريطة </span></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>رفع شكوى</span></a>
                                </li>
                                <li>
                                    <a href="{{route('user.settings')}}"><i class="fa fa-cog" aria-hidden="true"></i><span>الإعدادات</span></a>
                                </li>
                                
                                
                                <li>
                                    <a href="{{route('logout')}}"><i class="fa fa-power-off" aria-hidden="true"></i><span>تسجيل الخروج</span></a>
                                </li>
            </ul>
        </div>
           <div class="space300"></div>   
                   <div class="container userd-card">
                       <div class="row">
                          <div class="col-sm-12">
                                  <div class="row">
                                      <div class="col-sm-2">
                                          <div>
                                              <img src="{{ asset('public/img/profile3.jpg') }}" alt="">
                                          </div>
                                      </div>
                                      <div class="col-sm-4">
                                          <div>
                                              <h1>محمد النجار</h1>
                                              <h4>متطوع حر</h4>
                                              <br>
                                              <br><br><br>
                                              <div>
                                                  <input value="رسالة" class="btn btn-info">
                                                  <input value="السيرة الذاتية" class="btn btn-default">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              
                          </div>
                          
                          
                           <div class="col-sm-12">
                                   
                                       <ul>
                                           <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                                           <li><i class="fa fa-google-plus" aria-hidden="true"></i></li>
                                           <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
                                           <li><i class="fa fa-linkedin" aria-hidden="true"></i></li>
                                           <li><i class="fa fa-youtube-play" aria-hidden="true"></i></li>
                                           <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                                       </ul>
                                  
                           </div>
                       </div>
                   </div>
                  <div class="bg-gray">
                        <div class="container user_map">
                           <div class="row">
                               <div class="col-sm-12">
                                   <div>
                                       <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2965.0824050173574!2d-93.63905729999999!3d41.998507000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sWebFilings%2C+University+Boulevard%2C+Ames%2C+IA!5e0!3m2!1sen!2sus!4v1390839289319" width="100%" height="300" frameborder="0" style="border:0"></iframe>
                                   </div>
                                   <div>
                                       <img src="{{ asset('public/img/profile3.jpg') }}" alt="">
                                       <h3>أحمد زين الدين</h3>
                                       <p>الرتبة : العمل</p>
                                       <p>العمر : 23 عام</p>
                                       <div>
                                           <ul>
                                               <li>
                                               25
                                               <i class="fa fa-heart-o" aria-hidden="true"></i>
                                               </li>
                                               <li>
                                               <i class="fa fa-trophy" aria-hidden="true"></i>
                                               1250</li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-sm-12">
                                   <div>
                                       <ul>
                                           <li>المؤسسات الحكومة
                                           <h3 class="count">55</h3>
                                           </li>
                                           <li>المنظمات
                                           <h3 class="count">300</h3>
                                           </li>
                                           <li>الشركات المانحة
                                           <h3 class="count">55</h3>
                                           </li>
                                           <li>المتطوعين
                                           <h3 class="count">3340</h3>
                                           </li>
                                           <li>الخدمات
                                           <h3 class="count">250</h3>
                                           </li>
                                           <li>المهمات التطوعية
                                           <h3 class="count">890</h3>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                               
                           </div>
                       </div>
                        
                        <div class="container">
                            <div class="row">
                            <div class="col-sm-2">
                            <div class="userprofile-percent">
                           <div><i class="fa fa-times" aria-hidden="true"></i></div>
                           <a href="userd/settings">
                            <div class="userprofile-percent-circle" >
                                <div class="userprofile-circles">
                                    <div class="userprofile-second userprofile-circle">
                                        <strong></strong>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <div class="text-center">عند اكمال ملفك الشخصي ستكسب 50 نقطة</div>
                        </div>
                            </div>
                            
                            
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-2">
                                <div class="userprofile-vote">
                            <h3>ما هو رأيكم بالموقع الحالي؟</h3>
                            
                            <form>
                           
                                <input type="radio" value="1" name="vote">سيء
                                <br>
                                <input type="radio" value="2" name="vote">جيد
                                <br>
                                <input type="radio" value="3" name="vote">ممتاز  
                                <br> 
                            <div><input type="button" value="صوّت"></div>
                            
                            </form>
                        </div>
                            </div>
                            </div>
                        </div>
                        <footer>
                            <div class="container">
                               <div class="row">
                        <div class="col-md-3 col-sm-6 footer-col">
                                   <div class="logofooter"> <img src="{{ asset('public/img/logo.png') }}"></div>
                       
                                   <p><i class="fa fa-map-pin"></i> توبتشولار - اسطنبول - تركيا</p>
                                   <p><i class="fa fa-phone"></i> الهاتف المحمول (تركيا) : +90 559 95 599 99</p>
                                   <p><i class="fa fa-envelope"></i> البريد الإلكتروني : info@edumidad.org</p>
                       
                        </div>
                        <div class="col-md-3 col-sm-6 footer-col">
                                   <h6 class="heading7">روابط عامة</h6>
                                   <ul class="footer-ul">
                                <li><a href="#"> اهلا بكم</a></li>
                                <li><a href="#"> الأمان والخصوصية</a></li>
                                <li><a href="#"> الاتفاقيات</a></li>
                                <li><a href="#"> الحسابات</a></li>
                                <li><a href="#"> الترتيبات</a></li>
                                <li><a href="#">اخر الأخبار</a></li>
                                <li><a href="#"> سؤال وجواب</a></li>
                                   </ul>
                        </div>
                        <div class="col-md-3 col-sm-6 footer-col">
                                   <h6 class="heading7">أخر الأخبار</h6>
                                   <div class="post">
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، ص الأخرى إضافة إلى زيادة عديان أن يطلع على صورة حقيقية لتصميم الموقع.<span>August 1,2017</span></p>
                                <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.<span>August 13,2017</span></p>
                                <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.<span>August 23,2017</span></p>
                                   </div>
                        </div>
                        <div class="col-md-3 col-sm-6 footer-col">
                                   <h6 class="heading7">تواصل اجتماعي</h6>
                                   <ul class="footer-social">
                                <li><i class="fa fa-linkedin social-icon linked-in" aria-hidden="true"></i></li>
                                <li><i class="fa fa-facebook social-icon facebook" aria-hidden="true"></i></li>
                                <li><i class="fa fa-twitter social-icon twitter" aria-hidden="true"></i></li>
                                <li><i class="fa fa-google-plus social-icon google" aria-hidden="true"></i></li>
                                   </ul>
                        </div>
                               </div>
                                   </div>
                                           </footer>
                   </div>
                </div>
                
@endsection

