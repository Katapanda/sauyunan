@extends('layouts.app')

{{-- include function --}}
@include('includes.function')

@section('title')
    Sejarah
@endsection

@section('content')
    
  	<!-- Modal Sambutan-->
    <div class="modal fade" id="sambutan-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" style="background-color: #EBE18C;">
                <div class="modal-header">
                    <img src="{{ asset('assets_frontend/images/logo.png') }}" class="img-responsive" alt="">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="background-color: #FFFFFF;">
                    @foreach($sambutans as $sambutan)
                        {!! $sambutan->isi_sambutan !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Sejarah -->
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="img-content">
                        <br/>
                        <h4>Sejarah</h4>
                        <p>@foreach($sejarah as $sjr) {{ $sjr->isi_sejarah }} @endforeach</p>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Sejarah -->

@endsection