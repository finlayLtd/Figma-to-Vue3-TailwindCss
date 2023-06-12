@extends('layouts.app')

@section('content')
<section class="overview" style="position: relative;">


	<div class="container">
		<div class="d-flex flex-column justify-content-start align-items-start title-button-wrapper">
			<div class="overview-header">
				<h2 class="title mb-0">Switch Account</h2>
			</div>
		</div>


		<div class="sub-section overview-tab">
			<div class="row justify-content-between align-items-center ">

				<div class="tab-content settings-tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-userManagement" role="tabpanel" aria-labelledby="pills-userManagement-tab">
						<div class="tab-inner mb-3">
							<div class="row">
								<h3 class="title mb-4">Choose account to login and manage</h3>
							</div>
							<div class="divider"></div>
							<div class="row px-2 pt-4 px-lg-4 pt-lg-4">
								<div class="w-100 mb-5 support-table">
									<table class="table">
										<tbody>
										@foreach ($clients as $item)
											<tr>
												<td>
													{{ $item['email'] }}
													@if($item['email'] == $originUserData['email'])
													<span class="badge bg-info">Owner</span>
													@endif
													<br>
												</td>
											</tr>
										@endforeach	
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection