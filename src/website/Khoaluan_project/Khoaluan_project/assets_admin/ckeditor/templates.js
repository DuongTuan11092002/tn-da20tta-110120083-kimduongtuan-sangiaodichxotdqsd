CKEDITOR.addTemplates('myTemplates', {
	// Đường dẫn tới thư mục chứa hình ảnh mẫu (nếu có)
	imagesPath: '<?php echo base_url("assets_admin/ckeditor/images/") ?>',
	templates: [
			{
					title: 'Thông số của Xe Hơi Cũ',
					description: '',
					html:
							'<h2>Thông Tin về Xe Hơi Cũ</h2>' +
							'<table border="1" cellspacing="0" cellpadding="5">' +
									'<tr>' +
											'<td><strong>Số km đã đi:</strong></td>' +
											'<td><input type="text" placeholder="Nhập số km đã đi" /></td>' +
									'</tr>' +
									'<tr>' +
											'<td><strong>Số lần bảo trì:</strong></td>' +
											'<td><input type="text" placeholder="Nhập số lần bảo trì" /></td>' +
									'</tr>' +
									'<tr>' +
											'<td><strong>Xe có tai nạn không:</strong></td>' +
											'<td><input type="text" placeholder="Có/Không" /></td>' +
									'</tr>' +
									'<tr>' +
											'<td><strong>Giấy tờ hợp lệ:</strong></td>' +
											'<td><input type="text" placeholder="Có/Không" /></td>' +
									'</tr>' +
									'<tr>' +
											'<td><strong>Thông số xe hơi:</strong></td>' +
											'<td><textarea placeholder="Nhập thông số xe hơi"></textarea></td>' +
									'</tr>' +
							'</table>'
			}
	]
});
