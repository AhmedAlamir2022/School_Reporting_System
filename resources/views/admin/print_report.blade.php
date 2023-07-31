@extends('includes.masterprint')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
     طباعه التقرير - MOTIVATION RECREATED
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row row-sm" >
        <div class="col-md-12 col-xl-12" >
            <div class=" main-content-body-invoice" >
                <div class="card card-invoice">
                    <div class="card-body" style="background-color: rgb(240, 237, 237); font-size: 16px;">
                        <div class="invoice-header"  style="background-color: rgb(168, 23, 23);">
                            <div class=" col-md-6 billed-from">
                                <p class="invoice-title" style="color: black; margin:40px; font-size: 30px; text-align:center;"><span style="color: white;">التقرير الاسبوعى</span><br>
                                    <span style="color: gray; "> Liverpool 2023</span><br></p>
                            </div>
                            <div class=" col-md-6 billed-from">
                                <h6><img src="{{URL::asset('assets/img/logo1.PNG')}}" style="width: 150px; height: 150px; margin:30px; display: block;
                                    margin-left: auto;
                                    margin-right: auto;
                                    " class="main-logo" alt="logo"></h6>
                                
                            </div><!-- billed-from -->
                        </div><!-- invoice-header --><br><br>
                        <div class="row mg-t-20">
                            <div class="col-md-6">
                                <label class="tx-gray-600"></label>
                                <div class="billed-to">
                                    
                                    <label class="tx-gray-600" style="color: black"> <strong>البيانات الشخصية</strong></label>
                                    <p class="invoice-info-row" style="font-size: 15px;"><span style=" color: red;">أسم الطالب</span> <span style=" color: black;">{{ $reports->student->student_name }}</span></p>
                                    <p class="invoice-info-row" style="font-size: 15px;"><span style=" color: red;">الاسبوع</span> <span style=" color: black;">{{ $reports->week->week_name }}</span></p>
                                    <p class="invoice-info-row" style="font-size: 15px;"><span style=" color: red;">تاريخ التقرير</span> <span style=" color: black;">{{ $reports->report_date }}</span></p>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="table-responsive mg-t-40" >
                            <table class="table table-invoice border text-md-nowrap mb-0" >
                                <thead >
                                    <tr>
                                        <th class="wd-20p" style="font-size: 16px; color:black;"><strong>البنود</strong></th>
                                        <th class="wd-40p" style="font-size: 16px; color:black;"><strong>التفاصيل</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="color: red">السمات الشخصية</td>
                                        <td class="tx-12" style="font-size: 15px; color: black">@foreach($reports->traits as $value)
                                            {{$value}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td style="color: red">السلوكيات</td>
                                        <td class="tx-12" style="font-size: 15px; color: black">@foreach($reports->manners as $value)
                                            {{$value}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach.</td>
                                    </tr>
                                    <tr>
                                        <td style="color: red">الهوايات والشغف</td>
                                        <td class="tx-12" style="font-size: 15px; color: black">{{ $reports->hobbies }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color: red">العلاقات</td>
                                        <td class="tx-12" style="font-size: 15px; color: black">@foreach($reports->relationships as $value)
                                            {{$value}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td style="color: red">مواعيد الاستيقاظ</td>
                                        <td class="tx-12" style="font-size: 15px; color: black">@foreach($reports->weakup as $value)
                                            {{$value}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td style="color: red">الحصص الدراسيه</td>
                                        <td class="tx-12" style="font-size: 15px; color: black">@foreach($reports->classrooms as $value)
                                            {{$value}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td style="color: red">ملاحظات عامه وتوصيات</td>
                                        <td class="tx-12" style="font-size: 15px; color: black">{{ $reports->notes }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color: red">انطباع الاداره</td>
                                        <td class="tx-12" style="font-size: 15px; color: black">{{ $reports->openinos }}</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                        <hr class="mg-b-40">
                        <div class="billed-from" style="text-align: center; margin:auto; color: black">
                            <h6>مع تحيات 
                                الاستاذ هشام العمير 
                                مشرف الرحلة .</h6>
                        </div><!-- billed-from -->
                        <hr class="mg-b-40">
                       
                        
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    

    
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script> window.print(); </script>

    

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>

@endsection
