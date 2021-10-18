<div id="employes">
        <form  method='POST' action="{{route('createxam')}}" autocomplete="off">
            @csrf
             <table border="1" width="100%" height="auto">
               <tr>
                 <td>
                    <h4>حجز جديد خاص بـ</h4>
                    <h2>{{$patient->name}}</h2>
                    <input name="patienid" type="hidden" value="{{$patient->id}}" />
                 </td>
                 <td>
                    <select name="type">
                       <option selected disabled>العمليه</option>
                       <option value="1">كشف</option>
                       <option value="2">عمليه</option>
                       <option value="3">زيارة</option>
                       <option value="4">أشعه وتحاليل</option>
                    </select>
                 </td>
                 <td>
                    <select name="depart_id">
                        <option value="" selected disabled>اختر القسم</option>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach;
                    </select>
                 </td>
                 <td>
                    <select name="doctor_id">
                        <option selected disabled value="">Choose</option>
                    </select>
                 </td>
                 <td>
                      <label>سعر الكشف</label>
                      <input value="" id="cost" name="cost" />
                 </td>
                 <td>
                      <label>رقم الغرفة</label>
                      <input value="" id="room_no" name="room_no" />

                 </td>
              
               <td>
                  <label>ملاحظات</label>
                  <textarea name="description"></textarea>
               </td>
              </tr>
                           
             </table>
             <hr>

              <input type="submit" value="حفظ" >
        </form>
</div>
<script language="JavaScript" type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
<script>
        $(document).ready(function () {
            $('select[name="depart_id"]').on('change', function () {
                var depart_id = $(this).val();
                document.getElementById("room_no").value='';
                if (depart_id) {
                    $.ajax({
                        url: "{{ URL::to('get_doctors') }}/" + depart_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="doctor_id"]').empty();
                            $('select[name="doctor_id"]').append('<option selected disabled>Choose</option>');
                            $.each(data, function (key, value) {
                                $('select[name="doctor_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

<script>
        $(document).ready(function () {
            $('select[name="doctor_id"]').on('change', function () {
               
                var doctor_id = $(this).val();
                if (doctor_id) {
                    $.ajax({
                        url: "{{ URL::to('getroom') }}/" + doctor_id,
                        type: "GET",
                         dataType: "json",
                         success: function(data) {
                            document.getElementById("room_no").value=data;
                    },
                    });

                    $.ajax({
                        url: "{{ URL::to('getdoctorprice') }}/" + doctor_id,
                        type: "GET",
                         dataType: "json",
                         success: function(data) {
                            document.getElementById("cost").value=data;
                            
                    },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>