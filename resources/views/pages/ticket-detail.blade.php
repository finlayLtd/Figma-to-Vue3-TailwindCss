@extends('layouts.app')

@section('content')
<section class="dashboard">
	@auth
	@if(in_array('tickets', Auth::user()->permissions))
	<div class="container">
		<div class="title-button-wrapper ticket-detail">
			<a href="{{url('/support-ticket')}}"><img class="status-arrow" src="{{asset('assets/img/status-arrow.svg')}}" alt=""></a>
			<h3 class="ticket-status-title color-in-work">{{$ticket_detail['status']}}</h3>
			<h2 class="title mb-0 mt-2">{{ __('messages.Ticket') }}#{{$ticket_detail['tid']}}</h2>
		</div>
		<div class="sub-section server-list-tab">
			<div class="row justify-content-between align-items-center ">
				<div class="row mb-5 pe-0">

					<div class="col-12">
						<div class="card-item p-4 mb-4 support-item flex-column ">

							<div class="message-item-wrapper">
								@foreach ($ticket_detail['replies']['reply'] as $reply)
								@if ($reply['requestor_type'] == 'Owner')
								<div class="message-item message-received">
									<div class="message-item-header">
										<!-- <div class="message-sender-image">
											
										</div> -->
										<div class="message-sender">
											<span class="fs-15">{{ $reply['requestor_name'] }}</span><span class="message-sent-time fs-13">{{ $reply['date'] }}</span>
										</div>
									</div>

									<div class="message-content-wrapper">
										@if(!empty($reply['message']) && $reply['message']!=' ')
										<div class="message-body">
											<div>
												{{ $reply['message'] }}
											</div>
										</div>
										@endif
										@if (!empty($reply['attachment']))
										<div class="message-body message-attachment-body" style="width: fit-content;">
											<a class="blackColor" onclick="download_file({{$reply['replyid']}})" data-lightbox="image-r{{$reply['replyid']}}" style="cursor: pointer;">
												<img src="{{ asset('assets/img/download_icon.png') }}" style="width: 24px;" alt="">
												<span class="text-decoration-underline">{{ $reply['attachment'] }}</span>
											</a>
										</div>
										@endif
									</div>
								</div>
								@else
								<div class="message-item message-sent">
									<div class="message-item-header">
										<!-- <div class="message-sender-image">
											
										</div> -->
										<div class="message-sender">
											<span class="fs-15">{{ $reply['name'] }}</span><span class="message-sent-time fs-13">{{ $reply['date'] }}</span>
										</div>
									</div>

									<div class="message-content-wrapper">
										@if(!empty($reply['message']) && $reply['message']!=' ')
										<div class="message-body">
											<div>
												{{ $reply['message'] }}
											</div>
										</div>
										@endif
										@if (!empty($reply['attachment']))
										<div class="message-body message-attachment-body" style="width: fit-content; margin-left: auto;">
											<div>
												<a class="blackColor" onclick="download_file({{$reply['replyid']}})" data-lightbox="image-r{{$reply['replyid']}}" style="cursor: pointer;">
													<img src="{{ asset('assets/img/download_icon.png') }}" style="width: 24px;" alt="">
													<span class="text-decoration-underline">{{ $reply['attachment'] }}</span>
												</a>
											</div>
										</div>
										@endif
									</div>
								</div>
								@endif
								@endforeach
							</div>
							<form method="POST" action="/sendReply" enctype="multipart/form-data">
								@csrf
								<div class="message-send-area-wrapper mt-4">
									<div class="upload-attachment">
										<label class="file-label" for="file"></label>
										<input name="file" type="file" style="display: none" id="file" onchange="displayFileName()">
										<input name="ticket_id" type="hidden" id="ticket_id" value="{{ $ticket_detail['id'] }}">
									</div>
									<div class="message-box">
										<textarea id="message" name="message" class="p-3" name="" id="" cols="30" rows="5" placeholder="{{ __('messages.Type_a_messages') }}.."></textarea>
										<div id="file-name-container">
											{{ __('messages.File_Selected') }}: <span id="file-name" style="overflow-wrap: anywhere;"></span>
										</div>
									</div>
								</div>
								<div class="mt-1" style="text-align: right;">
									<button class="btn-dark change-profile-btn fs-15" style="margin-right: 0px;" type="submit">{{ __('messages.Send') }}</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@else
		@include('component.no-permission-go-back')
	@endif
	@endauth
	
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$('html, body').animate({
				scrollTop: $(document).height()
			}, 1000);
		});

		function displayFileName() {
			const input = document.getElementById('file');
			const output = document.getElementById('file-name');
			const container = document.getElementById('file-name-container');

			output.innerText = input.files[0].name;
			container.style.display = 'block';
		}

		function download_file(id){
			console.log(id);
			$('#loading-bg').css('display', 'flex');
			$.ajax({
				url: '/download-file/'+id,
				type: 'GET',
				success: function(response) {
					if(response.result == 'success'){
						var link = document.createElement('a');
						link.href = response.redirect_url;
						link.click();
					}
					$('#loading-bg').css('display', 'none');
				},
				error: function(xhr, status, error) {
					// Handle the error here
					console.log(error);
					$('#loading-bg').css('display', 'none');
				}
			});
		}
	</script>
</section>

@endsection