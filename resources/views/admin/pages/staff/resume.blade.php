<!DOCTYPE html>
<html>
<head>


<style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
    *{
        font-size: 15px;
        font-family: TimesNewRoman;

    }
    .main{
        margin-left: 75.6px;
    }
    .b{
        font-weight: bold;
    }
    .up{
        text-transform: uppercase;
    }
    .c{
        text-align: center;
    }
    .mm{
        padding-bottom: 100px;
    }
    table.teppaa, .teppa>th, td.bbbbbb {
      border: none;
      border-collapse: collapse;
      padding-bottom: 5px;
    }
    .m-a{
        margin-left: 38px;
    }
    .page-break {
        page-break-after: always;
    }
    .p-10{
        padding: 10px;
    }
    .tamom{
        border: none;
        border-collapse: collapse;
        padding-bottom: 10px;
    }
    td {
        vertical-align: top;
        text-align: left;
        /*padding-bottom: 5px;*/

    }




</style>
</head>
<body>
    <div class="main">

        <table class="teppaa" style="width: 100%;">

            <tr class="">
                <td class="bbbbbb b up c" colspan="3" style="padding:0px !important; margin-left: 37px">
                    ma'lumotnoma
                </td>
            </tr>
            <tr class="">
                <td class="bbbbbb b c" colspan="3" style="padding:0px !important; margin-left: -37px">
                  {{$data->fio()}}
                </td>
            </tr>
            <tr class="">
                <td class="bbbbbb" colspan="2" style="padding:0px !important; margin-left: 37px">
                    <p class="b"> {{$data->stdep->department->name}} {{$data->stdep->position}} </p>
                </td>
                <td rowspan="3" style="width: 113.38582677px; border:none">
                    <img style="width: 113.38582677px; height: 151.18110236px" src="{{$data->image}}">
                </td>
            </tr>

            <tr class="">
                <td class="bbbbbb">
                    <b>Tug‘ilgan yili:</b> <br>
                    {{date("d.m.Y", strtotime($data->birthday))}} <br/>
                </td>
                <td class="bbbbbb">
                    <b>Tug‘ilgan joyi:</b> <br>
                   {{$data->address}}
                </td>
            </tr>
            <tr>
                <td class="bbbbbb">
                    <b>Millati:</b> <br>
                    {{$data->nationality->name}}
                </td>
                <td class="bbbbbb">
                    <b>Partiyaviyligi:</b> <br>
                    {{ $data->partiya->name }}
                </td>
            </tr>
            <tr>
                 <td class="bbbbbb">
                    <b>Ma’lumoti:</b> <br>
                    {{$data->degree_info->name}}
                </td>
                <td  class="tamom" colspan="2">
                    <b>Tamomlagan:</b> <br>
  @foreach($education as $education_one)
                         {{date("Y", strtotime($education_one->diplom_issued_date))}}-y. - {{$education_one->university->name}} <br>
     @endforeach
                </td>

            </tr>

            <tr>
                 <td class="bbbbbb">
                    <b>Ma'lumoti bo'yicha mutahasisligi:</b> <br>

                </td>



                <td class="bbbbbb" colspan="2">
                    {{$education_one->specialization}}
                </td>
            </tr>


            <tr>

                <td class="bbbbbb">
                    <b>Ilmiy darajasi:</b> <br>
                    {{$data->academic_degree->name}}
                </td>
                <td class="bbbbbb" colspan="2">
                    <b>Ilmiy unvoni:</b> <br>
                    {{$data->degree->name}}
                </td>
            </tr>
            <tr>

                <td class="bbbbbb">
                    <b>Qaysi chet tillarini biladi:</b> <br>
                    @php
                    $langs = 'App\Models\Lang'::whereIn('id', $data->lang_id)->get();
                    @endphp
                    @foreach($langs as $langOne)
                        {{$langOne->name}},
                    @endforeach
                </td>
                <td class="bbbbbb" colspan="2">
                    <b>Harbiy (maxsus) unvoni:</b> <br>
                    {{$data->special_degree->name}}
                </td>
            </tr>
            <tr>
                <td class="bbbbbb" colspan="3">
                    <b>Davlat mukofotlari bilan taqdirlanganmi (qanaqa):</b> <br>
                    @if($mukofot_all)
                        @foreach($mukofot_all as $mukofot)
                            {{$mukofot->mukofot_type->name}},
                        @endforeach
                    @else
                        Mukofotlanmagan
                    @endif
                </td>

            </tr>
            <tr>
                <td class="bbbbbb" colspan="3">
                    <b>Xalq deputatlari, respublika, viloyat, shahar va tuman Kengashi deputatimi<br> yoki boshqa saylanadigan organlarning a’zosimi (to‘liq ko‘rsatilishi lozim):</b> <br>
                    {{$data->deputat}}
                </td>
            </tr>
        </table>
<br/>
        <table style="width: 100%; border:none;">
            <tr>
                <td class="c b up bbbbbb" colspan="3">
                    Mexnat faoliyati
                </td>
            </tr>


            @foreach($workplaces as $workpalce)
                <tr>
                    <td class="bbbbbb">
                        {{date("Y", strtotime($workpalce->start_time))}} - {{date("Y", strtotime($workpalce->start_time))}}yy.
                    </td>
                    <td class="bbbbbb" style="text-align:center;">
                       -
                    </td>
                    <td class="bbbbbb">
                        {{$workpalce->name}} - {{$workpalce->position}}
                    </td>
                </tr>
            @endforeach

        </table>

        <div class="page-break"></div>

        <p class="c b">{{$data->fio()}}ning yaqin qarindoshlari haqida</p>
        <p class="b up c">ma'lumot</p>

         <table style="width:100%">
              <tr>
                  <th  class="p-10 c">Qarin-<br>doshligi</th>
                  <th class="p-10 c">F.I.Sh</th>
                  <th class="p-10 c">Tug'ulgan yili va joyi</th>
                  <th class="p-10 c">Ish joyi va lavozimi</th>
                  <th class="p-10 c">Turar joyi</th>
              </tr>
             @foreach($relative as $rel)
              <tr>
                <td class="c b">{{$rel->relatives_type->name1}}</td>
                <td class="p-10 c">{{$rel->full_name}}</td>
                <td class="p-10 c">{{$rel->birthday}}{{$rel->region->name}}{{$rel->area->name}} {{$rel->birth_address}} </td>
                <td class="p-10 c">{{$rel->work_rank}}</td>
                <td class="p-10 c">{{$rel->address}}</td>
              </tr>
             @endforeach

         </table>



</div>
</body>
</html>
