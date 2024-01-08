<div>
    <!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">Inicio</a></li>
					<li class="item-link"><span>Ir a pagar</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<form wire:submit.prevent="placeOrder">
					<div class="row">
						<div class="col-md-12">
							<div class="wrap-address-billing">
								<h3 class="box-title">Dirección de facturación</h3>
								<div class="billing-address">
									<p class="row-in-form">
										<label for="fname">Nombre<span>*</span></label>
										<input type="text" name="fname" value="" placeholder="Tu nombre" wire:model="firstname">
										@error('firstname')  <span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="lname">Apellidos<span>*</span></label>
										<input type="text" name="lname" value="" placeholder="Tus apellidos" wire:model="lastname">
										@error('lastname')  <span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="email">Correo electrónico:</label>
										<input type="email" name="email" value="" placeholder="Tu correo"  wire:model="email">
										@error('email')  <span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="phone">Número de teléfono<span>*</span></label>
										<input type="number" name="phone" value="" placeholder="Ingrese su número" wire:model="mobile">
										@error('mobile')  <span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="add">Línea 1<span>*</span></label>
										<input type="text" name="add" value="" placeholder="Línea 1" wire:model="line1">
										@error('line1')  <span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="add">Línea 2<span>*</span></label>
										<input type="text" name="add" value="" placeholder="Línea 2" wire:model="line2">
									</p>
									<p class="row-in-form">
										<label for="country">País<span>*</span></label>
										<input type="text" name="country" value="" placeholder="Perú" wire:model="country">
										@error('country')  <span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="zip-code">Postal<span>*</span></label>
										<input type="number" name="zip-code" value="" placeholder="Código postal" wire:model="zipcode">
										@error('zipcode')  <span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="city">Provincia<span>*</span></label>
										<input type="text" name="province" value="" placeholder="Nombre de la provincia" wire:model="province">
										@error('province')  <span class="text-danger">{{$message}}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="city">Ciudad<span>*</span></label>
										<input type="text" name="city" value="" placeholder="Nombre de la ciudad" wire:model="city">
										@error('city')  <span class="text-danger">{{$message}}</span> @enderror
									</p>
									
									<p class="row-in-form fill-wife">
										
										<label class="checkbox-field">
											<input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
											<span>¿Envia a una direccion diferente?</span>
										</label>
									</p>
								</div>
							</div>
						</div>
						@if ($ship_to_different)
							<div class="col-md-12">
								<div class="wrap-address-billing">
									<h3 class="box-title">Dirección de envío</h3>
									<div class="billing-address">
										<p class="row-in-form">
											<label for="fname">Nombre<span>*</span></label>
											<input type="text" name="fname" value="" placeholder="Tu nombre" wire:model="s_firstname">
											@error('s_firstname')  <span class="text-danger">{{$message}}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="lname">Apellidos<span>*</span></label>
											<input type="text" name="lname" value="" placeholder="Tus apellidos" wire:model="s_lastname">
											@error('s_lastname')  <span class="text-danger">{{$message}}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="email">Correo electrónico:</label>
											<input type="email" name="email" value="" placeholder="Tu correo" wire:model="s_email">
											@error('s_email')  <span class="text-danger">{{$message}}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="phone">Número de teléfono<span>*</span></label>
											<input type="number" name="phone" value="" placeholder="Ingrese su número" wire:model="s_mobile">
											@error('s_mobile')  <span class="text-danger">{{$message}}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="add">Línea 1<span>*</span></label>
											<input type="text" name="add" value="" placeholder="Línea 1" wire:model="s_line1">
											@error('s_line1')  <span class="text-danger">{{$message}}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="add">Línea 2<span>*</span></label>
											<input type="text" name="add" value="" placeholder="Línea 2" wire:model="s_line2">
										</p>
										<p class="row-in-form">
											<label for="country">País<span>*</span></label>
											<input type="text" name="country" value="" placeholder="Perú" wire:model="s_country" >
											@error('s_country')  <span class="text-danger">{{$message}}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="zip-code">Postal:</label>
											<input type="number" name="zip-code" value="" placeholder="Código postal"  wire:model="s_zipcode">
											@error('s_zipcode')  <span class="text-danger">{{$message}}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="city">Provincia<span>*</span></label>
											<input type="text" name="province" value="" placeholder="Provincia" wire:model="s_province">
											@error('s_province')  <span class="text-danger">{{$message}}</span> @enderror
										</p>
										<p class="row-in-form">
											<label for="city">Ciudad<span>*</span></label>
											<input type="text" name="city" value="" placeholder="Nombre de la ciudad" wire:model="s_city">
											@error('s_city')  <span class="text-danger">{{$message}}</span> @enderror
										</p>
									</div>
								</div>
							</div>
						@endif
						
					</div>
					
					<div class="summary summary-checkout">
						<div class="summary-item payment-method">
							<h4 class="title-box">Método de pago</h4>
							<p class="summary-info"><span class="title">Cheque/giro postal</span></p>
							<p class="summary-info"><span class="title">Tarjeta de crédito (guardada)</span></p>
							<div class="choose-payment-methods">
								<label class="payment-method">
									<input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
									<span>Contra reembolso</span>
									<span class="payment-desc">Haga su pedido ahora y pague contra reembolso.</span>
								</label>
								<label class="payment-method">
									<input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
									<span>Pago con tarjeta de débito/crédito</span>
									<span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
								</label>
								<label class="payment-method">
									<input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentmode">
									<span>Paypal</span>
									<span class="payment-desc">Puedes pagar con tu crédito.</span>
									<span class="payment-desc">tarjeta si no tienes cuenta paypal</span>
								</label>
								@error('paymentmode')  <span class="text-danger">{{$message}}</span> @enderror
							</div>
							@if (Session::has('checkout'))
								<p class="summary-info grand-total"><span>Total</span> <span class="grand-total-price">S/. {{ Session::get('checkout')['total'] }}</span></p>
							@endif
							
							<button type="submit" class="btn btn-medium">Realice su orden ahora</button>
						</div>
						<div class="summary-item shipping-method">
							<h4 class="title-box f-title">Método de envío</h4>
							<p class="summary-info"><span class="title">Impuesto</span></p>
							<p class="summary-info"><span class="title">Fijo s/. 00.00</span></p>
						</div>
					</div>
				</form>
			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->
</div>
