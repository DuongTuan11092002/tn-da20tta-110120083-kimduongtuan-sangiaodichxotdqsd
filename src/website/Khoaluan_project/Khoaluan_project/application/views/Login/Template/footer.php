   <!-- plugins:js -->
   <script src="<?php echo base_url('assets_admin/vendors/js/vendor.bundle.base.js'); ?>"></script>
   <!-- endinject -->
   <!-- Plugin js for this page -->
   <!-- End plugin js for this page -->
   <!-- inject:js -->
   <script src="<?php echo base_url('assets_admin/js/off-canvas.js'); ?>"></script>
   <script src="<?php echo base_url('assets_admin/js/hoverable-collapse.js'); ?>"></script>
   <script src="<?php echo base_url('assets_admin/js/misc.js'); ?>"></script>
   <!-- endinject -->
   <!-- so sánh mật khẩu -->
   <script>
      // Lấy ra các phần tử input mật khẩu và nhập lại mật khẩu
      var passwordField = document.getElementById('password');
      var confirmPasswordField = document.getElementById('confirmPassword');
      var resultMessage = document.getElementById('resultMessage');

      // Thêm sự kiện 'input' cho cả hai trường nhập
      passwordField.addEventListener('input', comparePasswords);
      confirmPasswordField.addEventListener('input', comparePasswords);

      // Hàm so sánh mật khẩu sử dụng Fetch API
      function comparePasswords() {
         var password = passwordField.value;
         var confirmPassword = confirmPasswordField.value;

         // Gửi yêu cầu POST đến máy chủ với dữ liệu mật khẩu
         fetch('/compare-passwords', {
               method: 'POST',
               headers: {
                  'Content-Type': 'application/json'
               },
               body: JSON.stringify({
                  password: password,
                  confirmPassword: confirmPassword
               })
            })
            .then(response => response.json())
            .then(data => {
               // Xử lý phản hồi từ máy chủ
               if (data.match) {
                  resultMessage.innerText = 'Mật khẩu khớp';
               } else {
                  resultMessage.innerText = 'Mật khẩu không khớp';
               }
            })
            .catch(error => {
               console.error('Lỗi:', error);
            });
      }
   </script>
   </body>

   </html>