@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@section('content')
    <div class="container" style="direction: rtl; font-family: Vazir">

        @include('layouts.menu')

        <div class="panel panel-default pt-4">
            <div class="panel-heading text-center pb-2">جستجوی اطلاعات شرکت ها</div>
            <div class="panel-body">
                <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="جستجوی اطلاعات شرکت ها" />
                </div>
                <div class="table-responsive">
                    <h3 align="center">مقادیر کلی <span id="total_records"></span></h3>
                    <table class="table table-striped table-bordered text-center" style="font-family: Vazir; font-size: 10px;">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th class="text-center">نام</th>
                            <th class="text-center">شماره پرونده</th>
                            <th class="text-center">شماره تلفن</th>
                            <th class="text-center">متراژ</th>
                            <th class="text-center">قطر انشعاب</th>
                            <th class="text-center">آدرس ایمیل</th>
                            <th class="text-center">انشعاب فاضلاب</th>
                            <th class="text-center">فاز</th>
                            <th class="text-center">صدور قبض جدید</th>
                            <th class="text-center">صدور دستی پرداخت</th>
                            <th class="text-center">فراخوانی قبض</th>
                            <th class="text-center">تعداد بدهی ها</th>
                            <th class="text-center">ویرایش کاربر</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

<script>
    $(document).ready(function(){

        fetch_customer_data();

        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('live_search.action1') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
</script>
