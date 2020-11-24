  
  <?php  
   $depart = $_POST['depart']; 
   //echo $depart; 
   ?>
  <form id="signupForm" action="show_data.php"  method="POST" enctype="multipart/form-data" >

            <div class="input-group mb-2 input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">ลำดับข้อมูล</span>
              </div>
              <input type="number" id="g_impo" name="g_impo" min="0"  class="form-control" required />
            </div>

            <div class="input-group mb-2 input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">ตำแหน่ง</span>
              </div>
              <input type="text" id="g_position" name="g_position" class="form-control" required />
            </div>

            <div class="input-group mb-2 input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">ชื่อ-สกุล</span>
              </div>
              <input type="text" id="g_head_th" name="g_head_th" class="form-control" required />
            </div>

            <div class="input-group mb-2 input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">ภาพผู้บริหาร</span>
              </div>
              <input type="file" id="g_pic" name="g_pic"  class="form-control">
              <small>-ไฟล์รูปภาพขนาดไม่เกิน 500 kb</small>
            </div>

             <div class="input-group mb-2 input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">ที่ตั้งหน่วยงาน</span>
              </div>
              <input type="text" id="g_add" name="g_add" class="form-control" required="" />
            </div>

             <div class="input-group mb-2 input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">โทรศัพท์</span>
              </div>
              <input type="text" id="g_phone"  name="g_phone" class="form-control" placeholder="พิมพ์ติดกันเลย"  required />
            </div>

             <div class="input-group mb-2 input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Hotline</span>
              </div>
              <input type="text" id="g_hotline"  name="g_hotline" class="form-control" placeholder="พิมพ์ติดกันเลย" />
            </div>

             <div class="input-group mb-2 input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">มือถือ</span>
              </div>
              <input type="text" id="g_mobile" name="g_mobile"   class="form-control" placeholder="พิมพ์ติดกันเลย" required />
            </div>

             <div class="input-group mb-2 input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">โทรสาร</span>
              </div>
              <input type="text" id="g_fax" name="g_fax" class="form-control" placeholder="พิมพ์ติดกันเลย"  required />
            </div>

             <div class="input-group mb-2 input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">E-mail</span>
              </div>
              <input type="email" id="g_email" name="g_email" class="form-control" required />
            </div>
            <input type="hidden" id="u_id" name="u_id" value="<?php echo $u_id?>">
            <input type="hidden" id="g_dep" name="g_dep" value="<?php echo $depart?>">
            <br>
            <center><button type="submit" class="btn btn-primary" id="btnSave" name="btnSave">บันทึก</button></center>
    </form>

    <script type="text/javascript">
		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
          g_impo: "required",
          g_position: "required",
          g_head_th: "required",
          g_pic: "required",
          g_add: "required",
          g_phone: "required",
          g_mobile: "required",
          g_fax: "required",
      
					email: {
						required: true,
						email: true
					},
				},
				messages: {
					g_impo: "กรุณาระบุลำดับข้อมูล",
					g_position: "กรุณาระบุตำแหน่งหน้าที่",
					g_head_th: "กรุณาระบุชื่อ-สกุล",
          g_pic: "กรุณาเลือกภาพ",
          g_add: "กรุณาระบุที่อยู่",
          g_phone: "กรุณาระบุเบอร์โทรสำนักงาน",
          g_mobile: "กรุณาระบุเบอร์โทรศัพท์มือถือ",
					email: "กรุณาใส่รูปแบบ E-mail ให้ถูกต้อง",
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `invalid-feedback` class to the error element
					error.addClass( "invalid-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.next( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
				}
			} );

    } );
    </script>