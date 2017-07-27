			<div class="page-buffer"></div>
		</div> <!-- /.page-wrapper -->

		<div class="page-footer">
			<div class="container">
				<div class="row footer-form-wrapper">
					<div class="col-xs-12">
						<h3 class="text-center uppercase">Закажите обратный звонок</h3>
						<form id="footer-callback-form" class="form-inline default footer-callback-form" method="post" action="">
							<div class="form-group">
								<input type="number" name="phone" pattern="[0-9]{,11}" id="phone" class="form-control" placeholder="Мобильный номер, только цифры" required>
								<input type="hidden" name="form_type" value="footer-callback-form" class="form-type">
							</div>
							<button type="submit" class="btn btn-default">Перезвоните мне</button>
						</form>
					</div>
				</div>
				<div class="row quick-links-wrapper">
					<div class="col-xs-4">
						<h3>Каталог</h3>
						<?php
							wp_nav_menu( array(
								'menu' => 'footer_menu_left',
								'container' => ''
							) );
						?>
					</div>
					
					<div class="col-xs-4">
						<h3>Сервис</h3>
						<?php
							wp_nav_menu( array(
								'menu' => 'footer_menu_center',
								'container' => ''
							) );
						?>
					</div>
					
					<div class="col-xs-4">
						<h3>О компании</h3>
						<?php
							wp_nav_menu( array(
								'menu' => 'footer_menu_right',
								'container' => ''
							) );
						?>
					</div>
				</div>
				
				<div class="divider default"></div>
				
				<div class="flex-row bottom-info-wrapper">
					<div class="col-md-6 col-xs-12">
						<p>2015-2017 &copy; SV Service - производство и комплексное оснащение расходными материалами индустрии в сфере оказания услуг.</p>
						<p>Все права защищены.</p>
					</div>
					
					<div class="col-md-3 col-xs-6">
						<p>Звоните! Наши телефоны:</p>
						<p>
							<a href="tel:+79196740868">+7 (919) 674-08-68</a> <span>(регионы РФ)</span> <br>
							<a href="tel:+79276670630">+7 (927) 667-06-30</a> <span>(Чувашия)</span>
						</p>
					</div>
					
					<div class="col-md-3 col-xs-6">
						<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,twitter,viber,whatsapp,skype"></div>
					</div>
				</div>
			</div>
		</div>
		
		<i class="btn-to-top fa fa-chevron-up"></i>
		
		<!-- Callback form -->
		<div class="modal fade" id="callback-form" tabindex="-1" role="dialog" aria-labelledby="callback-form">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Заявка на обратный звонок</h4>
					</div>
					<div class="modal-body">
						<form method="" action="" id="callback-form-ajax" class="form-horizontal">
							<div class="form-group">
								<label for="name" class="col-md-2 control-label">Имя</label>
								<div class="col-md-10">
									<input type="text" name="name" class="form-control" id="name" placeholder="Имя">
								</div>
							</div>
							<div class="form-group">
								<label for="phone2" class="col-md-2 control-label">Телефон</label>
								<div class="col-md-10">
									<input type="number" name="phone" class="form-control" id="phone2" 
									pattern="[0-9]{,11}" 
									placeholder="Мобильный номер, только цифры" required>
									<input type="hidden" name="form_type" value="callback-form-ajax" class="form-type">
								</div>
							</div>
							<div class="form-group">
								<label for="checking" class="col-md-6 control-label">Сколько будет 2 * 2 + 1?</label>
								<div class="col-md-6">
									<input type="number" name="checking" class="form-control" id="checking" placeholder="Введите ответ" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<div class="checkbox">
										<label class="checkbox">
											<input type="checkbox" name="agreement" value="yes" id="agreement" required> Согласие на обработку персональных данных
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-2 col-md-10">
									<button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Очистить</button>
									<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Отправить</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Form of price's request -->
		<div class="modal fade" id="price-request-form" tabindex="-1" role="dialog" aria-labelledby="price-request-form">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Заявка на получение прайс-листа</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="" id="price-list-form-ajax" class="form-horizontal">
							<div class="form-group">
								<label for="name2" class="col-md-2 control-label">Имя</label>
								<div class="col-md-10">
									<input type="text" name="name" class="form-control" id="name2" placeholder="Имя">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-md-2 control-label">E-mail</label>
								<div class="col-md-10">
									<input type="email" name="email" class="form-control" id="email"  
									placeholder="Введите E-mail" required>
									<input type="hidden" name="form_type" value="price-list-form" class="form-type">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<div class="checkbox">
										<label class="checkbox">
											<input type="checkbox" name="agreement" value="yes" id="agreement2" required> Согласие на обработку персональных данных
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-2 col-md-10">
									<button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Очистить</button>
									<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Отправить</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Ask a question about certain product -->
		<div class="modal fade" id="product-ask-question-form" tabindex="-1" role="dialog" aria-labelledby="product-ask-question-form">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Задайте вопрос по товару</h4>
					</div>
					<div class="modal-body">
						<form method="" action="" id="product-ask-question-form-ajax" class="form-horizontal">
							<div class="form-group">
								<label for="question-about" class="col-md-2 control-label">Вопрос о</label>
								<div class="col-md-10">
									<input type="text" name="question_about" class="form-control" id="question-about">
									<input type="hidden" name="articul" class="product-articul">
								</div>
							</div>
							<div class="form-group">
								<label for="name3" class="col-md-2 control-label">Имя</label>
								<div class="col-md-10">
									<input type="text" name="name" class="form-control" id="name3" placeholder="Имя">
								</div>
							</div>
							<div class="form-group">
								<label for="phone3" class="col-md-2 control-label">Телефон</label>
								<div class="col-md-10">
									<input type="number" name="phone" class="form-control" id="phone3" 
									pattern="[0-9]{,11}" 
									placeholder="Мобильный номер, только цифры" required>
									<input type="hidden" name="form_type" value="product-ask-question-ajax" class="form-type">
								</div>
							</div>
							<div class="form-group">
								<label for="product-question" class="col-md-2 control-label">Вопрос</label>
								<div class="col-md-10">
									<textarea name="question_text" class="form-control" rows="3" id="product-question"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<div class="checkbox">
										<label class="checkbox">
											<input type="checkbox" name="agreement" value="yes" id="agreement3" required> Согласие на обработку персональных данных
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-2 col-md-10">
									<button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Очистить</button>
									<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Отправить</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Form of searching -->
		<div class="modal fade" id="wp-searching-form" tabindex="-1" role="dialog" aria-labelledby="wp-searching-form">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>

		<!-- Preorder form -->
		<div class="modal fade" id="preorder-form" tabindex="-1" role="dialog" aria-labelledby="preorder-form">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Оформление предзаказа</h4>
					</div>
					<div class="modal-body">
						<h6 class="text-center">Ваш заказ</h6>
						<table class="table table-preorder table-hover">
							<tr class="heading">
								<th>Продукт</th>
								<th>Артикул</th>
								<th>Количество</th>
								<th>Цена</th>
							</tr>
							<tr class="info">
								<td><strong>Итого:</strong></td>
								<td></td>
								<td></td>
								<td class="total"><span></span> руб.</td>
							</tr>
						</table>
						<form  enctype="multipart/form-data" method="" action="" id="preorder-form-ajax" class="form-horizontal">
							<div class="form-group">
								<label for="fullname" class="col-md-2 control-label">Имя</label>
								<div class="col-md-10">
									<input type="text" name="fullname" class="form-control" id="fullname" placeholder="ФИО">
								</div>
							</div>
							<div class="form-group">
								<label for="phone4" class="col-md-2 control-label">Телефон</label>
								<div class="col-md-10">
									<input type="number" name="phone" class="form-control" id="phone4" 
									pattern="[0-9]{,11}" 
									placeholder="Мобильный номер, только цифры" required>
									<input type="hidden" name="form_type" value="preorder-ajax" class="form-type">
								</div>
							</div>
							<button type="button" class="unfold-btn btn btn-default btn-upload">Прикрепить документы</button>
							<div class="upload-form hidden-block">
								<p>Допустимые форматы: изображения, .pdf, .doc</p>
								<input type="file" name="async_upload[]" multiple accept="image/*,application/pdf,application/msword" class="uploaded-files">
							</div>
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<div class="checkbox">
										<label class="checkbox">
											<input type="checkbox" name="agreement" value="yes" id="agreement4" required> Согласие на обработку персональных данных
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-2 col-md-10">
									<button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Очистить</button>
									<button type="submit" class="btn btn-primary btn-preorder"><i class="fa fa-paper-plane"></i> Отправить</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Success modal -->
		<div class="modal fade ajax-msg success" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="success-modal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<h4 class="text-center"><i class="fa fa-check"></i></h4>
						<h4 class="modal-title text-center" id="myModalLabel">Сообщение успешно отправлено!</h4>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Failure modal -->
		<div class="modal fade ajax-msg failure" id="failure-modal" tabindex="-1" role="dialog" aria-labelledby="failure-modal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<h4 class="text-center"><i class="fa fa-warning"></i></h4>
						<h4 class="modal-title text-center" id="myModalLabel">Произошла ошибка. Попробуйте позже.</h4>
					</div>
				</div>
			</div>
		</div>

        <?php wp_footer(); ?>
    </body>
</html>