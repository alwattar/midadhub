<!DOCTYPE html>
<html  ng-app="app" >

    <head>
	<meta charset="UTF-8">
	<title>MIDAD</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Cairo|Dancing+Script|Fjalla+One|Gloria+Hallelujah|Lateef|Lato|Lobster|Open+Sans|Pacifico|Play|Ravi+Prakash|Reem+Kufi|Roboto|Shadows+Into+Light" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/selectize.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/jquery.mCustomScrollbar.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
	<script src="{{ asset('public/js/jquery-1.12.4.min.js') }}"></script>
	<script src="{{ asset('public/js/angular.min.js') }}"></script>	
    </head>

    <body>
	<div class="loader">
        <div>
            <p>منصة مداد </p>
            <p>منصة عالمية مستقلة</p>
            <p>تعمل على نشر ثقافة العمل الإنساني التطوعي</p>
        </div>
    </div>
        <div class="homepage_navbar">
            <nav class="navbar navbar-fixed-top">
            <div class="container">
               <ul class="nav navbar-nav navbar-left ">
                    <li class="login_button"><a href="#">تسجيل الدخول</a>
                    
                    <div class="home-login">
			    <ul>
			    <li data-u="{{ route('login.user') }}" class="login-form active-login"><a href="#user">متطوع</a></li>
				<li data-u="{{ route('login.comp') }}" class="login-form "><a href="#comp">مؤسسة أو شركة</a></li>
				
			    </ul>
			    <div>
				<br><br><br>
				<h1>تسجيل الدخول</h1>
				<form onsubmit="return false;" ng-controller="loginController">
				    <input id="login-tp" type="hidden" value="{{ route('login.user') }}"/>
				    {{ csrf_field() }}
				    <br><br><br>
				    <div>
					<div class="hex1 hexagon-wrapper">
					    <div class="hexagon">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					    </div>
					</div>
					<input ng-model="email" type="text" placeholder="البريد الإلكتروني">
				    </div>
				    <div>

					<div class="hex1 hexagon-wrapper">
					    <div class="hexagon">
						<i class="fa fa-lock" aria-hidden="true"></i>
					    </div>
					</div>
					<input ng-model="password" type="password" placeholder="كلمة المرور">
				    </div>
				    <div class="remember-password">

					<div>
					    <input id="remember-me" ng-model="remember_me" type="checkbox">
					    <label for="remember-me">
						<div class="hex3 hexagon-wrapper">
						    <div  class="hexagon">
							
						    </div>
						</div>
					    </label>
					</div>
					<div>
					    <h4>تذكر كلمة المرور</h4>
					</div>
				    </div>
				    <div class="clear"></div>
				    <div class="login-button">
					<input ng-click="login()" type="button" value="تسجيل الدخول">
				    </div>

				</form>
				<div class="clear"></div>


				<div class="forget-password">
				    <h3>نسيت كلمة المرور؟</h3>
				</div>
				<br>
				<div class="register-new">
				    <h3>لست عضواً في المنصة بعد؟</h3>
				    <h3>سجّل كـ :</h3>

				    <ul>
					<a href="">
					    <li>
						<div class="hex30 hexagon-wrapper">
						    <div class="hexagon">
							<div>
							    <h3>متطوع</h3>
							</div>
						    </div>
						</div>
					    </li>
					</a>
					<a href="#">
                                            <li>
						<div>
                                                    <div>
							<div>
                                                            <h3>أو</h3>
							</div>
                                                    </div>
						</div>
                                            </li>
					</a>
					<a href="">
					    <li>
						<div class="hex30 hexagon-wrapper">
						    <div class="hexagon">
							<div>
							    <h3>مؤسسة</h3>
							</div>
						    </div>
						</div>
					    </li>
					</a>
					
				    </ul>
				</div>
			    </div>
			</div>
                    </li>
                  </ul>
                <ul class="nav navbar-nav navbar-left ">
                    <li><a href="#">الرئيسية</a></li>
                    <li><a href="#">حول المنصة</a></li>
                    <li><a href="#">الخدمات</a></li>
                    <li><a href="#">المهمات</a></li>
                    
                  </ul>
                  <ul class="nav navbar-nav navbar-right ">
                    <li><a href="#">منصة مداد</a></li>
                    <li><a href="#">متطوع</a></li>
                    <li><a href="#">مؤسسة أو شركة</a></li>
                  </ul>
            </div>
                </nav>
        </div>
        <br><br><br><br>
        <div class="homepage_header">
           <div class="homepage_header_bg" style="background-image: url({{ asset('public/img/bg.jpg') }});"></div>
            @if($user_in != true)
			<div class="home-signup">
                            <ul>
				<a href="#user"><li id="user-su" class="signup-form active-signup">متطوع</li></a>
				<a href="#comp"><li id="comp-su" class="signup-form ">مؤسسة أو شركة</li></a>
                            </ul>
                            <div>
				<br><br><br>
				<h1>تسجيل جديد</h1>
				<form class="user-signup" onsubmit="return false;" ng-controller="registerController">
                                    <br>
                                    <div>
					<input ng-model="fname" type="text" placeholder="الاسم الأول">
                                    </div>
                                    <div>
					<input ng-model="lname" type="text" placeholder="اسم العائلة">
                                    </div>
				    <div class="clear"></div>
                                    
                                    
                                    
                                    <div>
					<input ng-model="uemail" type="email" placeholder="البريد الإلكتروني">
                                    </div>
                                    <div>
					<input ng-model="password" type="password" placeholder="كلمة المرور">
                                    </div>
                                    <br><br><br>
                                    <div class="signup-button">
					<input ng-click="register()" type="button" value="تسجيل">
                                    </div>
				    <span ng-bind="greenMsg"></span>
				    <div id="reg-err">
					<span ng-repeat="err in regErrors"><% err.toString() %> <br/></span>
				    </div>
				</form>
				<form class="company-signup hide-form" onsubmit="return false;" ng-controller="compRegisterController">
                                    <br>
                                    <div>
					<input ng-model="comp_name" type="text" placeholder="اسم الشركة أو المؤسسة">
                                    </div>
                                    
                                    <div>
					<input ng-model="comp_name_en" type="text" placeholder="الاسم اللاتيني">
                                    </div>
                                    <div class="clear"></div>
                                    <div>
					<select id="comp_type" class="selectsearch">
					    <option value="">نوع المؤسسة أو الشركة</option>
                                            <option value="org_comp">منظمة مجتمع مدني</option>
                                            <option value="gov_comp">مؤسسة حكومية</option>
                                            <option value="uni_comp">جامعة</option>
                                            <option value="comp_comp">شركة</option>
					</select>
                                    </div>
                                    <div>
					<select id="comp_sort" class="selectsearch">
					    <option value="">التصنيف</option>
                                            <option value="doner_comp">مقدمة خدمة</option>
                                            <option value="bene_comp">طالبة تطوع</option>
                                            <option value="both_comp">مقدمة خدمة وطالبة تطوع</option>
					</select>
                                    </div>
                                    <div>
					<input ng-model="comp_email" type="email" placeholder="البريد الإلكتروني">
                                    </div>
                                    <div>
					<input ng-model="comp_password" type="password" placeholder="كلمة المرور">
                                    </div>
                                    <div class="accept-contract">
					<input ng-model="laccept" type="checkbox" id="accept-contract">
					
					<label for="accept-contract">
					    <div class="hex3 hexagon-wrapper">
						<div class="hexagon">
						    
						</div>
					    </div>
					</label>
					<p>أوافق على <span>الشروط والاحكام.</span></p>
					
                                    </div>
                                    
                                    
                                    <br><br><br>
                                    <div class="signup-button">
					<input ng-click="register()" type="button" value="تسجيل">
                                    </div>
				</form>
                            </div>
			</div> 
		    @endif
            <div class="homepage_quote">
               <h1>مـــداد</h1>
                <h2>منصة عالمية مستقلة،تعمل على نشر ثقافة العمل الإنساني التطوعي،باستخدام وسائل تحفيزية،من خلال منظومة تقنية حديثة ومبتكرة،بغية ترسيخ قيم البذل والعطاء في عموم الأوساط الطلابية</h2>
            </div>
        </div>
	<br><br>
        
	@yield('content')
	
	<section>
            <div class="intro-header">
		<div class="containerz" align="center">

                    <div class="tab-content custom-tab-content" align="center">
			<div class="subscribe-panel">
                            <h1>القائمة البريدية</h1>
                            <p>اشترك معنا بالقائمة البريدية ليصلك كل جديد على إيميلك الشخصي</p>

                            <form action="" method="post">

				<div class="col-md-4"></div>
				<div class="col-md-4">
                                    <div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
					<input type="text" class="form-control input-lg" name="email" id="email" placeholder="ادخل بريدك الإلكتروني" />
                                    </div>
				</div>
				<div class="col-md-4"></div>
				<br/><br/><br/>
				<button class="btn btn-warning btn-lg">اشترك الآن !</button>
                            </form>

			</div>
                    </div>
		</div>
            </div>
	</section>
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
	<!--footer start from here-->

	<div class="copyright">
            <div class="container">
		<div class="col-md-6">
                    <p> 2018 - 2017 © جميع الحقوق محفوظة</p>
		</div>
		<div class="col-md-6">
                    <ul class="bottom_ul">
			<li><a href="#">Netrojin.com</a></li>
			<li><a href="#">حولنا</a></li>
			<li><a href="#">المنتدى</a></li>
			<li><a href="#">سؤال وجواب</a></li>
			<li><a href="#">اتصل بنا</a></li>
			<li><a href="#">خريطة الموقع</a></li>
                    </ul>
		</div>
            </div>
	</div>
	<script src="{{ asset('public/js/jquery-1.12.4.min.js') }}"></script>
	<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/js/npm.js') }}"></script>
	<script src="{{ asset('public/js/wow.min.js') }}"></script>
	<script src="{{ asset('public/js/main.js') }}"></script>
	<script src="{{ asset('public/js/angular_apps.js') }}"></script>
        <script src="{{ asset('public/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
       <script>
		(function($){
			$(window).on("load",function(){
				
				$("body").mCustomScrollbar({
					theme:"minimal-dark",
                    mouseWheelPixels: 300
				});
				
			});
		})(jQuery);
	</script>
        <script src="{{ asset('public/js/selectize.js') }}"></script>
	<script>
	 $('.selectsearch').selectize();
	</script>
        <script>
	 $('.login-form').on('click', function(){
	     $('li.login-form').removeClass('active-login');
	     $(this).addClass('active-login');
	     $("#login-tp").val($(this).data('u'));
	 });
	 
	 $('#user-su').on('click', function(){
	     $('.user-signup').removeClass('hide-form');
	     $('.company-signup').addClass('hide-form');
	     $('li.signup-form').removeClass('active-signup');
	     $(this).addClass('active-signup');
	 });
	 $('#comp-su').on('click', function(){
	     $('.user-signup').addClass('hide-form');
	     $('.company-signup').removeClass('hide-form');
	     $('li.signup-form').removeClass('active-signup');
	     $(this).addClass('active-signup');
	 });
	</script>
        <script>
        $(window).on("load", function() {
            $(".loader>div>p:nth-child(1)").fadeOut(2000, function() {
                $(".loader>div>p:nth-child(2)").fadeIn(2000).fadeOut(2000, function() {
                    $(".loader>div>p:nth-child(3)").fadeIn(1000).fadeOut(1000, function() {
                        $(".loader").fadeOut(1000);
                    })
                })
            })

        });
    </script>
    </body>
    
</html>
