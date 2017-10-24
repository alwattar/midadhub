@extends('index_layout')

@section('title') Login
@endsection

@section('content')
<section class="container-fluid volunteer-section">
   
	    <div class="container homepage_map">
                          <p>ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــ</p>
        <h1>الخريطة التفاعلية</h1>
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
                                           <li>
                                           <h4>
                                           <i class="fa fa-university" aria-hidden="true"></i>
                                           </h4>
                                           المؤسسات الحكومة
                                           <h3 class="count">55</h3>
                                           </li>
                                           <li>
                                           <h4>
                                           <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                           </h4>
                                           الجامعات
                                           <h3 class="count">55</h3>
                                           </li>
                                           <li>
                                           <h4>
                                               <i class="fa fa-podcast" aria-hidden="true"></i>
                                           </h4>
                                           المنظمات
                                           <h3 class="count">300</h3>
                                           </li>
                                           <li>
                                           <h4><i class="fa fa-building" aria-hidden="true"></i></h4>
                                           الشركات المانحة
                                           <h3 class="count">55</h3>
                                           </li>
                                           <li>
                                           <h4><i class="fa fa-user" aria-hidden="true"></i></h4>
                                           المتطوعين
                                           <h3 class="count">3340</h3>
                                           </li>
                                           <li>
                                           <h4>
                                               <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                           </h4>
                                           الخدمات
                                           <h3 class="count">250</h3>
                                           </li>
                                           <li>
                                           <h4>
                                               <i class="fa fa-compass" aria-hidden="true"></i>
                                           </h4>
                                           المهمات التطوعية
                                           <h3 class="count">890</h3>
                                           </li>
                                       </ul>
                                   </div>
                               </div>
                               
                           </div>
                       </div>
	
    
</section>
<div class="container-fluid tri-ma">
    <div class="container">
        
    </div>
</div>
@endsection
