<br><br><br><br>
    <!-- tabs/pill -->
	<div class="row">  
        <div class="col-md-3 " >
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Menu</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <a href="">สินค้าขายดี</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="{{url('out_of_stock')}}">สินค้ากำลังหมดคลัง</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="{{url('exp')}}">สินค้าใกล้หมดอายุ</a>
                                                </td>
                                            </tr>            
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Account</a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <a href="/data">ข้อมูลส่วนตัว</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="/ch_pass">เปลี่ยนรหัสผ่าน</a>
                                                </td>
                                            </tr>
                                            <tr>
                                            @if (Auth::user()->name=="หทัยชนก อินทนิน")
                                                <td>
                                                    <a href="/adduser">ผู้ใช้งานระบบ</a> <span class="label label-info"></span>
                                                </td>
                                            </tr>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Reports</a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <a href="">รายละเอียดสินค้า</a><span><div class="pull-right">
                                                    <a href="" class="btn btn-xs btn-primary">Export PDF</a>
                                                    </div></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                   </span><a href="">ประวัติการขาย</a><span><div class="pull-right">
                                                    <a href="" class="btn btn-xs btn-primary">Export PDF</a>
                                                    </div></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="">สรุปยอดสินค้า</a><span><div class="pull-right">
                                                    <a href="" class="btn btn-xs btn-primary">Export PDF</a>
                                                    </div></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>