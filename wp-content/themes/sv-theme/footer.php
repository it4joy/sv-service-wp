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
						<form method="" action="" class="form-horizontal">
							<div class="form-group">
								<label for="name" class="col-md-2 control-label">Имя</label>
								<div class="col-md-10">
									<input type="text" name="name" class="form-control" id="name" placeholder="Имя">
								</div>
							</div>
							<div class="form-group">
								<label for="phone" class="col-md-2 control-label">Телефон</label>
								<div class="col-md-10">
									<input type="number" name="phone" class="form-control" id="phone" 
									pattern="[0-9]{,11}" 
									placeholder="Мобильный номер, только цифры" required>
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
						<form method="post" action="" class="form-horizontal">
							<div class="form-group">
								<label for="name" class="col-md-2 control-label">Имя</label>
								<div class="col-md-10">
									<input type="text" name="name" class="form-control" id="name" placeholder="Имя">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-md-2 control-label">E-mail</label>
								<div class="col-md-10">
									<input type="email" name="email" class="form-control" id="email"  
									placeholder="Введите E-mail" required>
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
		
		<!-- Preorder form -->
		<div class="modal fade" id="preorder-form" tabindex="-1" role="dialog" aria-labelledby="preorder-form">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Оформление предзаказа</h4>
					</div>
					<div class="modal-body">
						<h6>Ваш заказ</h6>
						<table class="table table-hover">
							<tr>
								<th>Продукт</th>
								<th>Стоимость</th>
							</tr>
							<tr>
								<td>Одноразовые велюровые тапочки Бизнес 5,5 мм x 1</td>
								<td>80,52 руб.</td>
							</tr>
							<tr class="info">
								<td>Итого:</td>
								<td>80,52 руб.</td>
							</tr>
						</table>
						<form method="post" action="" class="form-horizontal">
							<div class="form-group">
								<label for="fullname" class="col-md-2 control-label">Имя</label>
								<div class="col-md-10">
									<input type="text" name="fullname" class="form-control" id="fullname" placeholder="ФИО">
								</div>
							</div>
							<div class="form-group">
								<label for="phone" class="col-md-2 control-label">Телефон</label>
								<div class="col-md-10">
									<input type="number" name="phone" class="form-control" id="phone" 
									pattern="[0-9]{,11}" 
									placeholder="Мобильный номер, только цифры" required>
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
		
		<!-- Success modal -->
		<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="success-modal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<h4 class="modal-title" id="myModalLabel">Сообщение успешно отправлено!</h4>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Failure modal -->
		<div class="modal fade" id="failure-modal" tabindex="-1" role="dialog" aria-labelledby="failure-modal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<h4 class="modal-title" id="myModalLabel">Произошла ошибка. Попробуйте позже.</h4>
					</div>
				</div>
			</div>
		</div>

        <?php wp_footer(); ?>
    </body>
</html>